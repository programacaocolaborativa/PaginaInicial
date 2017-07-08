<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 04/06/17
 * Time: 14:45
 */
declare(strict_types=1);

namespace PlantasBr\Repository;

class RepositoryFactory
{
    public static function factory(string $modelClass)
    {
        return new DefaultRepository($modelClass);
    }
}