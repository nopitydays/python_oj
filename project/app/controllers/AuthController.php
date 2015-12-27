<?php

namespace App\Controllers;

use Auth,BaseController,Form,Input,Redirect,Sentry,View;

class AuthController extends BaseController{

    public function getlogin()
    {
        return View::make('auth.login');
    }

    public function postlogin()
    {
        $credentials=array(
            'email'=>Input::get('email'),
            'password'=>Input::get('password')
        );
        try
        {
            $user=Sentry::authenticate($credentials,false);

            if ($user)
            {
                return Redirect::route('problems.index');
            }
        }

        catch(\Exception $e)
        {
            return Redirect::route('login')->withErrors(array('login'=>$e->getMessage()));
        }
    }

    public function getlogout()
    {
        Sentry::logout();

        return Redirect::route('login');
    }

    public  function  signup()
    {
        return View::make('auth.signup');
    }


}
