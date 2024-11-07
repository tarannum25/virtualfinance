<?php

namespace App\Models;

use Fantom\Database\Model;


class Transaction extends Model
{
	protected $primary = "id";
	protected $table = "transactions";

	public static function make(array $data)
	{
		$txn = new self();

		$txn->amount 			= $data['amount'];
		$txn->narration 		= $data['narration'];
		$txn->transaction_date 	= $data['transaction_date'];
		$txn->transaction_type 	= $data['transaction_type'];
		$txn->user_id 			= $data['user_id'];
		$txn->account_id 		= $data['account_id'];

		return $txn;
	}

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

	public static function totalCreditAmount($account_id)
	{
		$sql = "
			SELECT sum(amount) as total_credit
				FROM transactions
			WHERE transaction_type = 1 AND account_id = :account_id
		";

		return static::raw($sql, [
			'account_id' => $account_id
		])->first()->total_credit;
	}

	public static function totalDebitAmount($account_id)
	{
		$sql = "
			SELECT sum(amount) as total_debit
				FROM transactions
			WHERE transaction_type = 2 AND account_id = :account_id
		";

		return static::raw($sql, [
			'account_id' => $account_id
		])->first()->total_debit;
	}
}