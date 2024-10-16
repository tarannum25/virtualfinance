<?php

namespace App\Models;

use Fantom\Database\Model;


class Transaction extends Model
{
	protected $primary = "id";
	protected $table = "transactions";

	public static function byAccountId(int $account_id)
	{
		$sql = "
			SELECT * FROM transactions
			WHERE account_id = :account_id
			ORDER BY id DESC
		";

		return static::raw($sql, ['account_id' => $account_id]);
	}

	public function isCredit()
	{
		return $this->transaction_type == 1;
	}

	public function isDebit()
	{
		return $this->transaction_type == 2;
	}
}