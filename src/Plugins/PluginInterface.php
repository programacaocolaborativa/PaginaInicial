<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 23/05/17
 * Time: 22:13
 */

namespace PlantasBr\Plugins;

use PlantasBr\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}