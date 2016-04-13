'use strict';
var gutil = require('gulp-util'),
	through = require('through2'),
	chalk = require('chalk'),
	prettyBytes = require('pretty-bytes');

function log(title, what, sizediff) {
	if (typeof sizediff === 'string') {
		gutil.log(title + ' ' + (what ? what + ' ' : '') + chalk.magenta(sizediff));
	} else {
		title = title ? ('\'' + chalk.cyan(title) + '\' ') : '';
		var stats = [prettyBytes(sizediff.startSize), ' / ',
			prettyBytes(sizediff.endSize), ' / ',
			prettyBytes(sizediff.diff), ' / ',
			Math.round(sizediff.diffPercent * 100) + '% / ',
			sizediff.compressionRatio.toFixed(2)].join('');

		gutil.log(title + ' ' + (what ? what + ' ' : '') + chalk.magenta(stats));
	}
}

function sizediff() {
	return through.obj(function (file, enc, cb) {
		if (file.isNull()) {
			cb(null, file);
			return;
		}

		if (file.isStream()) {
			cb(new gutil.PluginError('gulp-sizediff', 'Streaming not supported'));
			return;
		}
		file.sizediff = {
			startSize: file.contents && file.contents.length || file.stats && file.stats.size || 0
		};
		cb(null, file)
	}, function(cb) {
		cb()
	});
}

sizediff.start = sizediff;

sizediff.stop = function (options) {
	if (typeof options === 'undefined') {
		options = {};
	}
	var totalSize = {
		start: 0,
		end: 0
	},
		fileCount = 0;

	return through.obj(function (file, enc, cb) {
		if (file.isNull()) {
			cb(null, file);
			return;
		}

		if (file.isStream()) {
			cb(new gutil.PluginError('gulp-sizediff', 'Streaming not supported'));
			return;
		}

		file.sizediff.endSize = file.contents && file.contents.length || file.stats && file.stats.size || 0;

		var finish = function (err, sizediff) {
			totalSize.start += sizediff.startSize;
			totalSize.end += sizediff.endSize;

			if (options.showFiles === true && sizediff.endSize > 0) {
				sizediff.diff = sizediff.startSize - sizediff.endSize;
				sizediff.diffPercent = sizediff.endSize / sizediff.startSize;
				sizediff.compressionRatio = sizediff.diff / sizediff.startSize;

				log(options.title, chalk.blue(file.relative), typeof options.formatFn === 'function' ? options.formatFn(sizediff) : sizediff);
			}

			fileCount++;
			cb(null, file);
		};

		finish(null, file.sizediff);
	}, function (cb) {
		var sizediff = {
			startSize: totalSize.start,
			endSize: totalSize.end,
			diff: totalSize.start - totalSize.end,
			diffPercent: totalSize.end / totalSize.start,
			compressionRatio: (totalSize.start - totalSize.end) / totalSize.start
		};

		if (fileCount === 1 && options.showFiles === true && totalSize > 0) {
			cb();
			return;
		}

		log(options.title, '', typeof options.formatFn === 'function' ? options.formatFn(sizediff) : sizediff);
		cb();
	});

};

module.exports = sizediff;
