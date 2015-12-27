
// to install dependencies for this gulpfile
// npm install --save-dev gulp gulp-ruby-sass gulp-autoprefixer gulp-minify-css gulp-rename del

// load plugins
var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    del = require('del');

// Tasks

// Styles
gulp.task('styles', function() {
  return sass('src/main.custom.scss', { style: 'nested', })
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest('./'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifycss())
    .pipe(gulp.dest('./'))
});

// Clean
gulp.task('clean', function(cb) {
    del(['./main.custom.css*'], cb);
});

// Watch
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('src/*.scss', ['styles']);

});

// Default task
gulp.task('default', /*['clean'],*/ function() {
    gulp.start('watch');
    // gulp.start('styles',);
});
