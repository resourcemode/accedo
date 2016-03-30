<?php
/**
 * Authenticate Middleware
 *
 * @author  Michael <resourcemode@yahoo.com>
 */
namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Sentinel;

/**
 * Class Authenticate
 *
 * @package App\Http\Middleware
 */
class Authenticate
{
    protected $sentinel;

    /**
     * Authenticate constructor.
     *
     * @param Sentinel $sentinel
     */
    public function __construct(Sentinel $sentinel)
    {
        $this->sentinel = $sentinel;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (! $this->sentinel->check()) {

            if ($request->isJson()) {
                return response()->json([
                    'status'        => 'fail',
                    'data'          => $request,
                    'description'   => 'Unauthorized',
                ], 401);
            }

            return redirect()->route('login');
        }

        return $next($request);
    }
}
