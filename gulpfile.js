var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    rename = require('gulp-rename'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify');

var scriptPath = './public/js/';
var stylePath = './public/css/';
var scripts = Array(

    'jquery.js',
    'bootstrap.js',
    'clean-blog.js',
    'set-navbar.js',
    'forumm.js',
    'jasny-bootstrap.js'
);
var styles = Array(

    'screen.css',
    'bootstrap.css',
    'font-awesome.css',
    'clean-blog.css',
    'jasny-bootstrap.css',
    'forumm.css'
);

scripts = scripts.map(function(fileName){

    return scriptPath + fileName;
});

styles = styles.map(function(fileName){

    return stylePath + fileName;
});

gulp.task('styles', function() {
    return gulp.src(styles)
    .pipe(concat('forumm.css'))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
    .pipe(gulp.dest('public/gulp-css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('public/gulp-css'));
});


gulp.task('scripts', function(){
	return gulp.src(scripts)
	.pipe(concat('forumm.js'))
	.pipe(gulp.dest('public/gulp-js'))
	.pipe(rename({suffix: '.min'}))
	.pipe(uglify())
	.pipe(gulp.dest('public/gulp-js'));
});
