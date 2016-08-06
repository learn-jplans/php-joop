<?php 
namespace Core\Database;

interface DataProviderInterface {
  public function getConnection();
  public function execute($query);
  public function fetchData($query);
}