var exec      = require('child_process').exec;
var sys       = require('sys');
var path      = require('path');
var gulp      = require('gulp');
var gutil     = require('gulp-util');
var less      = require('gulp-less');
var minifycss = require('gulp-minify-css');
var uglify    = require('gulp-uglify');
var rename    = require("gulp-rename");
var refresh   = require('gulp-livereload');
var lr        = require('tiny-lr');
var server    = lr();

gulp.task('default', ['lr-server', 'styles', 'scripts', 'watch']);

gulp.task('lr-server', function() {
  server.listen(35729, function(err) {
      if(err) return console.log(err);
  });
})

gulp.task('styles', function() {
  return gulp.src('app/assets/less/styles.less')
    .pipe(less())
    .pipe(minifycss())
    .pipe(rename(function (path) {
        path.basename += ".min"
    }))
    .pipe(gulp.dest('public/assets/css'))
    .pipe(refresh(server));
});

gulp.task('scripts', function() {
  return gulp.src('app/assets/js/*.js')
    .pipe(uglify())
    .pipe(rename(function (path) {
        path.basename += ".min"
    }))
    .pipe(gulp.dest('public/assets/js'))
    .pipe(refresh(server));
});

gulp.task('watch', function() {
  gulp.watch('app/assets/less/*.less', ['styles']);
  gulp.watch('app/assets/js/*.js', ['scripts']);
  //gulp.watch('index.php', ['scripts']);
});