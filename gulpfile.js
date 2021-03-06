"use strict";

// Load plugins
const autoprefixer = require("gulp-autoprefixer");
const browsersync = require("browser-sync").create();
const cleanCSS = require("gulp-clean-css");
const del = require("del");
const gulp = require("gulp");
const header = require("gulp-header");
const merge = require("merge-stream");
const plumber = require("gulp-plumber");
const rename = require("gulp-rename");
const sass = require("gulp-sass");
const uglify = require("gulp-uglify");
const fs = require('fs');
const assetsPath = './assets';

// Load package.json for banner
const pkg = require('./package.json');

// Set the banner content
const banner = ['/*!\n',
  ' * Start Bootstrap - <%= pkg.title %> v<%= pkg.version %> (<%= pkg.homepage %>)\n',
  ' * Copyright 2013-' + (new Date()).getFullYear(), ' <%= pkg.author %>\n',
  ' * Licensed under <%= pkg.license %> (https://github.com/StartBootstrap/<%= pkg.name %>/blob/master/LICENSE)\n',
  ' */\n',
  '\n'
].join('');

// set WordPress stylesheet header
const wpHeader = `/*!
  Theme Name: <%= pkg.title %>
  Theme URI: <%= pkg.homepage %>
  Author: ${
    pkg.contributors.map(i => i.match(/([A-Z]\w+)/g).join(' ')).join(', ')
  }
  Author URI: ${
    pkg.contributors.map(i => i.match(/(?<=\()[\w:.\/]+(?=\))/)).join(', ')
  }
  Description: <%= pkg.description %>
  Version: <%= pkg.version %>
  License: <%= pkg.license %>
  License URI: https://github.com/StartBootstrap/<%= pkg.name %>/blob/master/LICENSE
  Tags: BootStrap
*/
`;

// BrowserSync
function browserSync(done) {
  browsersync.init({
    server: {
      baseDir: "./"
    },
    port: 3000
  });
  done();
}

// BrowserSync reload
function browserSyncReload(done) {
  browsersync.reload();
  done();
}

// Clean vendor
function clean() {
  return del(["./vendor/"]);
}

function module_path(module) {
  // Yarn 2 Pnp
  if (process.versions.pnp) {
    return (require('path')).dirname(require.resolve(`${module}/package.json`));
  }
  // Yarn 1 (classic)
  if (!process.versions.pnp) {
    return `./node_modules/${module}`;
  }
}

// Bring third party dependencies from node_modules into vendor directory
function modules() {
  // Bootstrap
  var bootstrap = gulp.src(module_path('bootstrap') + '/dist/**/*')
    .pipe(gulp.dest('./vendor/bootstrap'));
  // Font Awesome CSS
  var fontAwesomeCSS = gulp.src(module_path('@fortawesome/fontawesome-free') + '/css/**/*')
    .pipe(gulp.dest('./vendor/fontawesome-free/css'));
  // Font Awesome Webfonts
  var fontAwesomeWebfonts = gulp.src(module_path('@fortawesome/fontawesome-free') + '/webfonts/**/*')
    .pipe(gulp.dest('./vendor/fontawesome-free/webfonts'));
  // jQuery
  var jquery = gulp.src([
      `${module_path('jquery')}/dist/*`,
      `!${module_path('jquery')}/dist/core.js`,
    ])
    .pipe(gulp.dest('./vendor/jquery'));
  return merge(bootstrap, fontAwesomeCSS, fontAwesomeWebfonts, jquery);
}

// CSS task
function css() {
  return gulp
    .src("./src/scss/**/*.scss")
    .pipe(plumber())
    .pipe(sass({
      outputStyle: "expanded",
      includePaths: "./node_modules",
    }))
    .on("error", sass.logError)
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(header(banner, {
      pkg: pkg
    }))
    .pipe(gulp.dest(`${assetsPath}/css`))
    .pipe(rename({
      suffix: ".min"
    }))
    .pipe(cleanCSS())
    .pipe(gulp.dest(`${assetsPath}/css`))
    .pipe(browsersync.stream());
}

// JS task
function js() {
  return gulp
    .src([
      './js/*.js',
      '!./js/*.min.js',
      '!./js/contact_me.js',
      '!./js/jqBootstrapValidation.js'
    ])
    .pipe(uglify())
    .pipe(header(banner, {
      pkg: pkg
    }))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest(`${assetsPath}/js`))
    .pipe(browsersync.stream());
}

// Watch files
function watchFiles() {
  gulp.watch(`${assetsPath}/src/scss/**/*`, css);
  gulp.watch([`${assetsPath}/js/**/*`, `!${assetsPath}/js/**/*.min.js`], js);
  gulp.watch(`${assetsPath}/**/*.html`, browserSyncReload);
}

// WordPress task
function wp() {
  fs.writeFileSync('style.css', '');
  return gulp
    .src("./style.css")
    .pipe(header(wpHeader, {
      pkg: pkg
    }))
    .pipe(gulp.dest("./"));
}

// Define complex tasks
const vendor = gulp.series(clean, modules);
const build = gulp.series(vendor, gulp.parallel(css, js, wp));
const watch = gulp.series(build, gulp.parallel(watchFiles, browserSync));

// Export tasks
exports.css = css;
exports.js = js;
exports.clean = clean;
exports.vendor = vendor;
exports.build = build;
exports.watch = watch;
exports.default = build;
exports.wp = wp;
exports.wordpress = wp;
