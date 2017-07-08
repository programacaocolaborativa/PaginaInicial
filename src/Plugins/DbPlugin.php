<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 23/05/17
 * Time: 22:36
 */
declare(strict_types=1);

namespace ProColab\Plugins;

use Interop\Container\ContainerInterface;
use ProColab\Models\Cadastros;
use ProColab\Models\Categorias;
use ProColab\Models\Contatos;
use ProColab\Models\Continentes;
use ProColab\Models\Especies;
use ProColab\Models\Generos;
use ProColab\Models\Glossario;
use ProColab\Models\Origens;
use ProColab\Models\Paises;
use ProColab\Models\Pessoa;
use ProColab\Models\Referencia;
use ProColab\Models\TipoFolha;
use ProColab\Repository\RepositoryFactory;
use ProColab\ServiceContainerInterface;
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