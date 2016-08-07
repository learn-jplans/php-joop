<?php 
namespace Core\Components;
use Core\Components\Model;
use Core\Utils\Debug;
use Core\Components\SqlCommands;
/**
*   
*/
class DatabaseModel extends Model
{
  public function save()
  {
    $obj = $this->extractObject();
    SqlCommands::insert($obj);
  }

  public function update()
  {
    # code...
  }

  public static function deleteAll()
  {
    $table = self::getTableName();
    SqlCommands::delete(['name' => $table]);
  }

  public function where($field, $value)
  {
    return $this;
  }

  public function find($id)
  {
    # code...
  }

  public static function all()
  {
    $table = self::getTableName();
    return SqlCommands::select($table);
  }

  public function get()
  {
    # code...
  }

  public function orderBy($field, $value)
  {
    # code...
  }

  public function limit($value)
  {
    # code...
  }
}