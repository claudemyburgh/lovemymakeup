var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    sourcemaps   = require('gulp-sourcemaps'),
    concat       = require('gulp-concat'),
    plumber      = require('gulp-plumber'),
    uglify       = require('gulp-uglify'),
    uncss        = require('gulp-uncss'),
    nano         = require('gulp-cssnano'),
    csslint      = require('gulp-csslint'),
    prefix       = require('gulp-autoprefixer'),
    imagemin     = require('gulp-imagemin'),
    //htmlmin      = require('gulp-htmlmin'),
    iconfont     = require('gulp-iconfont'),
    iconfontCss  = require('gulp-iconfont-css'),
    browserSync  = require('browser-sync'),
    reload       = browserSync.reload,
    connect      = require('gulp-connect-php'),
    runTimestamp = Math.round(Date.now()/1000),
    webp         = require('gulp-webp'),
    fontName     = 'Framer-icon';




var Paths = {
  'app':    'Framer',
  'js':     'Framer/js',
  'bower':  'bower_components',
  'output': '../version1/wp-content/themes/lovemymakeup'
};

var ignoreArray = [
  '.toggleMenu',
  '.toggleMenu ul',
  '.toggleMenu ul li',
  '.accordion-trigger-open',
  '.svg-button',
  '::-webkit-scrollbar',
  '::-webkit-scrollbar-thumb',
];

/* Browser sync */

gulp.task('connect', function() {
  connect.server({
    base: './version1',
    port: 8001,
    keepAlive: true
  });
  console.log('connected');

});


/////////////////////////////////
// Initialize BrowserSync
/////////////////////////////////

gulp.task('browserSync',['connect'], function() {
    browserSync({
      proxy: '127.0.0.1:8001',
      port: 8910,
      open: true,
      notify: false,
      online: false
    });
  });



/* Html Task */
gulp.task('html', function(){
  return gulp.src(Paths.app + '/html/**/*.php')
    .pipe(plumber())
    // .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest(Paths.output ));
});

/* Sass Setup */
gulp.task('sass', function(){
	return gulp.src(Paths.app + '/sass/**/*.sass')
		.pipe(plumber())
    .pipe(sourcemaps.init())
		.pipe(sass({
      outputStyle: 'expanded',
      includePaths: [
        Paths.app + '/fonts/Framer-icon/sass/',
        Paths.bower + '/owl-carousel/owl-carousel/',
        Paths.bower + '/lightbox2/dist/css/',
      ]
		} ).on('error', sass.logError))
    .pipe(prefix({
			browsers: ['last 5 versions', 'safari 5', 'ie 8', 'ie 9'],
			cascade: false
		}))
    // .pipe(uncss({
    //   html: [Paths.app + '/html/**/*.php'],
    //   ignore: ignoreArray
    // }))
    .pipe(nano())
    .pipe(sourcemaps.write('/'))
		.pipe(gulp.dest(Paths.output + '/'));
});



gulp.task('script', function(){
  gulp.src([
    Paths.js + '/jquery.js',
    Paths.bower + '/jquery-easing-original/jquery.easing.js',
    //Paths.bower + '/isotope/dist/isotope.pkgd.js',
    //Paths.bower + '/lightbox2/dist/js/lightbox.js',
    Paths.bower + '/owl-carousel/owl-carousel/owl.carousel.js',
    //Paths.bower + '/tweenmax/TweenMax.js',
    //Paths.bower + '/tweenmax/TimelineMax.js',
    // Paths.bower + '/jquery.pin-gh-pages/jquery.pin.js',
    Paths.js + '/framer.js',
    Paths.js + '/app.js'
  ])
  .pipe(plumber())
  .pipe(concat('app.js'))
  .pipe(uglify())
  .pipe(gulp.dest(Paths.output + '/js'));
});


gulp.task('img', function(){
	return gulp.src(Paths.app + '/img/**/*')
		.pipe(imagemin({
			progressive: true
		}))
		.pipe(gulp.dest(Paths.output + '/img'));
});

gulp.task('webp', function(){
	return gulp.src(Paths.output + '/img/**/*')
    .pipe(webp())
		.pipe(gulp.dest(Paths.output + '/webp/'));
});

gulp.task('mod', function(){
	return gulp.src([Paths.app + '/js/modernizr-custom.js', Paths.app + '/js/customizer.js', Paths.app + '/js/admin.js', Paths.app + '/js/wcavi-custom-script.js'])
    .pipe(uglify())
		.pipe(gulp.dest(Paths.output + '/js'));
});

gulp.task('lint', function(){
  gulp.src(Paths.output + '/css/*.css')
    .pipe(csslint())
    .pipe(csslint.reporter());

});



// icon maker

gulp.task('icon', function(){
  gulp.src([Paths.app + '/Font-assets/svgicons/*.svg'])
    .pipe(iconfontCss({
      fontName: fontName,
      path: Paths.app + '/Font-assets/templates/_icons.scss',
      targetPath: '/sass/_icons.scss',
      fontPath: 'fonts/Framer-icon/',
      cssClass: 'fr'
    }))
    .pipe(iconfont({
      fontName: fontName,
      appendUnicode: true, // recommended option
      formats: ['ttf', 'eot', 'woff', 'svg'], // default, 'woff2' and 'svg' are available
      timestamp: runTimestamp, // recommended to get consistent builds when watching files
     }))
    .pipe(gulp.dest(Paths.app + '/fonts/Framer-icon/'));
});

//transport font
gulp.task('font', function(){
  gulp.src(Paths.app + '/fonts/**/*')
    .pipe(gulp.dest(Paths.output + '/fonts'));
});

/* Watch Tasks */
gulp.task('watch', function(){
	gulp.watch(Paths.app + '/sass/**/*', ['sass']);
	gulp.watch(Paths.app + '/html/**/*.php', ['html']);
	gulp.watch(Paths.app + '/img/**/*', ['img']);
	gulp.watch(Paths.app + '/js/**/*', ['script', 'mod']);
});



gulp.task('default', ['sass', 'html','img','script', 'mod','watch']);
