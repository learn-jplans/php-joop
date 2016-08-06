<?php 
namespace App\Controllers;

use Core\Http\Controller;
use Core\Components\Session;

class Admin extends Controller
{
    
    public function __construct()
    {
        Session::start();
    }

    public function index()
    {
        var_dump(Session::get('user_id'));
    }

    public function user($id)
    {
        Session::set('user_id', $id);
    }

    public function test()
    {
        Session::set();
    }
}