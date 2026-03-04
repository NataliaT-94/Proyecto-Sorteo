const gulp = require('gulp');
const { src, dest, watch, parallel } = gulp;

const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const sourcemaps = require('gulp-sourcemaps');
const terser = require('gulp-terser');
const rename = require('gulp-rename');
const webpack = require('webpack-stream');

/* ===== FIX gulp-webp (ESM) ===== */
let webp;
async function loadWebp() {
    if (!webp) webp = (await import('gulp-webp')).default;
    return webp;
}

/* ===== FIX gulp-imagemin (ESM) ===== */
let imagemin;
async function loadImagemin() {
    if (!imagemin) imagemin = (await import('gulp-imagemin')).default;
    return imagemin;
}

const paths = {
    scss: 'src/scss/app.scss',
    js: 'src/js/**/*.js',
    imgRaster: 'src/img/**/*.{jpg,jpeg,png}',
    imgAll: 'src/img/**/*.{svg,gif,ico,jpg,jpeg,png}'
};

function css() {
    return src(paths.scss)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'expanded' }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('public/build/css'));
}

function javascript() {
    return src('./src/js/app.js')
        .pipe(webpack({
            mode: 'production',
            entry: './src/js/app.js'
        }))
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('public/build/js'));
}

async function imagenes() {
    const imageminPlugin = await loadImagemin();
    return src(paths.imgAll)
        .pipe(imageminPlugin())
        .pipe(dest('public/build/img'));
}

async function versionWebp() {
    const webpPlugin = await loadWebp();
    return src(paths.imgRaster)
        .pipe(webpPlugin())
        .pipe(dest('public/build/img'));
}

function dev(done) {
    watch('src/scss/**/*.scss', css); // watch puede seguir amplio
    watch(paths.js, javascript);
    watch(paths.imgAll, imagenes);
    watch(paths.imgRaster, versionWebp);
    done();
}

exports.css = css;
exports.js = javascript;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.dev = parallel(css, javascript, imagenes, versionWebp, dev);