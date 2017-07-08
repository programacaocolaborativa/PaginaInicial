<?php

use ProColab\Application;
use ProColab\Plugins\AuthPlugin;
use ProColab\Plugins\DbPlugin;
use ProColab\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

return $app;