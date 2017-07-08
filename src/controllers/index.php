<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 04/06/17
 * Time: 15:59
 */
$app
    ->get(
        '/', function () use ($app) {
            $view = $app->service('view.renderer');

            return $view->render(
                'index.html.twig'
            );
        }, 'index'
    );