<?php

namespace App\Controllers\User;

use Fantom\Controller;
use App\Middlewares\AuthMiddleware;
use App\Support\Authentication\Auth;

/**
 *
 *
 * HomeController class
 */
class HomeController extends Controller
{
	protected function index()
	{
		$user = Auth::user();
		$accounts = $user->accounts()->get();

		$account = $accounts[0];

		// // ..
		// $user = User::find(2);

		$this->view->render('User/Home/index.php', [
			'user' 		=> $user,
			'account' 	=> $account,
		]);
	}

	protected function before()
	{
		return (new AuthMiddleware)();
	}
}