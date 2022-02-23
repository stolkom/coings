<?php

namespace App\Http\Controllers\SPA;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Laravel\Passport\RefreshTokenRepository;

class AuthController extends Controller
{
    /**
     * Send the request and get the oauth token
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $client = DB::table('oauth_clients')
            ->where('password_client', true)
            ->first();

        $data = [
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => request('username'),
            'password'      => request('password'),
        ];

        $request = Request::create('/oauth/token', 'POST', $data);

        return app()->handle($request);
    }

    /**
     * Revoke the oauth token
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $accessToken = auth()->user()->token();

        (new RefreshTokenRepository)->revokeRefreshTokensByAccessTokenId($accessToken->id);

        $accessToken->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
