<?php

namespace App\Models;

use App\Models\Transaction;
use Fantom\Database\Model;


class Account extends Model 
{
   protected $primary = "id";
   protected $table = "accounts";

   // select * from accounts where user_id = 123

   public static function byUserId(int $user_id)
   {
      return static::where("user_id", $user_id);
   }

   public function transactions()
   {
      return Transaction::byAccountId($this->id);
   }

   public static function findByAccountNumber($account_number)
   {
      return static::where('account_number', $account_number)->first();
   }

   public function totalCreditAmount()
   {
      $account_id = $this->id;

      return Transaction::totalCreditAmount($account_id);
   }

   public function totalDebitAmount()
   {
      $account_id = $this->id;

      return Transaction::totalDebitAmount($account_id);
   }
}