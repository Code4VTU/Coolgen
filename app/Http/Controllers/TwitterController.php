<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TwitterController extends Controller
{
    public function login(Request $request)
    {
        // get data from request
        $token  = $request->get('oauth_token');
        $verify = $request->get('oauth_verifier');

        // get twitter service
        $tw = \OAuth::consumer('Twitter');

        // check if code is valid

        // if code is provided get user data and sign in
        if ( ! is_null($token) && ! is_null($verify))
        {

            // This was a callback request from twitter, get the token
            $token = $tw->requestAccessToken($token, $verify);

            // Send a request with it
            $result = json_decode($tw->request('account/verify_credentials.json'), true);

            $message = 'Your unique Twitter user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
            echo $message. "<br/>";

            //Var_dump
            //display whole array.
            dd($result);
        }
        // if not ask for permission first
        else
        {
            // get request token

            $reqToken = $tw->requestRequestToken();

            // get Authorization Uri sending the request token
            $url = $tw->getAuthorizationUri(['oauth_token' => $reqToken->getRequestToken()]);

            // return to twitter login url
            return redirect((string)$url);
        }
    }
}
