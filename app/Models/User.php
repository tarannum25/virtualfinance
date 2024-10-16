<?php

namespace App\Models;

use Fantom\Database\Model;


/**
 * User
 */

class User extends Model
{
	protected $primary = "id";
	protected $table = "users";

	public function accounts()
	{
		return Account::byUserId($this->id);
	}

	public function fullName()
	{
		return $this->first_name . ' ' . $this->last_name;
	}
}