<?php

namespace Deployer;

require 'recipe/laravel.php';

// Zone ühendus
set('application', 'ralf');
set('remote_user', 'virt118413');
set('http_user', 'virt118413');
set('keep_releases', 2);

host('ta22korva.itmajakas.ee')
    ->setHostname('ta22korva.itmajakas.ee')
    ->set('http_user', 'virt118413')
    ->set('deploy_path', '~/domeenid/www.ta22korva.itmajakas.ee/gametime')
    ->set('branch', 'main');

set('repository', 'git@github.com:avrokj/gametime.git');

// Tasks
task('opcache:clear', function () {
    run('killall php82-cgi || true');
})->desc('Clear opcache');

task('build:node', function () {
    cd('{{release_path}}');
    run('npm i');
    run('npx vite build');
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
