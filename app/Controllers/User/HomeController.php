<?php

namespace App\Controllers\User;

use App\Middlewares\AuthMiddleware;
use App\Models\Account;
use App\Models\Transaction;
use App\Support\Authentication\Auth;
use Fantom\Controller;
use Fantom\Session;

/**
 *
 *
 * HomeController class
 */
class HomeController extends Controller
{
	protected function index()
	{
		$current_index = 0;
		$user = Auth::user();
		$accounts = $user->accounts()->get();

		if (isset($_GET['active_index'])) {
			$current_index = (int) $_GET['active_index'];
			if ($current_index < 0) {
				$current_index = 0;
			} else if ($current_index > count($accounts) - 1) {
				$current_index = count($accounts) - 1;
			}
		}

		$account = $accounts[$current_index];
		$transactions = $account->transactions()->get();

		// Check no. of accounts
		$total_account = count($accounts); // 1, 2, 3,...
          
        
		$total_credit_amount = $account->totalCreditAmount();
		$total_debit_amount = $account->totalDebitAmount();

		// // ..
		// $user = User::find(2);

		$this->view->render('User/Home/index.php', [
			'user' 			=> $user,
			'account' 		=> $account,
			'transactions' 	=> $transactions,
			'total_cr_amount' => $total_credit_amount,
			'total_dr_amount' => $total_debit_amount,
			'total_account' 	=> $total_account,
			'current_index' 	=> $current_index,
		]);
	}

	protected function sendMoney()
	{
		// 1. Extract form data into variables
		$recipient 	= $_POST['recipient'];
		$amount 	= (float) $_POST['amount'];
		$now 		= date("Y-m-d H:i:s");

		// 2. Load the recipient account from database
		$recipient_account = Account::findByAccountNumber($recipient);

		// 3. Check account number is valid
		if (is_null($recipient_account)) {
			Session::flash('error', 'Invalid recipient account');
			redirect('user/home/index');
		}

		// 4. Load the sender account
		$user = Auth::user();
		$accounts = $user->accounts()->get();
		$sender_account = $accounts[0];

		// Check amount is valid or not
		if ($amount < 0) {
			Session::flash('error', 'Invalid amount');
			redirect('user/home/index');
		}

		if ($amount > $sender_account->balance) {
			Session::flash('error', 'Amount can not exceed your current balance');
			redirect('user/home/index');
		}
		// 5. Create Debit transaction in sender account
		$data = [
			'amount' 			=> $amount,
			'narration' 		=> "Transfer Rs. {$amount} to {$recipient}",
			'transaction_date' 	=> $now,
			'transaction_type' 	=> 2,
			'user_id' 			=> $user->id,
			'account_id' 		=> $sender_account->id,
		];
		$sender_txn = Transaction::make($data);
		$sender_txn->save();

		// 6. Create Credit transaction in recipient account
		$data = [
			'amount' 			=> $amount,
			'narration' 		=> "Received Rs. {$amount} from {$sender_account->account_number}",
			'transaction_date' 	=> $now,
			'transaction_type' 	=> 1,
			'user_id' 			=> $recipient_account->user_id,
			'account_id' 		=> $recipient_account->id,
		];
		$recipient_txn = Transaction::make($data);
		$recipient_txn->save();

		// $recipient_txn = Transaction::makeDebit($amount, $sender_account);
		// $recipient_txn = Transaction::makeCredit($amount, $recipient_account);

		/*
		// 5. Create Debit transaction in sender account
		$sender_transaction = new Transaction();
		$sender_transaction->amount = $amount;
		$sender_transaction->narration = "Transfer Rs. {$amount} to {$recipient}";
		$sender_transaction->transaction_date = $now;
		$sender_transaction->user_id = $user->id;
		$sender_transaction->account_id = $sender_account->id;
		$sender_transaction->save(); // Insert in transactions table

		// 6. Create Credit transaction in recipient account
		$recipient_transaction = new Transaction();
		$recipient_transaction->amount = $amount;
		$recipient_transaction->narration = "Received Rs. {$amount} from {$sender_account->account_number}";
		$recipient_transaction->transaction_date = $now;
		$recipient_transaction->user_id = $recipient_account->user_id;
		$recipient_transaction->account_id = $recipient_account->id;
		$recipient_transaction->save(); // Insert in transactions table
		*/

		// 7. Update sende's account balance
		$sender_account->balance = $sender_account->balance - $amount;
		$sender_account->save(); // Run update SQL query

		// 8. Update recipient's account balance
		$recipient_account->balance = $recipient_account->balance + $amount;
		$recipient_account->save(); // Run update SQL query


		Session::flash('success', 'Money sent successfully!');
		redirect('user/home/index');
	}

	protected function before()
	{
		return (new AuthMiddleware)();
	}
}