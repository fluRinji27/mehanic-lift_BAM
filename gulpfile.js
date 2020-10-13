let gulp = require('gulp'),
    babel = require('gulp-babel'),
    watch = require('gulp-watch'),
    prefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    sourcemaps = require('gulp-sourcemaps'),
    cssmin = require('gulp-minify-css'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    rimraf = require('rimraf');
let include = require('gulp-include')

const path = {
    build: { //Тут мы укажем куда складывать готовые после сборки файлы
        js: 'template/js/',
        css: 'template/css/',
        img: 'template/img/',
        fonts: 'template/fonts/'
    },
    src: { //Пути откуда брать исходники
        js: 'src/js/index.js',//В стилях и скриптах нам понадобятся только main файлы
        style: 'src/css/index.css',
        img: 'src/img/**/*.*', //Синтаксис img/**/*.* означает - взять все файлы всех расширений из папки и из вложенных каталогов
        fonts: 'src/fonts/**/*.*'
    },
    watch: { //Тут мы укажем, за изменением каких файлов мы хотим наблюдать
        js: 'src/js/**/**.js',
        style: 'src/css/**/**.css',
        img: 'src/img/**/**.*',
        fonts: 'src/fonts/**/**.*'
    },
    clean: './template'
};

gulp.task('js:build', function (done) {
    gulp.src(path.src.js) //Найдем наш main файл
        .pipe(include()) //Прогоним через rigger
        .pipe(sourcemaps.init()) //Инициализируем sourcemap
        .pipe(babel({presets: ['@babel/env']}))
        .pipe(uglify()) //Сожмем наш js
        .pipe(sourcemaps.write()) //Пропишем карты
        .pipe(gulp.dest(path.build.js)) //Выплюнем готовый файл в build

    done()
});

gulp.task('style:build', function (done) {
    gulp.src(path.src.style) //Выберем наш main.scss
        .pipe(include())
        .pipe(sourcemaps.init()) //То же самое что и с js
        .pipe(prefixer()) //Добавим вендорные префиксы
        .pipe(cssmin()) //Сожмем
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.css)) //И в build
    done()
});

gulp.task('image:build', function (done) {
    gulp.src(path.src.img) //Выберем наши картинки
        .pipe(imagemin({ //Сожмем их
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()],
            interlaced: true
        }))
        .pipe(gulp.dest(path.build.img)) //И бросим в build

    done()
});

gulp.task('fonts:build', function () {
    gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.build.fonts))
});

gulp.task('build', gulp.parallel(
    'js:build',
    'style:build',
    // 'fonts:build',
    // 'image:build'
));

gulp.task('watch', function (done) {
    gulp.watch(path.watch.style, gulp.series('style:build'));
    gulp.watch(path.watch.js, gulp.series('js:build'));
    gulp.watch(path.watch.img, gulp.series('image:build'));
    gulp.watch(path.watch.fonts, gulp.series('fonts:build'));
    done()
});

gulp.task('clean', function (cb) {
    rimraf(path.clean, cb);
});

gulp.task('default', gulp.parallel('build', 'watch'));
