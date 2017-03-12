<?php

namespace App\Http\Controllers\Api;

use \Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokenGenerator extends Controller
{
    public function issueToken(Request $request)
    {
        $tokenId = base64_encode(mcrypt_create_iv(32));
        $issuedAt = time();
        $notBefore = $issuedAt;
        $serverName = env('TOKEN_ISSUER');
        /*
         *
         * Create the token params as an array
         */
        $data = [
            'iat'  => $issuedAt,   // Issued at: time when the token was generated
            'jti'  => $tokenId,    // Json Token Id: an unique identifier for the token
            'iss'  => $serverName, // Issuer
            'nbf'  => $notBefore,  // Not before
        ];

        $secretKey = env('secret');
        $jwt = JWT::encode(
        $data,      //Data to be encoded in the JWT
        $secretKey, // The signing key
        'HS512'     // Algorithm used to sign the token
        );

        $unencodedArray = ['jwt' => $jwt];

        return json_encode($unencodedArray);
    }
}
