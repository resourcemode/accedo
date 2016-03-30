<?php
/**
 * History Repository
 *
 * @author  Michael <resourcemode@yahoo.com>
 */

namespace App\Repositories\History;

use Illuminate\Http\Request;
use App\Models\History\History;
use App\Repositories\ModelTrait;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

/**
 * Class HistoryRepository
 *
 * @package App\Repositories\History
 */
class HistoryRepository implements HistoryInterface
{
    use ModelTrait;

    /**
     * HistoryRepository constructor.
     *
     * @param History $history
     */
    public function __construct(History $history)
    {
        $this->setModel($history);
    }

    /**
     * Fetch history by id
     *
     * @param $historyId
     *
     * @return Collection
     */
    public function fetchById($historyId)
    {
        return $this->getModel()->find($historyId);
    }

    /**
     * Fetch history by user id
     *
     * @param $userId
     *
     * @return Collection
     */
    public function fetchByUserId($userId)
    {
        return $this->getModel()->where('user_id', $userId)->get();
    }

    /**
     * Fetch all
     *
     * @return Collection
     */
    public function fetchAll()
    {
        return $this->getModel()->all();
    }

    /**
     * Fetch history by id with user
     *
     * @param $historyId
     *
     * @return Collection
     */
    public function fetchByIdWithUser($historyId)
    {
        return $this->getModel()->with('user')
            ->find($historyId);
    }

    /**
     * Create history
     *
     * Here's an example of how to use it:
     * <code>
     *   public function save(HistoryRepository $historyRepository)
     *   {
     *       $historyRepository->create(User $user, Request $request]);
     *   }
     * </code>
     *
     * @param EloquentUser $user
     * @param Request $request
     * @return boolean|Collection
     * @throws \Exception
     */
    public function create(EloquentUser $user, Request $request)
    {
        $movieId = $request->get('movie_id');
        if (! $movieId) {
            throw new \Exception('Movie id cannot be empty');
        }

        try {
            return $this->getModel()->create([
                'user_id'    => $user->id,
                'movie_id'   => $movieId
            ])->save();
        } catch(\Exception $e) {
            Log::error(__CLASS__.':'.__TRAIT__.':'.__FILE__.':'.__LINE__.':'.__FUNCTION__.':'.
                "Exception thrown while trying to create history", [
                'data'            => [$user->id, $movieId],
                'exception_type'  => get_class($e),
                'message'         => $e->getMessage(),
                'code'            => $e->getCode()
            ]);
        }

        return false;
    }
}