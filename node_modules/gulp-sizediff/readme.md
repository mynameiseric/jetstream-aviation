# gulp-sizediff
[![npm version](https://badge.fury.io/js/gulp-sizediff.svg)](http://badge.fury.io/js/gulp-sizediff)
[![Dependency Status](https://david-dm.org/SkeLLLa/gulp-sizediff.svg)](https://david-dm.org/SkeLLLa/gulp-sizediff)

> Display the total file size difference between before and after runnning your gulp tasks

## Install

```
$ npm install --save-dev gulp-sizediff
```


## Usage

```js
var gulp = require('gulp');
var bytediff = require('gulp-sizediff');
var csso = require('gulp-csso');

gulp.task('default', function() {
    gulp.src('main.css')
        .pipe(sizediff.start())
        .pipe(csso())
        .pipe(sizediff.stop())
        .pipe(gulp.dest('./out'));
});
```
 

### sizediff.start() or sizediff()

Creates a new property on the file object that saves its current size.

### sizediff.stop(options)

Counts and outputs the difference between saved size and the current filesize.

#### options
##### showFiles

Type: `boolean`  
Default: `false`

Displays the size diff of every file instead of just the total size diff.

##### title

Type: `string`  
Default: ''

Give it a title so it's possible to distinguish the output of multiple instances logging at once.

##### formatFn
Type: `function`  
Default: ''

Customise the output of this by using the format function. An example:

```js
	var sizeDiffFormat = function (data) {
		return ': bytes saved: ' + data.diff + ' (' + Math.round(data.diffPercent * 100)  + '%); compression ratio: ' + data.compressionRatio.toFixed(2);
	};
    // ...
    .pipe($.sizediff.stop({title:'html', formatFn: sizeDiffFormat}))
    .pipe(gulp.dest('./out'));
```
The function gets passed an object with the following properties:

* startSize
* endSize
* diff (startSize - endSize)
* diffPercent (endSize / startSize)
* compressionRatio (diff / startSize)

## License

MIT © [Alexander Kureniov](https://bitbucket.org/SkeLLLa/)

## Thanks:
[Sindre Sorhus](https://github.com/sindresorhus/gulp-size/) for gulp-size plugin
[Ben Briggs](https://github.com/ben-eb/gulp-bytediff/) for gulp-bytediff plugin

The ideas from this two good plugins were taken and merged in this one. Thanks.
