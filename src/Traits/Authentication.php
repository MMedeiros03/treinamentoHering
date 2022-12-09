<?php

namespace Nbwdigital\Abcmedseg\Traits;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

trait Authentication
{
   
    public function GenerateJWT(array $data)
    {

        $token_expire = strtotime("+8 hours"); 

        $key = '123456';

        $payload = [
            'user' => $data['login'],
            'password' => $data['senha'],
            'ext' => $token_expire
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

        $decoded_array = (array) $decoded;

        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

        return $jwt;
    }

    


}
