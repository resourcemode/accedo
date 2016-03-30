<?php
/**
 * Home Controller
 *
 * @author  Michael <resourcemode@yahoo.com>
 */

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Sentinel;

/**
 * Class HomeController
 */
class HomeController extends Controller
{
    protected $sentinel;

    /**
     * HomeController constructor.
     *
     * @param Sentinel $sentinel
     */
    public function __construct(Sentinel $sentinel)
    {
        $this->sentinel = $sentinel;
    }

    /**
     * Get the home page view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        if ($this->sentinel->check()) {
            return view('client.home.index');
        }

        return redirect('/login');
    }

}