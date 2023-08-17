<?php 
namespace App\Helper;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    static function createToken($userEmail) 
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-jwt',
            'iat' => time(),
            'exp' => time()+60*60,
            'userEmail' => $userEmail,
        ];

        return JWT::encode($payload, $key, 'HS256');
    }
    static function verifyToken($token) 
    {
        try {
            $key = env('JWT_KEY');
            $decode = JWT::decode($token, new Key($key, 'HS256'));

            return $decode->userEmail;      
        }catch(Exception $e) {
            return 'Unauthorized';
        }
        
    }
}