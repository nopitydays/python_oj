<?php

namespace App\Services\Validators;

class SignupValidator extends Validator {

    public static $rules = array(
        'username' => 'required',
        'password' => 'required|confirmed',
        'email'=>'email|required',
        //'newpassword' => 'confirmed',
        /*'password_comfirmation'  => ':newpassword confirmation',*/

    );

}
