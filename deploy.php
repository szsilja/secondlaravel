<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'secondlaravel');
set('remote_user', 'virt106859'); //virt...
set('http_user', 'virt106859');
set('keep_releases', 2);

// Hosts
host('ta21kask.itmajakas.ee')
    ->setHostname('ta21kask.itmajakas.ee')
    ->set('http_user', 'virt106859')
    ->set('deploy_path', '~/domeenid/www.ta21kask.itmajakas.ee/shop')
    ->set('branch', 'main');

// Tasks
set('repository', 'git@github.com:szsilja/secondlaravel.git');
//Restart opcache
task('opcache:clear', function () {
    run('killall php81-cgi || true');
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
after('deploy:failed', 'deploy:unlock');
