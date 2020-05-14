<?php
namespace Deployer;

require_once __DIR__ . '/vendor/autoload.php';

require 'recipe/common.php';
use YowayowaEnginners\SlackChannelProtector\Env;

// Project name
set('application', 'slack-channel-protector');

// Project repository
set('repository', 'https://github.com/yowayowa-enginners/slack-channel-protector.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', [
    '.env'
]);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);

// Hosts

host(Env::getEnvValue('HOSTNAME'))
    ->user(Env::getEnvValue('LOGINUSER'))
    ->port(ENV::getEnvValue('PORT'))
    ->stage('production')
    ->set('deploy_path', '~/slack-channel-protector');

// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
