/* NO ES NECESARIO MODIFICAR ESTE ARCHIVO */

// Gulp
const {src, dest, watch, parallel} = require("gulp");
const plumber = require("gulp-plumber");
const sourcemaps = require("gulp-sourcemaps");
// Sass
const sass = require("gulp-sass")(require("sass"));
// CSS
const cssnano = require("cssnano");
const autoprefixer = require("autoprefixer");
const postcss = require("gulp-postcss");
// JS
const js = require("gulp-terser-js");
// Imágenes
const cache = require("gulp-cache");
const imagemin = require("gulp-imagemin");
const webp = require("gulp-webp");
const avif = require("gulp-avif");

/* Tarea encargada de compilar los archivos SASS */
function compilarSass(done) {
    src("src/scss/**/*.scss")
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write("."))
        .pipe(dest("build/css"));
    done();
}

/* Tarea encargada de minificar los archivos JS */
function minificarJS(done) {
    src("src/js/**/*.js")
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(js())
        .pipe(sourcemaps.write("."))
        .pipe(dest("build/js"));
    done();
}

/* Tarea encargada de observar por cambios en archivos SASS y JS */
function mirarCambios(done) {
    watch("src/scss/**/*.scss", compilarSass);
    watch("src/js/**/*.js", minificarJS);
    done();
}

/* Tarea encargada de optimizar las imágenes en formato PNG y JPG, reduciendo el tamaño de estas */
function optimizarImagenes(done) {
    const parameters = {optimizationLevel: 3};
    src("src/img/**/*.{png,jpg}")
        .pipe(cache(imagemin(parameters)))
        .pipe(dest("build/img"));
    done();
}

/* Tarea encargada de convertir las imágenes en formato PNG y JPG a formato Webp */
function toWebp(done) {
    const parameters = {quality: 50};
    src("src/img/**/*.{png,jpg}")
        .pipe(webp(parameters))
        .pipe(dest("build/img"));
    done();
}

/* Tarea encargada de convertir las imágenes en formato PNG y JPG a formato AVIF */
function toAvif(done) {
    const parameters = {quality: 50};
    src("src/img/**/*.{png,jpg}")
        .pipe(avif(parameters))
        .pipe(dest("build/img"));
    done();
}

/* Tarea encargada de mover las imágenes en formato AVIF a la carpeta BUILD, solo las mueve, no les hace nada */
function moverSvg() {
    return src("src/img/**/*.svg")
        .pipe(dest("build/img"));
}


/* Exportación de las tareas para ser ejecutadas con el comando npx gulp nombreTarea */
exports.imagenes_ = parallel(optimizarImagenes, toWebp, toAvif, moverSvg);
exports.mirar_ = parallel(compilarSass, minificarJS, mirarCambios);