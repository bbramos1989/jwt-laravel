<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\UserService;

class UserController extends Controller
{
    

    public function __construct()
    {
        $this->user = new UserService();

    }

    public function create(Request $request)
    {
        return response()->json( $this->user->CreateUser($request->all()));        
    }

    public function listAll()
    {
        return response()->json($this->user->listAllUsers());
    }

    public function login(Request $request)
    {
        return response()->json($this->user->login($request->all()));
    }
    
}
