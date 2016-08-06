<?php 
namespace Core\Database;
use Core\Utils\Debug;
/**
* Mysql
*/
use Core\Components\Database;

class MySql extends Database implements DataProviderInterface
{
  function __construct($host, $username, $password, $dbname)
  {
    try {
       $this->conn = new \mysqli($host, $username, $password, $dbname);
     } catch (Exception $e) {
       Debug::showErrorMessage(mysqli_error($this->conn));
     }
  }

  public function getConnection()
  {
    return $this->conn;
  }

  public function execute($query)
  {
    $result = $this->conn->query($query);
    if(!$result) {
      Debug::showErrorMessage(mysqli_error($this->conn));
    }
    return $result;
  }

  public function fetchData($query)
  {
    $result = $this->execute($query);
    $data = [];
    while ($row = $result->fetch_object()) {
      $data[] = $row;
    }

    return $data;
  }
}