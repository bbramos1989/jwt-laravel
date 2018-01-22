<?php

namespace App\Service;

use App\Model\User;
use Illuminate\Support\Facades\Hash;



class UserService
{
    private $user = null;

    public function __construct()
    {
        $this->user = new User();
    }

    public function createUser(array $dados)
    {        
        $dados['password'] = Hash::make($dados['password']);
        $criado = $this->user->create($dados);
        return $criado;
    }

    public function listAllUsers()
    {
        return $this->user->get();
    }   



}