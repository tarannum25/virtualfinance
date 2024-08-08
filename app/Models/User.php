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
}