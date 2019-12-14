var gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    merge = require('merge-stream'),
    watch = require('gulp-watch'),
    replace = require('gulp-replace'),
    minifyCSS = require('gulp-clean-css'),
    minifyJS = require('gulp-uglify'),
    theme = ['./src/theme/**/*'],
    js = ['./src/js/*'],
    watchPaths = ['./src/sass/*.scss', './src/theme/**/*'];

function createCSSFiles(variable, file, compressedFile) {
    variable.pipe(concat(file))
        .pipe(gulp.dest('css/'));

    return variable.pipe(concat(compressedFile))
        .pipe(replace('/*', '/*!'))
        .pipe(minifyCSS())
        .pipe(gulp.dest('css/'));
}

function renderCSS() {
    var screenSCSS = ['./src/sass/screen.scss'],
        printSCSS = ['./src/sass/print.scss'],
        rtlSCSS = ['./src/sass/rtl.scss'],
        editorSCSS = ['./src/sass/editor-style.scss'],
        reset = ['node_modules/reset.css/reset.css'];

    var screen = merge(
            gulp.src(screenSCSS).pipe(sass()),
            gulp.src(reset)
        );

    var print = gulp.src(printSCSS)
        .pipe(sass());
    var rtl = gulp.src(rtlSCSS)
        .pipe(sass());
    var editor = gulp.src(editorSCSS)
        .pipe(sass());

    createCSSFiles(screen, 'screen.css', 'screen.min.css');
    createCSSFiles(print, 'print.css', 'print.min.css');
    createCSSFiles(editor, 'editor-style.css', 'editor-style.min.css');
    return createCSSFiles(rtl, 'rtl.css', 'rtl.min.css');
}

function compressJS(variable, filename) {
    return variable.pipe(minifyJS({
        output: {
            comments: "all"
        }
    }))
        .pipe(concat(filename))
        .pipe(gulp.dest('./js/'));
}

function renderJS() {
    var bootstrap = merge(
        gulp.src('node_modules/bootstrap/js/tooltip.js'),
        gulp.src('node_modules/bootstrap/js/popover.js')
    ),
        enigma = gulp.src('./src/js/jquery.enigma.js'),
        scrollupformenu = gulp.src('./src/js/jquery.scrollupformenu.js');

    bootstrap.pipe(concat('bootstrap.js'))
        .pipe(gulp.dest('./js/'));

    compressJS(scrollupformenu, 'jquery.scrollupformenu.min.js');
    compressJS(enigma, 'jquery.enigma.min.js');
    compressJS(bootstrap, 'bootstrap.min.js');

    return gulp.src(js)
        .pipe(gulp.dest('./js/'));
}

gulp.task('stylesheets', function () {
    return renderCSS();
})

gulp.task('js', function () {
    return renderJS();
})

gulp.task('theme', function () {
    return gulp.src(theme)
        .pipe(gulp.dest('.'));
})

gulp.task('dev', function () {
    return gulp.watch(watchPaths, gulp.parallel('stylesheets', 'js', 'theme'));
})

gulp.task('make', function () {
    gulp.series('stylesheets', 'js');
    gulp.src('license.txt')
        .pipe(gulp.dest('dist/'));
    gulp.src('css/*')
        .pipe(gulp.dest('dist/css/'));
    gulp.src('js/*')
        .pipe(gulp.dest('dist/js/'));

    return gulp.src(theme)
        .pipe(gulp.dest('dist/'));
})