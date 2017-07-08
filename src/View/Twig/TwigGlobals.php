<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 06/06/17
 * Time: 01:03
 */

namespace PlantasBr\View\Twig;


use PlantasBr\Auth\Admin\AuthAdminInterface;
use PlantasBr\Auth\AuthInterface;

class TwigGlobals extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    /**
     * @var AuthInterface
     */
    private $auth;
    private $authAdmin;

    /**
     * TwigGlobals constructor.
     */
    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function getGlobals()
    {
        return [
            'Auth' => $this->auth
        ];
    }
}