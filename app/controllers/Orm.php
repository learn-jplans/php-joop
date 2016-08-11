<?php 
namespace App\Controllers;
use Core\Http\Controller;
use Core\Utils\Debug;
use App\Models\User;

/**
* 
*/
class Orm extends Controller
{
    public function getData()
    {
        $users = User::all();
        Debug::dump($users);
    }

    public function postData()
    {
        $users = [
            'eric' => 'Erick',
            'erica' => 'Erica',
            'juan' => 'Juan',
            'abby' => 'Abby'
        ];

        // $this->deleteAllPost();
        foreach ($users as $key => $value) {
            $user = new User();
            $user->name = $value;
            $user->username = $key;
            $user->password = '1234';
            $user->save();    
        }
    }

    public function deleteAllPost()
    {
        User::deleteAll();
    }
}