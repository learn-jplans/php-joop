<?php
namespace App\Controllers;

use Core\Http\Controller;
use App\Models\User;
use App\Models\Product;
use Core\Components\Session;
use Core\Utils\Url;
use Core\Components\Database;
use Core\Utils\Debug;


class About extends Controller
{

    public function index()
    {
        echo phpinfo();
    }

    public function back()
    {
        Url::redirectTo('/');
    }

}