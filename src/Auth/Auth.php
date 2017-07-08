<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 04/06/17
 * Time: 22:46
 */

namespace PlantasBr\Auth;


use Jasny\Authz;
use Jasny\Authz\ByLevel;
use PlantasBr\Models\UserInterface;

class Auth implements AuthInterface, Authz
{
    /**
     * @var JasnyAuth
     */
    use ByLevel;
    private $jasnyAuth;

    /**
     * Auth constructor.
     */
    public function __construct(JasnyAuth $jasnyAuth)
    {
        $this->jasnyAuth = $jasnyAuth;
        $this->sessionStart();
    }

    public function login(array $credentials): bool
    {
        list('usuario' => $usuario, 'senha' => $senha) = $credentials;
        return $this->jasnyAuth->login($usuario, $senha) !== null;
    }

    public function check(): bool
    {
        return $this->user() !== null;
    }

    public function logout(): void
    {
        $this->jasnyAuth->logout();
    }

    public function user(): ?UserInterface
    {
        return $this->jasnyAuth->user();
    }

    public function hashPassword(string $password): string
    {
        return $this->jasnyAuth->hashPassword($password);
    }

    protected function sessionStart()
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function getAccessLevels()
    {
        return [
                'user' => 0,
                'admin' => 1
            ];
    }
}