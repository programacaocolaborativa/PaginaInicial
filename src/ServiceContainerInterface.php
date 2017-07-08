<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 21/05/17
 * Time: 02:10
 */

declare(strict_types=1);

namespace PlantasBr;


interface ServiceContainerInterface
{
    public function add(string $name, $service);
    public function addLazy(string $name, callable $callable);
    public function get(string $name);
    public function has(string $name);
}