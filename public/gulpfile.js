// Описываем установленные плагины и зависимости
var gulp = require('gulp');
var concat = require('gulp-concat');
var less = require('gulp-less');
var minifyCSS = require('gulp-minify-css');
var imagemin = require('gulp-imagemin');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');

var rigger = require('gulp-rigger');
var uglify = require('gulp-uglify');

//все нужные нам пути, чтобы при необходимости легко в одном месте их редактировать
var path = {
   build: { //Тут мы укажем куда складывать готовые после сборки файлы
       js: './js/',
       css: './css/',
       image: './images/',
       fonts: './fonts/'
   },
   src: { //Пути откуда брать исходники
       js: 'src/js/**/*.*',//В стилях и скриптах нам понадобятся только main файлы
       //style:'./src/style/main.less',
       less:'./src/less/*.less',
       image: './images/**/*.*', //Синтаксис img/**/*.* означает - взять все файлы всех расширений из папки и из вложенных каталогов
       fonts: './src/fonts/**/*.*'
   },
   clean: './build'
};


// Объявляем задачи с названием css
gulp.task('css', function() {
 return gulp.src(path.src.less)// Собираем less-файлы из папки less
  .pipe(less()) // Компилируем в CSS, конкатенируем и сжимаем
  .pipe(sourcemaps.init())
  .pipe(autoprefixer({browsers: ['last 5 versions']}))
  //.pipe(concat('main.min.css'))
  .pipe(sourcemaps.write('.'))
  .pipe(minifyCSS())
  .pipe(gulp.dest(path.build.css));// Складываем в папку css
});

gulp.task('image', function() {
   return gulp.src(path.src.image)
   .pipe(imagemin({
       progressive: true,
       debug: true
      }))
   .pipe(gulp.dest(path.build.image));
});

gulp.task('script', function () {
    gulp.src(path.src.js) //Найдем наш main файл
    .pipe(rigger()) //Прогоним через rigger
    //.pipe(sourcemaps.init()) //Инициализируем sourcemap
    .pipe(uglify()) //Сожмем наш js
    //.pipe(sourcemaps.write()) //Пропишем карты
    .pipe(concat('main.min.js'))
    .pipe(gulp.dest(path.build.js)) //Выплюнем готовый файл в build
});

//Затем добавьте задачу, которая следит за файлами и при их изменении запускает taskcss:
gulp.task('watch', function() {
   // gulp выполняет слежение с помощью встроенной функции watch
   gulp.watch(path.src.image, ['image']);
   gulp.watch(path.src.less, ['css']);
   gulp.watch(path.src.js, ['script']);
});

gulp.task('default',['css', /*'image',*/'script', 'watch']);