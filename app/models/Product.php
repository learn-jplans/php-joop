<?php 
namespace App\Models;

use Core\Components\DatabaseModel;
/**
* 
*/
class Product extends DatabaseModel
{
  
  protected $id;
  protected $name;
  protected $stock;
  protected $price;
  
}