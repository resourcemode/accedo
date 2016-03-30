<?php
/**
 * Customer Repository
 *
 * @author  Michael <resourcemode@yahoo.com>
 */
namespace App\Repositories\Customer;

use App\Models\User\User;
use App\Repositories\ModelTrait;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CustomerRepository
 *
 * @package App\Repositories\Customer
 */
class CustomerRepository implements CustomerInterface
{
    use ModelTrait;

    /**
     * CustomerRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->setModel($user);
    }

    /**
     * Fetch user by id
     *
     * @param User $user
     * @return Collection
     */
    public function fetchById(User $user)
    {
        return $this->getModel()->find($user->id);
    }

    /**
     * Fetch all users
     *
     * @return Collection
     */
    public function fetchAll()
    {
        return $this->getModel()->all();
    }

    /**
     * @param User $user
     * @return Collection
     */
    public function fetchByIdWithHistory(User $user)
    {
        return $this->getModel()->with('history')
            ->find($user->id);
    }
}