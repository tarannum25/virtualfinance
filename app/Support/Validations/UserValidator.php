<?php

namespace App\Support\Validations;

use Fantom\Validation\Validator;

/**
 * UserValidator
 */
class UserValidator extends Validator
{
	public function validateRegister()
	{
		$this->validate("POST", [
			"first_name" 		=> "required|min:2|max:32|alpha_space",
			"last_name" 		=> "required|min:2|max:32|alpha_space",
			"phone" 			=> "required|min:10|max:10|unique:users,phone",
			"password" 			=> "required|min:8|max:16",
			"confirm_password" 	=> "required|confirmed:password",
			"account_type" 		=> "required|integer|in:1,2",
		]);
	}
}