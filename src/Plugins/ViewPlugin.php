<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 23/05/17
 * Time: 22:36
 */
declare(strict_types=1);

namespace PlantasBr\Plugins;


use Aura\Router\RouterContainer;
use Interop\Container\ContainerInterface;
use PlantasBr\ServiceContainer;
use PlantasBr\ServiceContainerInterface;
use PlantasBr\View\Twig\TwigGlobals;
use PlantasBr\View\ViewRenderer;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\ServerRequestFactory;

class ViewPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy(
            'twig', function (ContainerInterface $container) {
                $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../templates');
                $twig = new \Twig_Environment($loader);


                $generator = $container->get('routing.generator');

                $twig->addFunction(
                    new \Twig_SimpleFunction(
                        'route',
                        function (string $name, array $params = []) use ($generator) {
                            return$generator->generate($name, $params);
                        }
                    )
                );
                return $twig;
            }
        );
        $container->addLazy(
            'view.renderer', function (ContainerInterface $container) {
                $twigEnvironment = $container->get('twig');
                return new ViewRenderer($twigEnvironment);
            }
        );
    }
}