<?php 
namespace Core\Components;
use Core\Utils\Debug;
use Core\Components\Database;
/**
* 
*/
class SqlCommands
{

  public static function insert($data = [])
  {
    $table = $data['name'];
    $fields = [];
    $values = [];
    $obj_data = array_filter($data['fields']);

    foreach ($obj_data as $key => $value) {
      $fields[] = $key;
      $values[] = "'".$value."'";
    }
    
    $fields = implode(',', $fields);
    $values = implode(',', $values);

    $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

    $db = Database::getInstace();
    $db->execute($sql);
    
  }

  public static function select($table)
  {
    $sql = "SELECT * FROM {$table}";
    $db = Database::getInstace();
    return $db->fetchData($sql);
  }

  public static function delete($data = [])
  {
    $table = $data['name'];
    $sql = "DELETE FROM {$table}";

    $db = Database::getInstace();
    $db->execute($sql);
  }

  public static function where($data = [], $cond)
  {

  }

  public static function update($data = [])
  {
    # code...
  }
}