const gulp = require('gulp')
const plumber = require('gulp-plumber')
const sass = require('gulp-sass')(require('sass'))
const postcss = require('gulp-postcss')
const autoprefixer = require('autoprefixer')
const groupmq = require('gulp-group-css-media-queries')
const bs = require('browser-sync')

const SASS_SOURCES = [
    './wordpress/wp-content/themes/enquetedavenir/*.scss', // Main scss file
    './wordpress/wp-content/themes/enquetedavenir/assets/scss/*.scss', // All other Sass files
];

/**
 * Compile Sass files
 */
gulp.task('compile:sass', () =>
    gulp.src(SASS_SOURCES, { base: './' })
        .pipe(plumber())
        .pipe(sass({
            indentType: 'tab',
            indentWidth: 1,
            outputStyle: 'expanded',
        })).on('error', sass.logError)
        .pipe(postcss([
            autoprefixer()
        ]))
        .pipe(groupmq())
        .pipe(gulp.dest('.'))
        .pipe(bs.stream()));

gulp.task('compile:watch', function () {
    gulp.watch(SASS_SOURCES, gulp.series('compile:sass'));
});