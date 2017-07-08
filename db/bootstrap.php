<?php

use PlantasBr\Application;
use PlantasBr\Plugins\AuthPlugin;
use PlantasBr\Plugins\DbPlugin;
use PlantasBr\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

return $app;