<?php 
namespace Core\Components;

use Core\Utils\Debug;
use Core\Utils\Config;
use Core\Database\Mysql;
use Core\Database\DataProvider;
/**
* 
*/


class Database extends DataProvider
{
  private $host;
  private $username;
  private $password;
  private $name;
  private $provider;
  private $dbInstance;

  function __construct()
  {
    $this->host = Config::get('database.host');
    $this->username = Config::get('database.username');
    $this->password = Config::get('database.password');
    $this->name = Config::get('database.name');
    $this->provider = Config::get('database.provider');

    $this->connect();
  }

  private function connect()
  {
    switch ($this->provider) {
      case 'mysql':
        $mysql = new MySql($this->host, $this->username, $this->password, $this->name);
        $this->setProvider($mysql);
        break;
      default:
        Debug::showErrorMessage('Unknown database provider');
        break;
     }
  }

  



}