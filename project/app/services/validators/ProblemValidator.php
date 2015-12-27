<?php

namespace App\Services\Validators;

class ProblemValidator extends Validator {
 
    public static $rules = array(
        'title' 	=> 'required',
        'level'  	=> 'required',
		'tag'  		=> 'required',
		'content'  	=> 'required',
		'input'  	=> 'required',
		'output'  	=> 'required',
    );
 
}
