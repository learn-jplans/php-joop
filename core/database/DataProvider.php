<?php 
namespace Core\Database;
use Core\Database\DataProviderInterface;
/**
* 
*/
abstract class DataProvider
{
  private $provider;

  public function setProvider(DataProviderInterface $provider)
  {
    $this->provider = $provider;
  }

  public function execute($query)
  {
    $this->provider->execute($query);
  }
  
  public function fetchData($query)
  {
    return $this->provider->fetchData($query);
  }
}