// Gulp modules
var argv       = require('yargs').argv
,   gulp       = require('gulp')
,   bump       = require('gulp-bump')
,   concat     = require('gulp-concat')
,   flatten    = require('gulp-flatten')
,   modernizr  = require('gulp-modernizr')
// ,   ngAnnotate = require('gulp-ng-annotate')
,   order      = require("gulp-order")
,   rename     = require('gulp-rename')
,   shell      = require('gulp-shell')
,   sizediff   = require('gulp-sizediff')
,   uglify     = require('gulp-uglify')
,   gutil      = require('gulp-util')
,   using      = require('gulp-using')
,   chalk      = require('chalk')
,   filesize   = require('filesize')
,   requireDir = require('require-dir')
,   tildify    = require('tildify')

// Path variables
,   assets  = 'wp-content/themes/jetstream-aviation'
,   css     = assets + '/sass'
,   js      = assets + '/js'
,   jsBuild = js     + '/build'
;


/**
 * Required Fonts
 */
var fonts = [
];


/**
 * Required JS
 */

// Vendor js to be minified and concatentated into js/vendor.min.js
var jsVendor = [
    'bower_components/imagesLoaded/imagesLoaded.pkgd.js',    
    'bower_components/isotope/dist/isotope.pkgd.js',    
    'bower_components/jquery_lazyload/jquery.lazyload.js'
];

// Vendor js that is not to be concatenated for production.
var jsVendorSeparate = [
  // 'bower_components/jquery/dist/jquery.js',
  // 'bower_components/underscore/underscore.js',
  // 'bower_components/modernizr/modernizr.js',
];

// Site js to be minified and concatentated into js/site.min.js
var jsSite = [
  // angular + '/**/*.js',
  js + '/site/*.js',
];

// Sites js that is not to be concatenated for production.
var jsSiteSeparate = [
];

/**
 * All js files in the folder will be included and their tasks added if they export them
 * Their tasks will be added to the list of tasks to run
 */
var requireDirs = [
//  'public/wp-content/plugins/dc.wp-framework/gulp/',
];


// Load each file and setup its tasks
// Once loaded, the tasks can be used like any other gulp task
requireDirs.forEach( function(element, index, array) {
  try {
    var scripts = requireDir(element);

    for (var property in scripts) {
      if (scripts.hasOwnProperty(property)) {
        gutil.log('Using submodule gulpfile', chalk.magenta(tildify(element + property + '.js')));

        for (i = 0; i < scripts[property].length; i++) {
          // Add the submodule's task
          gulp.task(scripts[property][i].name, scripts[property][i].dependencies, scripts[property][i].callback);
          gutil.log('Added submodule task', '\'' + chalk.cyan(scripts[property][i].name) + '\'');
        }
      }
    }
  } catch (e) {
    // This usually happens if the requireDir path doesn't exist
    gutil.log(chalk.red('RequireDir error: '), (e.message));
  }
});


var sizeDiffFormat = function (data) {
  if (data.endSize === 0) {
    return ': None';
  }
  return ': size reduced by ' + Math.round((1 - data.diffPercent) * 100)  + '% to ' + filesize(data.endSize);
};


/**
 * Add, minify, and concatenate vendor Javascript
 * gulp dependencies
 */
gulp.task('dependencies', function() {
  // Copy icon font files to the /fonts folder
  gulp.src(fonts)
    .pipe(gulp.dest(assets + '/fonts/icons'));

  // Copy all js files to the /vendor folder (used during development)
  gulp.src(jsVendor.concat(jsVendorSeparate))
    .pipe(flatten())
    .pipe(gulp.dest(js + '/vendor'));

  // Concat & minify all js files into one file
  gulp.src(jsVendor)
    .pipe(sizediff.start())
    // .pipe(ngAnnotate())
    .pipe(uglify({
      preserveComments: 'license'
    }))
    .pipe(sizediff.stop({title:'Vendor Javascript', formatFn: sizeDiffFormat}))
    .pipe(concat('vendor.min.js'))
    .pipe(gulp.dest(jsBuild));

  // Minify each file js file individually
  gulp.src(jsVendorSeparate)
    .pipe(sizediff.start())
    // .pipe(ngAnnotate())
    .pipe(uglify({
      preserveComments: 'license'
    }))
    .pipe(sizediff.stop({title:'Vendor Javascript separate', formatFn: sizeDiffFormat}))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest(jsBuild));

  // Build a custom version of Modernizr
  // Disabled as gulp-modernizr isn't working
  // gulp.src([
  //     js + '/vendor/*.js',
  //     js + '/site/*.js',
  //     css + '/*.css'
  //   ])
  //   .pipe(modernizr())
  //   .pipe(uglify({
  //     preserveComments: 'license'
  //   }))
  //   .pipe(rename({
  //     suffix: '.min'
  //   }))
  //   .pipe(gulp.dest(jsBuild));
});

// Alias for dependencies
gulp.task('deps', ['dependencies']);


/**
 * Minify and concatenate site Javascript
 * gulp js
 */
gulp.task('js', function() {
  gulp
    .src(jsSite)
    .pipe(order([
      // These file will be compiled first
      'main.js',
     // 'app.js',
    ]))
    .pipe(sizediff.start())
    // .pipe(using())
    // .pipe(ngAnnotate())
    .pipe(uglify({
      preserveComments: 'none'
    }))
    .pipe(sizediff.stop({title:'Site Javascript', formatFn: sizeDiffFormat}))
    .pipe(concat('site.min.js'))
    .pipe(gulp.dest(jsBuild));

  gulp
    .src(jsSiteSeparate)
    .pipe(sizediff.start())
    // .pipe(ngAnnotate())
    .pipe(uglify({
      preserveComments: 'license'
    }))
    .pipe(sizediff.stop({title:'Site Javascript separate', formatFn: sizeDiffFormat}))
    .pipe(gulp.dest(jsBuild));
});


/**
 * gulp min css (production)
 */
gulp.task('mincss', function() {
  gulp.src(css)
    .pipe(shell([
      'compass compile -e production --force'
    ], {
      cwd: css
    }));
});

/**
 * gulp css
 */
gulp.task('css', function() {
  gulp.src(css)
    .pipe(shell([
      'compass compile --force'
    ], {
      cwd: css
    }));
});


/**
 * Bump the version
 * gulp bump
 *   --type    major | minor | patch (default)
 *   --version X.X.X
 */
gulp.task('bump', function() {
  var type    = argv.type || 'patch';
  var version = argv.version;

  gulp.src(['package.json', 'bower.json'])
    .pipe(bump({
      type: type,
      version: version
    }))
    .pipe(gulp.dest('./'));
});


/**
 * Default Gulp
 * gulp
 */
gulp.task('default', ['deps', 'js', 'css']);

gulp.task('production', ['deps', 'js', 'mincss']);
