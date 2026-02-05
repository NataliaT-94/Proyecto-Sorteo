const { src, dest, watch, parallel } = require('gulp');

/* =======================
   CSS
======================= */
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');

/* =======================
   Imágenes
======================= */
const webp = require('gulp-webp');

/* =======================
   JavaScript
======================= */
const terser = require('gulp-terser-js');
const rename = require('gulp-rename');
const sourcemapsJs = require('gulp-sourcemaps');
const webpack = require('webpack-stream');

/* =======================
   Paths
======================= */
const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imgRaster: 'src/img/**/*.{jpg,jpeg,png}',
    imgVector: 'src/img/**/*.{svg,gif,ico}'
};

/* =======================
   Tareas CSS
======================= */
function css() {
    return src(paths.scss)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'expanded' }))
        // .pipe(postcss([autoprefixer(), cssnano()])) // producción
        .pipe(sourcemaps.write('.'))
        .pipe(dest('public/build/css'));
}

/* =======================
   Tareas JS
======================= */
function javascript() {
    return src('./src/js/app.js')
        .pipe(webpack({
            mode: 'production',
            entry: './src/js/app.js'
        }))
        .pipe(sourcemapsJs.init())
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemapsJs.write('.'))
        .pipe(dest('public/build/js'));
}

/* =======================
   Imágenes 
======================= */
function imagenes() {
    return src('src/img/**/*.{svg,gif,ico,jpg,jpeg,png}')
        .pipe(dest('public/build/img'));
}


/* =======================
   Imágenes WEBP
======================= */
function versionWebp() {
    return src(paths.imgRaster, { allowEmpty: true })
        .pipe(webp())
        .pipe(dest('public/build/img'));
}

/* =======================
   Watch
======================= */
function dev(done) {
    watch(paths.scss, css);
    watch(paths.js, javascript);
    watch('src/img/**/*.{svg,gif,ico,jpg,jpeg,png}', imagenes);
    watch('src/img/**/*.{jpg,jpeg,png}', versionWebp);
    done();
}

/* =======================
   Exports
======================= */
exports.css = css;
exports.js = javascript;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.dev = parallel(
    css,
    javascript,
    imagenes,
    versionWebp,
    dev
);
