<?php
/**
 * History Model
 *
 * @author  Michael <resourcemode@yahoo.com>
 */
namespace App\Models\History;

use Illuminate\Database\Eloquent\Model;

/**
 * Class History
 *
 * @package App\Models\History
 */
class History extends Model
{
    protected $table = 'history';

    protected $fillable = ['id', 'user_id', 'movie_id'];

    /**
     * Relationship with user
     *
     * History is belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsToMany('App\Models\User\User');
    }
}
