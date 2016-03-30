<?php
/**
 * Customer Interface
 *
 * @author  Michael <resourcemode@yahoo.com>
 */

namespace App\Repositories\Customer;
use App\Models\User\User;

/**
 * Interface CustomerInterface
 *
 * @package App\Repositories\Customer
 */
interface CustomerInterface
{
    public function fetchById(User $user);

    public function fetchAll();

    public function fetchByIdWithHistory(User $user);
}