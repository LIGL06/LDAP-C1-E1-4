'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');

gulp.task('sass', function(){
  return gulp.src('resources/assets/sass/app.scss')
  .pipe(sass().on('error',sass.logError))
  .pipe(gulp.dest('public/css'));
})

gulp.task('minify', function(){
  return gulp.src('public/css/app.css')
  .pipe(cleanCSS({compatibility:'ie8'}))
  .pipe(gulp.dest('public/css'));
})

gulp.task('sass:watch', function(){
  gulp.watch('resources/assets/sass/app.scss',['sass']);
})
