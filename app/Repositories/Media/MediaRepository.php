<?php
/**
 * Media Repository
 *
 * @author  Michael <resourcemode@yahoo.com>
 */

namespace App\Repositories\Media;

use App\Repositories\ModelTrait;
use Guzzle\Http\Client;

/**
 * Class MediaRepository
 *
 * @package App\Repositories\Media
 */
class MediaRepository
{
    use ModelTrait;

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get the list of movies from API
     *
     * @return \Guzzle\Http\Message\Response
     */
    public function getAll()
    {
        // set the base url of third party API
        $client = $this->client->setBaseUrl('http://demo2697834.mockable.io');

        return $client->get('movies')->send();
    }

}