<?php
/**
 * Auth Repository
 *
 * @author  Michael <resourcemode@yahoo.com>
 */
namespace App\Repositories\Auth;

use Cartalyst\Sentinel\Sentinel;

/**
 * Class AuthRepository
 *
 * @package App\Repositories\Auth
 */
class AuthRepository
{
    protected $sentinel;

    public function __construct(Sentinel $sentinel)
    {
        $this->sentinel = $sentinel;
    }

    /**
     * Login user
     *
     * @param $credentials
     *
     * @return bool|\Cartalyst\Sentinel\Users\UserInterface
     */
    public function login($credentials)
    {
        return $this->sentinel->authenticate($credentials);
    }

    /**
     * Logout user
     *
     * @return bool
     */
    public function logout()
    {
        return $this->sentinel->logout();
    }

}