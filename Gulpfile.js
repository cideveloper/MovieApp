var exec       = require('child_process').exec;
var sys        = require('sys');
var path       = require('path');
var gulp       = require('gulp');
var gutil      = require('gulp-util');
var less       = require('gulp-less');
var minifycss  = require('gulp-minify-css');
var uglify     = require('gulp-uglify');
var rename     = require("gulp-rename");
var concat     = require('gulp-concat');
var filesize   = require('gulp-filesize');
var livereload = require('gulp-livereload');
var lr         = require('tiny-lr');
var server     = lr();

// Directories
var lessDir     = 'app/assets/less';
var cssDir      = 'public/assets/css';
var sourceJSDir = 'app/assets/js';
var destJSDir   = 'public/assets/js';
var bladeDir    = 'app/views';

gulp.task('styles', function() {
  return gulp.src(lessDir + '/styles.less')
    .pipe(filesize())
    .pipe(less())
    .pipe(minifycss())
    .pipe(filesize())
    .pipe(rename(function (path) {
        path.basename += ".min"
    }))
    .pipe(gulp.dest(cssDir))
    .pipe(livereload(server));
});

gulp.task('scripts', function() {
  return gulp.src(sourceJSDir + '/*.js')
    .pipe(uglify())
    .pipe(rename(function (path) {
        path.basename += ".min"
    }))
    .pipe(gulp.dest(destJSDir))
    .pipe(livereload(server));
});

gulp.task('blade', function() {
  return gulp.src(bladeDir + '/**/*.blade.php')
    .pipe(livereload(server));
});

gulp.task('watch', function() {
  server.listen(35729, function(err) {
    if(err) return console.log(err);

    gulp.watch(lessDir + '/**/*.less', ['styles']);
    gulp.watch(sourceJSDir + '/**/*.js', ['scripts']);
    gulp.watch(bladeDir + '/**/*.blade.php', ['blade']);
    //gutil.log('stuff happened', 'Really it did', gutil.colors.cyan('123'));

  });
});

gulp.task('default', ['styles', 'scripts', 'watch']);