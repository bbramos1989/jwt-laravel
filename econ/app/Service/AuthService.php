<?php

namespace App\Service;

use App\Model\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Hash;

class AuthService
{
    private $user = null;

    public function __construct()
    {
        $this->user = new User();
    }

    public function authenticate(array $dados)
    {
        
        $company = $this->user->where('email', $dados['email'])->first();
       if(!$company){           
            return response()->json([
                'error' => 'Invalid credentials'
            ], 401);
        }    

        if (!Hash::check($dados['password'], $company->password)) {          
            return response()->json([
              'error' => 'Invalid credentials'
            ], 401);
        }
        
        $token = JWTAuth::fromUser($company);          
        $objectToken = JWTAuth::setToken($token);     
        $expiration = JWTAuth::decode($objectToken->getToken())->get('exp');        
        return [            
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration,
            'usuario' => [
                'nome' => $company->name,
                'email' => $company->email
            ]

        ];
    }
}
