<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\AuthService;

class AuthController extends Controller
{  

    public function __construct()
    {
        $this->auth = new AuthService();
    }

    public function authenticate(Request $request)
    {
        return response()->json($this->auth->authenticate($request->all()));
    }

}
