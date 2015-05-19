var path = require('path');
var gulp = require('gulp');
var less = require('gulp-less');
var minifyCSS = require('gulp-minify-css');
var concat = require('gulp-concat');
var rebaseUrls = require('gulp-css-rebase-urls');
var uglify = require('gulp-uglifyjs');
var gzip = require('gulp-gzip');

//

// list plugin files
var plugin_js_files = [
    'uxui/less.js/dist/less.js',
    'uxui/modernizr/modernizr.js',
    'uxui/jquery/dist/jquery.js',
    'uxui/jkit/jquery.easing.1.3.js',
    'uxui/jkit/jquery.jkit.1.2.16.js',
    'uxui/underscore/underscore.js',
    'uxui/backbone/backbone.js',
    'uxui/backbone.mutators/backbone.mutators.js',
    'uxui/bootstrap/dist/js/bootstrap.js',

    '/themes/tobacco/assets/ux/app.js'
];

var less_files = [
    'uxui/bootstrap/dist/css/bootstrap.css',
    'themes/tobacco/assets/style.less'
];

// less compile
gulp.task('minify-css', function() {
    return gulp.src(less_files)
        .pipe(less())
        .pipe(rebaseUrls())
        .pipe(concat('minifyUI.css'))
        .pipe(minifyCSS())
        .pipe(gzip())
        .pipe(gulp.dest('./themes/tobacco/assets'));
});

gulp.task('minify-js', function() {
    return gulp.src(plugin_js_files)
        .pipe(uglify('minifyUX.js', {
            mangle: true,
            compress: {
                sequences: true,
                dead_code: true,
                conditionals: true,
                booleans: true,
                unused: true,
                if_return: true,
                join_vars: true,
                drop_console: true
            }
        }))
        .pipe(gzip())
        .pipe(gulp.dest('./theme/tobacco/assets'));
});



// registion
// The default task (called when you run `gulp` from cli)
gulp.task('default', ['minify-css', 'minify-js']);