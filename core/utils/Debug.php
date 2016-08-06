<?php 
namespace Core\Utils;
/**
* 
*/
class Debug
{
  
  public static function showMessage($message) {
    print $message;
  }

  public static function showErrorMessage($message) {
    self::showMessage($message);
    die;
  }

  public static function dump($data)
  {
    self::showMessage('<pre>');
    var_dump($data);
    self::showMessage('</pre>');
  }
}