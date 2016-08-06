<?php 
namespace App\Models;

use Core\Components\DatabaseModel;

class User extends DatabaseModel
{

    protected $id;
    protected $name;
    protected $username;
    protected $password;

}