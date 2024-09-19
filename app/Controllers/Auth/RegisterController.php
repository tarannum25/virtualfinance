<?php declare(strict_types=1);

namespace App\Controllers\Auth;

use Fantom\Session;
use App\Models\User;
use Fantom\Controller;
use App\Support\Validations\UserValidator;

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
			var_dump($v->validationErrors()->all());exit;
			redirect('auth/register');
		}

		// 2. Pouplate the user data in User model class
		$user = new User();
		$user->first_name 	= $_POST['first_name'];
		$user->last_name 	= $_POST['last_name'];
		$user->phone 		= $_POST['phone'];
		$user->gender 		= 1; // 1 = Male, 2 = Female
		$user->password 	= $_POST['password'];
		$user->username 	= "".random_int(100000, 999999);

		// 3. Save user
		if (! $user->save()) {
			Session::flash("error", "Failed to create your account, try later.");
			redirect("auth/register");
		}

		// 4. Redirect to home page.
		redirect('/');
	}
}