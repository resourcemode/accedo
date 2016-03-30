<?php
/**
 * Auth Controller
 *
 * @author  Michael <resourcemode@yahoo.com>
 */
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\AuthRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('client.auth.login');
    }

    /**
     * Post login
     *
     * @param AuthRepository $authRepository
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postLogin(AuthRepository $authRepository, Request $request)
    {
        $data = $request->all();

        $credentials = [
            'email'     => $data['email'],
            'password'  => $data['password']
        ];

        try {
            $login = $authRepository->login($credentials);
        } catch (\Exception $e) {
            return response()->json([
                'status'      => 'fail',
                'data'        => 'Something bad happened.',
                'description' => $e->getMessage(),
                'code'        => $e->getCode()
            ], 401);
        }

        if ($login === false) {
            return response()->json([
                'status'        => 'fail',
                'data'         => $data['email'],
                'description'   => 'Unauthorized',
            ], 401);
        }

        return response()->json([
            'status'        => 'success',
            'data'          => $login,
            'description'   => 'Authenticated',
        ]);
    }

    /**
     * Logout
     *
     * @param AuthRepository $authRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(AuthRepository $authRepository)
    {
        $logout = $authRepository->logout();

        return response()->json([
            'status'        => 'success',
            'data'          => $logout,
            'description'   => 'Logout',
        ]);
    }
}
