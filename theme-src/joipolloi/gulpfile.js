const gulp = require('gulp');
const webpack = require('webpack');
const del = require('del');
const webpackConfig = require('./webpack.config.js');
const config = require('./build-config').gulp;
const bsConfig = require('./build-config').browserSync;
const browserSync = require('browser-sync').create();

function replaceVersion(config) {
    gulp.task('replaceVersion', function (cb) {
        const log = require('fancy-log');
        const colors = require('ansi-colors');
        const PluginError = require('plugin-error');
        const pjson = require('./package.json');
        const replace = require('replace-in-file');
        try {
            // read current version from package.json
            log(
                `Replacing ${config.replaceVersion.php.from} with ${config.replaceVersion.php.to} in all PHP files.`
            );
            config.replaceVersion.php.to = pjson.version;
            const changedFilesPhp = replace.sync(config.replaceVersion.php);
            for (const file of changedFilesPhp) {
                log(`Updated ${file}`);
            }
            log(
                `Replacing ${config.replaceVersion.js.from} with ${config.replaceVersion.js.to} in all JS files.`
            );
            config.replaceVersion.js.to = pjson.version;
            const changedFilesJs = replace.sync(config.replaceVersion.js);
            for (const file of changedFilesJs) {
                log(`Updated ${file}`);
            }

            // replace WordPress theme version in style.css
            log('Updating WordPress theme version.');
            config.replaceVersion.wordpress.to += pjson.version;
            const changedFilesWp = replace.sync(
                config.replaceVersion.wordpress
            );
            if (changedFilesWp.length > 0) {
                for (const file of changedFilesWp) {
                    log(`Updated ${file}`);
                }
            } else {
                log(
                    colors.yellow(
                        'No changes made! Was the version already changed?'
                    )
                );
            }
        } catch (error) {
            throw new PluginError('replaceVersion', error);
        }
        cb();
    });
}

function revAssets(config) {
    // 1) Add md5 hashes to assets referenced by CSS and JS files
    gulp.task('revAssets', function () {
        const path = require('path');
        const rev = require('gulp-rev');
        const revNapkin = require('gulp-rev-napkin');
        // Ignore files that may reference assets. We'll rev them next.
        return gulp
            .src(config.rev.assetSrc)
            .pipe(rev())
            .pipe(gulp.dest(config.dest))
            .pipe(revNapkin({ verbose: false }))
            .pipe(
                rev.manifest(path.join(config.dest, 'rev-manifest.json'), {
                    merge: true,
                    base: config.dest,
                })
            )
            .pipe(gulp.dest(config.dest));
    });
}

function revRevvedFiles(config) {
    // 3) Rev and compress CSS and JS files (this is done after assets, so that if a
    //    referenced asset hash changes, the parent hash will change as well
    gulp.task('revRevvedFiles', function () {
        const path = require('path');
        const rev = require('gulp-rev');
        const revNapkin = require('gulp-rev-napkin');
        return gulp
            .src(config.rev.srcRevved)
            .pipe(
                rev({
                    replaceInExtensions: config.rev.revvedFileExtensions,
                })
            )
            .pipe(gulp.dest(config.dest))
            .pipe(revNapkin({ verbose: false }))
            .pipe(
                rev.manifest(path.join(config.dest, 'rev-manifest.json'), {
                    merge: true,
                    base: config.dest,
                })
            )
            .pipe(gulp.dest(config.dest));
    });
}

function revStaticFiles(config) {
    // 4) Update asset references in HTML
    gulp.task('revStaticFiles', function () {
        const path = require('path');
        const rewrite = require('gulp-rev-rewrite');
        var manifest = gulp.src(path.join(config.dest, '/rev-manifest.json'));
        return gulp
            .src(config.rev.srcStatic)
            .pipe(
                rewrite({
                    manifest: manifest,
                    replaceInExtensions: config.rev.staticFileExtensions,
                })
            )
            .pipe(gulp.dest(config.dest));
    });
}

function revUpdateReferences(config) {
    // 2) Update asset references with reved filenames in compiled css + js
    gulp.task('revUpdateReferences', function () {
        const path = require('path');
        const rewrite = require('gulp-rev-rewrite');
        var manifest = gulp.src(path.join(config.dest, 'rev-manifest.json'));

        return gulp
            .src(config.rev.srcRevved)
            .pipe(rewrite({ manifest: manifest }))
            .pipe(gulp.dest(config.dest));
    });
}

function rev() {
    gulp.task(
        'rev',
        gulp.series([
            // 1) Add md5 hashes to assets referenced by CSS and JS files
            'revAssets',
            // 2) Update asset references (images, fonts, etc) with reved filenames in compiled css + js
            'revUpdateReferences',
            // 3) Rev and compress CSS and JS files (this is done after assets, so that if a referenced asset hash changes, the parent hash will change as well
            'revRevvedFiles',
            // 4) Update asset references in HTML
            'revStaticFiles',
        ])
    );
}

replaceVersion(config);
revAssets(config);
revRevvedFiles(config);
revStaticFiles(config);
revUpdateReferences(config);
rev();

function clean() {
    return del([config.prodDirectory], { force: true });
}

/**
 * Run webpack to build assets as specified in webpack config
 */
function assets() {
    return new Promise((resolve, reject) => {
        webpack(webpackConfig, (err, stats) => {
            if (err) {
                return reject(err);
            }
            if (stats.hasErrors()) {
                return reject(new Error(stats.compilation.errors.join('\n')));
            }
            resolve();
        });
    });
}

/**
 * run dev server
 */
function serve(cb) {
    browserSync.init(bsConfig, cb);
}

function reload(cb) {
    browserSync.reload();
    cb();
}

function copy() {
    return gulp
        .src(
            [
                '*.php',
                '*.css',
                'dist/**/*',
                'inc/**/*',
                'lib/**/*',
                'templates/**/*',
                'woocommerce/**/*',
                'Components/**/*',
                '!Components/**/*.scss',
                '!Components/**/*.js',
                '!Components/**/*.md',
            ],
            { base: '.' }
        )
        .pipe(gulp.dest(config.prodDirectory));
}

function watch() {
    return gulp.watch(
        '**/*',
        {
            ignored: ['dist'],
        },
        gulp.series(assets, copy, reload)
    );
}

gulp.task('build', gulp.series([clean, assets]));

gulp.task('buildCopy', gulp.series([copy]));

gulp.task('dev', gulp.series([clean, assets, copy, serve, watch]));
