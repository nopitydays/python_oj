<?php

namespace App\Services\Validators;

class UserValidator extends Validator {

    public static $rules = array(
        'password' => 'required',
        'newpassword' => 'confirmed',
        /*'password_comfirmation'  => ':newpassword confirmation',*/

    );

}