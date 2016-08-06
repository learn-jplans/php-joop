<?php 
namespace App\Controllers;

use Core\Http\Controller;
use Core\Components\Session;
use App\Models\User;

class Home extends Controller
{
    public function __construct()
    {
        Session::start();
    }
    public function index()
    {
        
        // $mail = 'test@web.com';

        // $mail = preg_replace('/@/', '&#64', $mail);
        // $mail = preg_replace('/\./', '&#46', $mail); 

        // echo $mail;
        // mail('juanito.lansangan@codeandtheory.com', "Hello World!", "THe quick brown fox");
        // phpinfo();
        // die;
        // $user = new User();
        // $user->id = 'jplans';
        // $user->name = 'Juan';
        // $user->age = 28;
        // $user->address = 'CSFP';
        
        // echo json_encode(array('user' => (array) $user));
        $str = "What made you say \"yes\" to Montblanc? find <a href=\"http://twitter.com/search?q=HughJackman\">#HughJackman</a>";
        $str = "What made you say \"yes\" to Montblanc? find <a href=\"http://twitter.com/search?q=HughJackman\">#HughJackman</a> answer <a href=\"http://twitter.com/search?q=Australia\">#Australia</a> <a href=\"http://twitter.com/search?q=Interview\">#Interview</a> <a href=\"http://t.co/fudJ8bTvhM\" target=\"_blank\">https://t.co/fudJ8bTvhM</a>";
        $addlinks = preg_replace("/<a (href=\".*?\").*?>/", "<a $1 target=\"_blank\">", $str);
        print $addlinks;
        // return $this->view('about', [
        //     'str' => $addlinks
        // ]);


        $sHREFBefore = 'This should be working. <a href="http://something.php">Some Link</a><br>This should be working. <a href="something.php">Some Link</a><br>This should be working. <a href="something.php" target="_blank">Some Link</a><br>This should be working. <a href="something.php" target="_blank">Some Link</a><br>This should be working. <a href="something.php">Some Link</a>';

        // $sHREFAfter = preg_replace("/(\<a\s+href=\"[\w.]+\")/","$1 target=\"_blank\"",$sHREFBefore); 
        $sHREFAfter = preg_replace("/<a (href=\".*?\").*?>/", "<a $1 target=\"_blank\">",$sHREFBefore); 
        print  $sHREFAfter;
    }

    public function json()
    {
        $item = new stdClass;
        $item->name = 'Buffalo';

        var_dump($item);
    }
}