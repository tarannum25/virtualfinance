<?php

namespace App\Models;

use Fantom\Database\Model;


class Transaction extends Model
{
	protected $primary = "id";
	protected $table = "transactions";

	public static function byAccountId(int $account_id)
	{
		return static::where("account_id", $account_id);
	}
}