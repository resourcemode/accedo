<?php
/**
 * History Controller
 *
 * @author  Michael <resourcemode@yahoo.com>
 */

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\History\HistoryRepository;
use App\Repositories\Media\MediaRepository;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class HistoryController
 */
class HistoryController extends Controller
{
    protected $user;

    protected $historyRepository;

    protected $mediaRepository;

    public function __construct(Sentinel $sentinel, HistoryRepository $historyRepository, MediaRepository $mediaRepository)
    {
        $this->user = $sentinel->getUser();

        $this->historyRepository = $historyRepository;

        $this->mediaRepository = $mediaRepository;
    }

    /**
     * Get the history page view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        return view('client.history.index');
    }

    /**
     * Create History
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createHistory(Request $request)
    {
        try {
            $data = $this->historyRepository->create($this->user, $request);

            return response()->json([
                'status'      => 'success',
                'data'        => $data,
                'description' => 'Created',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'      => 'fail',
                'data'        => 'Something bad happened.',
                'description' => $e->getMessage(),
                'code'        => $e->getCode()
            ], 400);
        }
    }

    /**
     * Get movie history
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getHistoryByUser()
    {
        try {
            return response()->json([
                'status'      => 'success',
                'data'        => $this->excludeDataFromHistory($this->historyRepository->fetchByUserId($this->user->getUserId())),
                'description' => 'Displayed',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'      => 'fail',
                'data'        => 'Something bad happened.',
                'description' => $e->getMessage(),
                'code'        => $e->getCode()
            ], 400);
        }
    }

    /**
     * Exclude the data from history
     *
     * This is just a sample for displaying the history
     *
     * If the media/movies are stored in our database it is very simple to fetch from the DB
     *
     * @param $history
     *
     * @return JsonResponse
     */
    public function excludeDataFromHistory($history)
    {
        if (empty($history)) {
            return false;
        }

        // get the list of history ids
        $movieIds = [];
        foreach ($history as $item) {
            $movieIds[] = $item->movie_id;
        }

        // get the list of videos from Accedo sample API
        $media = $this->mediaRepository->getAll()->getBody();

        if (empty($media)) {
            return false;
        }

        // filter the list of videos, return only videos that exist in history table
        $videos = [];
        foreach(json_decode($media)->entries as $video) {
            if (! in_array($video->id, $movieIds)) {
                continue;
            }

            $videos[] = $video;
        }

       return ['entries' => $videos];
    }
}