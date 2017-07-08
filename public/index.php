<?php
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

use ProColab\Application;
use ProColab\Plugins\AuthPlugin;
use ProColab\Plugins\DbPlugin;
use ProColab\Plugins\RouterPlugin;
use ProColab\Plugins\ViewPlugin;
use ProColab\ServiceContainer;
use Psr\Http\Message\ServerRequestInterface;

require_once __DIR__ . '/../vendor/autoload.php';
if(file_exists(__DIR__. '/../.env')) {
    $dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
    $dotenv->overload();
}

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RouterPlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());

require_once (__DIR__ . '/../src/controllers/index.php');

$app->start();