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
use PlantasBr\Models\Cadastros;
use PlantasBr\Models\Categorias;
use PlantasBr\Models\Contatos;
use PlantasBr\Models\Continentes;
use PlantasBr\Models\Especies;
use PlantasBr\Models\Generos;
use PlantasBr\Models\Glossario;
use PlantasBr\Models\Origens;
use PlantasBr\Models\Paises;
use PlantasBr\Models\Pessoa;
use PlantasBr\Models\Referencia;
use PlantasBr\Models\TipoFolha;
use PlantasBr\Repository\RepositoryFactory;
use PlantasBr\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;

class DbPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__ . '/../../config/db.php';
        $capsule->addConnection($config['default_connection']);
        $capsule->bootEloquent();

        $container->add('repository.factory', new RepositoryFactory());

        $container->addLazy(
            'contatos.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Contatos::class);
            }
        );
        $container->addLazy(
            'especies.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Especies::class);
            }
        );
        $container->addLazy(
            'referencias.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Referencia::class);
            }
        );
        $container->addLazy(
            'glossarios.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Glossario::class);
            }
        );

        // repositórios admin
        $container->addLazy(
            'user.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Cadastros::class);
            }
        );
        $container->addLazy(
            'pessoa.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Pessoa::class);
            }
        );
        $container->addLazy(
            'categorias.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Categorias::class);
            }
        );
        $container->addLazy(
            'especies.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Especies::class);
            }
        );
        $container->addLazy(
            'continentes.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Continentes::class);
            }
        );
        $container->addLazy(
            'generos.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Generos::class);
            }
        );
        $container->addLazy(
            'origens.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Origens::class);
            }
        );
        $container->addLazy(
            'paises.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Paises::class);
            }
        );
        $container->addLazy(
            'tipoFolha.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(TipoFolha::class);
            }
        );
        $container->addLazy(
            'glossarios.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Glossario::class);
            }
        );
        $container->addLazy(
            'referencias.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Referencia::class);
            }
        );
    }
}