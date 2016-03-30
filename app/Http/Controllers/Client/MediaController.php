<?php
/**
 * Media Controller
 *
 * @author  Michael <resourcemode@yahoo.com>
 */

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Media\MediaRepository;
use Cartalyst\Sentinel\Sentinel;

/**
 * Class MediaController
 */
class MediaController extends Controller
{
    protected $user;

    protected $mediaRepository;

    public function __construct(Sentinel $sentinel, MediaRepository $mediaRepository)
    {
        $this->user = $sentinel->getUser();

        $this->mediaRepository = $mediaRepository;
    }

    /**
     * Get the history page view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAll()
    {
        try {
            $data = $this->mediaRepository->getAll();
            return response()->json([
                'status'      => 'success',
                'data'        => json_decode($data->getBody()),
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
}