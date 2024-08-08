<?php

namespace App\Models;

use Fantom\Database\Model;


class Transaction extends Model
{
	protected $primary = "id";
	protected $table = "transactions";
	
}