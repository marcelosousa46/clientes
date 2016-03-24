<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('login.login');
    }
    public function anyData()
    {
        return User::all();
    }
    public function getIndex()
    {

        return view('login.login');
    }    
    
}
