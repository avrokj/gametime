<?php

namespace Deployer;

require 'recipe/laravel.php';

// Veebimajutus ühendus
set('application', 'gametime');
set('remote_user', 'vhost122307ssh');
set('http_user', 'vhost122307ssh');
set('keep_releases', 2);

host('gametime.ee')
    ->setHostname('gametime.ee')
    ->set('port', '1022')
    ->set('http_user', 'vhost122307ssh')
    ->set('deploy_path', '~/htdocs')
    ->set('branch', 'main');

set('repository', 'git@github.com:avrokj/gametime.git');
// set('repository', 'https://github.com/avrokj/gametime.git');


// Tasks
task('opcache:clear', function () {
    run('killall php82-cgi || true');
})->desc('Clear opcache');

task('build:node', function () {
    cd('{{release_path}}');
    run('npm i');
    // run('npx vite build');
    run('rm -rf node_modules');
});

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'build:node',
    'deploy:publish',
    'opcache:clear',
    'artisan:cache:clear'
]);


// Hooks

after('deploy:failed', 'deploy:unlock');
