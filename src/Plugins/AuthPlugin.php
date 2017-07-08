<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 23/05/17
 * Time: 22:36
 */
declare(strict_types=1);

namespace PlantasBr\Plugins;

use Interop\Container\ContainerInterface;
use PlantasBr\Auth\Auth;
use PlantasBr\Auth\JasnyAuth;
use PlantasBr\ServiceContainerInterface;

class AuthPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy(
            'jasny.auth', function (ContainerInterface $container) {
                return new JasnyAuth($container->get('user.repository'));
            }
        );
        $container->addLazy(
            'auth', function (ContainerInterface $container) {
                return new Auth($container->get('jasny.auth'));
            }
        );
    }
}