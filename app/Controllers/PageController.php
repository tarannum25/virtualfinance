<?php

namespace App\Controllers;

use App\Models\User;
use Fantom\Controller;

class PageController extends Controller
{
    public function index()
    {
        $this->view->render('Logout/logout.php');
    }
}
 

