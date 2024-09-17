<?php

namespace App\Controllers;

use App\Models\User;
use Fantom\Controller;

/**
 * Home controller
 */
class HomeController extends Controller
{
	public function index()
	{
		$users = User::all()->get();

		echo "<pre>";
		print_r($users);
		echo "</pre>";

		$user = User::find(1);

		$accounts = $user->accounts()->get();

		echo "<br>===================<br>";
		echo "<pre>";
		print_r($accounts);
		echo "</pre>";


		$account = $accounts[0];
		$transactions = $account->transactions()->get();

		echo "<br>===================<br>";
		echo "<pre>";
		print_r($transactions);
		echo "</pre>";



		exit;

		$this->view->render('welcome.php');
	}
}
