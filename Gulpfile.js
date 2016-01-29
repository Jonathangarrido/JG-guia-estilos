// File: Gulpfile.js
'use strict';

var gulp = require('gulp'),
    connect = require('gulp-connect'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    inject = require('gulp-inject'),
    wiredep = require('wiredep').stream,
    gulpif = require('gulp-if'),
    minifyCss = require('gulp-minify-css'),
    useref = require('gulp-useref'),
    uglify = require('gulp-uglify'),
    uncss = require('gulp-uncss'),
    glob = require('glob');

// Servidor web de desarrollo
gulp.task('server', function(){
  connect.server({
    root: './app',
    port: 8080,
    livereload: true
  });
})

// Servidor web para probar el entorno de producción
gulp.task('server-dist', function() {
  connect.server({
    root: './dist',
    port: 8080,
    livereload: true
  });
})

// Busca errores en el JS y nos los muestra por pantalla
gulp.task('jshint', function() {
  return gulp.src('./app/scripts/**/*.js')
    .pipe(jshint('.jshintrc'))
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(connect.reload());
});

// Preprocesa archivos SASS a CSS y recarga los cambios
gulp.task('css', function() {
  gulp.src('./app/stylesheets/main.sass')
    .pipe(sass({outputStyle: 'compact'}).on('error', sass.logError))
    .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
    .pipe(concat('./main.css'))
    .pipe(gulp.dest('./app/stylesheets'))
    .pipe(connect.reload());
});

// Recarga el navegador cuando hay cambios en el HTML
gulp.task('html', function() {
  gulp.src('./app/**/*.html')
    .pipe(connect.reload());
});

// Busca en las carpetas de estilos y javascript los archivos
// para inyectarlos en el index.html
gulp.task('inject', function() {
  var sources = gulp.src([
    './app/scripts/**/*.js',
    './app/stylesheets/**/*.css']);
  return gulp.src('index.html', {cwd: './app'})
    .pipe(inject(sources, {
      read: false,
      ignorePath: '/app'
    }))
    .pipe(gulp.dest('./app'));
});

// Inyecta las librerias que instalemos vía Bower
// si se utiliza bootstrap cambiar su bower.json
//"main": ["./dist/css/bootstrap.css"]
gulp.task('wiredep', function () {
  gulp.src('./app/index.html')
    .pipe(wiredep({
      bowerJson: require('./bower.json')
    }))
    .pipe(gulp.dest('./app'));
});


// Comprime los archivos CSS y JS enlazados en el index.html
// y los minifica.
gulp.task('compress', function() {
  gulp.src('./app/index.html')
    .pipe(useref())
    .pipe(gulpif('*.js', uglify({mangle: false })))
    .pipe(gulpif('*.css', minifyCss()))
    .pipe(gulp.dest('./dist'));
});

// Elimina el CSS que no es utilizado para reducir el peso
// del archivo
gulp.task('uncss', function() {
  gulp.src('./dist/css/style.min.css')
    .pipe(uncss({
      html: glob.sync('./dist/index.html')
    }))
    .pipe(gulp.dest('./dist/css'));
});

// Copia el contenido de los estáticos e index.html al directorio
// de producción sin tags de comentarios
gulp.task('copy', function() {
  gulp.src('./app/fonts/**')  
    .pipe(gulp.dest('./dist/fonts'));
  gulp.src('./app/images/**')  
    .pipe(gulp.dest('./dist/images'));
});

// Vigila cambios que se produzcan en el código
// y lanza las tareas relacionadas
gulp.task('watch', function() {
  gulp.watch(['./app/**/*.html'], ['html']);
  gulp.watch(['./app/stylesheets/**/*.sass'], ['css', 'inject']);
  gulp.watch(['./app/scripts/**/*.js', './Gulpfile.js'], ['jshint', 'inject']);
  gulp.watch(['./bower.json'], ['wiredep']);
});

gulp.task('default', ['server','inject','wiredep','watch']);

gulp.task('build', ['compress','copy']);