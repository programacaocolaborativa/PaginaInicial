<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 28/05/17
 * Time: 06:18
 */
declare(strict_types=1);

namespace PlantasBr\View;


use Psr\Http\Message\ResponseInterface;

interface ViewRendererInterface
{
    public function render(string $template, array $context = []): ResponseInterface;
}