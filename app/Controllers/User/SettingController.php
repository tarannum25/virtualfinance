<?php

namespace App\Controllers\User;

use App\Middlewares\AuthMiddleware;
use App\Support\Authentication\Auth;
use App\Support\Validations\AuthValidator;
use App\Support\Validations\UserValidator;
use Fantom\Controller;
use Fantom\Session;

/**
 * ProfileController class
 */
class SettingController extends Controller
{
	protected function index()
	{
		$user = Auth::user();

		$this->view->render('User/Setting/index.php', [
			'user' => $user,
		]);
	}

	protected function updateProfile()
	{
		
		// $first_name = $_POST['first_name'];
        // $last_name = $_POST['last_name'];
        // $email = $_POST['email'];
        // $phone = $_POST['phone'];
        // $gender = $_POST['gender'];
		$user = Auth::user();
		$user_id = $user->id;

		// Validation
		$v = new UserValidator();
		$v->validateProfileUpdate();
		if ($v->hasError()) {
			redirect('user/setting');
		}

		$user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        // $user->email = $_POST['email'];
        $user->phone = $_POST['phone'];
        $user->gender = (int) $_POST['gender'];

        $user->save();

        Session::flash('success', 'Profile updated successfully!');

        redirect('user/setting');
	}

	protected function changePassword()
	{
		$validator = AuthValidator::validateChangePassword();
		if ($validator->hasError()) {
			redirect('user/setting');
		}

		$old_password = trim($_POST['old_password']);
		$new_password = trim($_POST['password']);
		if (!Auth::attemptChangePassword($old_password, $new_password)) {
			Session::flash('error', Auth::error());
		} else {
			Session::flash('success', 'Password changed successfully.');
		}

		redirect('user/setting');
	}

	protected function before()
	{
		return (new AuthMiddleware)();
	}
}