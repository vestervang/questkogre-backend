<?php
/**
 * Created by PhpStorm.
 * User: frederikthomsen
 * Date: 5/23/18
 * Time: 9:24 PM
 */

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthMutator extends Controller
{
    /**
     * @param       $root
     * @param array $args
     * @param       $context
     *
     * @throws \Exception
     *
     * @return array
     */
    public function login($root, array $args, $context)
    {
        //find the identifier column name
        $identifierColumn = filter_var($args['identifier'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $identifierColumn => $args['identifier'],
            'password'        => $args['password'],
        ];

        $token = auth()->attempt($credentials);
        if (!$token) {
            throw new \Exception('Unauthorized');
        }

        $user = auth()->user();

        return [
            'authToken' => $this->makeAuthToken($token),
            'user'      => $user
        ];
    }

    /**
     * Get the authenticated User.
     *
     * @return User
     */
    public function me()
    {
        $user = auth()->user();

        return $user;
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return array
     */
    public function logout()
    {
        auth()->logout();

        return ['message' => 'Successfully logged out'];
    }

    /**
     * Refresh a token.
     *
     * @return array
     */
    public function refresh()
    {
        return $this->makeAuthToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return array
     */
    protected function makeAuthToken($token)
    {
        return [
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
            'access_token' => $token,
        ];
    }
}