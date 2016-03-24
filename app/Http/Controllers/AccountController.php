<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;
use Auth;
use Session;

class AccountController extends Controller
{
    public function login() {
        // Getting all post data
        $data = Input::all();
        // Applying validation rules.
        $rules = array(
                    'email'    => 'required|email',
                    'password' => 'required|min:5',
                 );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
          // If validation falis redirect back to login.
          return Redirect::to('/login')->withInput(Input::except('password'))->withErrors($validator);
        }
        else {
          $userdata = array(
                        'email'    => Input::get('email'),
                        'password' => Input::get('password')
                      );
          // doing login.
          if (Auth::validate($userdata)) {
            if (Auth::attempt($userdata)) {
              return Redirect::intended('/');
            }
          } 
          else {
            // if any error send back with message.
            Session::flash('error', 'Usuário e(ou) senha incorreto!'); 
            return Redirect::to('login');
          }
        }
      }
    public function logout() {
      Auth::logout(); // logout user
      return Redirect::to('login'); //redirect back to login
    }  
}
