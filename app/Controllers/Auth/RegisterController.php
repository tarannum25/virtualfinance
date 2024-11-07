<?php declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use App\Support\Authentication\Auth;
use App\Support\Validations\UserValidator;
use Fantom\Controller;
use Fantom\Session;

/**
 * RegisterController
 */
class RegisterController extends Controller
{
	public function index()
	{
		$this->view->render("Auth/Register/index.php");
	}

	public function store()
	{
		$v = new UserValidator();
		$v->validateRegister();
		if ($v->hasError()) {
			redirect('auth/register');
		}

		// 2. Pouplate the user data in User model class
		$user = new User();
		$user->first_name 	= $_POST['first_name'];
		$user->last_name 	= $_POST['last_name'];
		$user->phone 		= $_POST['phone'];
		$user->gender 		= 1; // 1 = Male, 2 = Female
		$user->password 	= password_hash($_POST['password'], PASSWORD_DEFAULT);
		$user->username 	= "".random_int(100000, 999999);

		// 3. Save user
		if (! $user->save()) {
			Session::flash("error", "Failed to create your account, try later.");
			redirect("auth/register");
		}

		// 4. Create Bank Account of the user
		$account = new Account();
		$account->account_number = random_int(1000000000, 9999999999);
		$account->account_type = (int) $_POST['account_type'];
		$account->status = 1;
		$account->user_id = $user->lastId();
		$account->balance = 1000;
		$account->save();

		// 5. Create transaction for initial balance
	    $txn = new Transaction();
	    $txn->amount = $account->balance;
	    $txn->narration = "Initial balance deposited";
	    $txn->transaction_date = date("Y-m-d");
	    $txn->transaction_type = 1;
	    $txn->user_id = $user->lastId();
	    $txn->account_id = $account->lastId();
	    $txn->save();

		// 5. Auto login user
		if (!Auth::attempt($user->username, $_POST['password'])) {
			Session::flash('error', 'Invalid username or password.');
			redirect('auth/login');
		}

		Session::flash('success', "Congrats! This is your username {$user->username} kindly copy it now, you will need this for login.");
		redirect('user/home/index');
	}
}