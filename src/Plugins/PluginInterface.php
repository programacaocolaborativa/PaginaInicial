<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 23/05/17
 * Time: 22:13
 */

namespace ProColab\Plugins;

use ProColab\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}