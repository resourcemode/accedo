<?php
/**
 * User Model
 *
 * @author  Michael <resourcemode@yahoo.com>
 */
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @package App\Models\User
 */
class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['id', 'email', 'password', 'permissions', 'last_login', 'first_name', 'last_name'];

    /**
     *
     * User has many history
     *
     * User history
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history()
    {
        return $this->hasMany('App\Models\History\History', 'user_id');
    }
}
