/*
安装
npm install --save-dev gulp
cnpm install --save-dev gulp

启动
gulp

*/
var gulp = require('gulp');
var concat = require('gulp-concat'); //合并文件
var sass = require('gulp-sass'); //把 Sass 编译成 CSS
var minifyCss = require('gulp-minify-css'); //最小化 css 文件
var uglify = require('gulp-uglify'); //最小化 js 文件
var rename = require('gulp-rename'); //重命名
var merge = require('merge-stream'); //在一个任务中使用多个文件来源
var htmlmin = require('gulp-htmlmin');//压缩 HTML 文件




/*
BrowserSync，调试利器--自动刷新方案，用 Node.js 先到这个目录
cd C:\wamp\www\wp\wp-content\themes\sage_child
#下面的方案可用
*/
//browser-sync start --proxy "www.wp.com" --host "www.wp.com" --files "**/*.php,css/main.min.css,js/main.min.js"

gulp.task('default', ['watch']);


//gulp watch
//执行全部自动化的集合，仅仅为了集合 gulp watch-css 和 gulp watch-js 这 2 个命令
gulp.task('watch', function () {
    gulp.watch('assets/styles/**/*.scss', ['concat-css']);
    gulp.watch('assets/scripts/customizer.js', ['concat-js']);
});


//gulp watch-css
//用 node 监听看守更新文件自动化，且自动执行 gulp concat-css
gulp.task('watch-css', function () {
    // 看守所有.scss档
    gulp.watch('assets/styles/**/*.scss', ['concat-css']);
});

//gulp concat-css
//合并的 css 包含自定义和插件
gulp.task('concat-css', function () {
    return gulp.src([
'assets/bootstrap-3.3.5-dist/css/bootstrap.min.css', //框架
'assets/fonts/Font-Awesome-master/css/font-awesome.min.css', //字体
'assets/styles/**/*.scss' //基于文件
]) //按顺序合并指定 css 文件
        .pipe(sass().on('error', sass.logError)) //转换到CSS
        .pipe(concat('main.css')) //合并输出后的 css
        .pipe(gulp.dest('dist/styles')) //输出
        .pipe(minifyCss({
            compatibility: 'ie8'
        })) //最小化 css 文件
        .pipe(rename("main.min.css")) //重命名
        .pipe(gulp.dest("dist/styles")) //再输出压缩后的
    ;
});


//gulp watch-js
//用 node 监听看守更 js.js 文件自动化，且自动执行 gulp concat-js
gulp.task('watch-js', function () {
    // 看守所有.js文件
    gulp.watch('assets/scripts/customizer.js', ['concat-js']); //自定义的 js 文件更改后，会执行全部压缩合并
});

//gulp concat-js
//作用于js处理 合并 js 文件
gulp.task('concat-js', function () {
    //  return gulp.src('plugin/**/*.js') //合并此目录下的所有 js 文件
    return gulp.src([
'assets/jquery/1.11.3/jquery.min.js', //
'assets/bootstrap-3.3.5-dist/js/bootstrap.min.js', //
'assets/jquery/jquery.pin-gh-pages/jquery.pin.min.js', //jQuery.Pin 把“它”钉在那里！现用于：产品内容页的顶部右侧同分类小导航
'assets/scripts/customizer.js' //自定义 js 文件，自己添加的 js 文件
]) //按顺序合并指定 js 文件
        .pipe(concat('main.js')) //合并输出后的 js
        .pipe(gulp.dest('dist/scripts')) //输出
        .pipe(uglify()) //最小化输出后的 js 文件
        .pipe(rename("main.min.js")) //重命名
        .pipe(gulp.dest('dist/scripts')); //输出最小化后的 js 文件
});


//gulp concat-js-ie
//作用于js处理 合并 兼容IE 的 js 文件
gulp.task('concat-js-ie', function () {
    return gulp.src([
'assets/scripts/html5shiv/3.7.2/html5shiv.min.js', // 让IE支持html5属性
'assets/scripts/respond.js/1.4.2/respond.min.js'//IE兼容（这两个文件是兼容IE用的）
]) //按顺序合并指定 js 文件
        .pipe(concat('ie.js')) //合并输出后的 js
        .pipe(gulp.dest('dist/scripts')) //输出
        .pipe(uglify()) //最小化输出后的 js 文件
        .pipe(rename("ie.min.js")) //重命名
        .pipe(gulp.dest('dist/scripts')); //输出最小化后的 js 文件
});

