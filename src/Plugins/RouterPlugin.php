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
use PlantasBr\ServiceContainerInterface;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\ServerRequestFactory;

class RouterPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $routerContainer = new RouterContainer();
        /* Registra as rotas da aplicação */
        $map = $routerContainer->getMap();
        /* Tem a função de identificar a rota que está sendo acessada */
        $matcher = $routerContainer->getMatcher();
        /* Tem a função de gerar links com base nas rotas registradas */
        $generator = $routerContainer->getGenerator();
        $request = $this->getRequest();

        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generator);
        $container->add(RequestInterface::class, $request);
        $container->addLazy(
            'route', function (ContainerInterface $container) {
                $matcher = $container->get('routing.matcher');
                $request = $container->get(RequestInterface::class);
                return $matcher->match($request);
            }
        );
    }

    protected function getRequest():RequestInterface
    {
        return ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    }

}