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
    
    public function __construct()
    {
    }

    public function postData()
    {
        // $db = new Database();
        // $db->execute("insert into users values(3, 'jplans', '123')");
        // Debug::showMessage('Data successfully inserted');
    }

    public function getData()
    {
        // $db = new Database();
        // $data = $db->fetchData('select * from users');
        // Debug::dump($data);
    }

    public function orm()
    {
        $user = new User();
        $user->name = 'Juan';
        $user->username = 'juan';
        $user->password = '1234';
        $user->save();

        $erica = new User();
        $erica->name = 'Erica';
        $erica->username = 'erica';
        $erica->password = '32132';
        $erica->save();

    }

    public function index()
    {
        // $user = new User();

        // $user->name = 'Juan';
        // $user->age = '28';
        // $user->address = 'CSFP';

        // // echo Url::getBaseUrl();

        // return $this->view('about', [
        //     'user' => $user
        // ]);
        echo phpinfo();
    }

    public function sendMail() {
        error_reporting(-1);
        ini_set('display_errors', 'On');
        set_error_handler("var_dump");
        $msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
       $send = mail("learn.jplans@gmail.com","My subject",$msg);
       if($send) {
        echo 'ok';
       } else {
        echo 'failed';
       }
    } 

    public function back()
    {
        Url::redirectTo('/');
    }

}