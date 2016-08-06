<?php 
namespace App\Controllers;

use Core\Http\Controller;
use App\Patterns\Factory\Creator\NYPizzaStore;
use App\Patterns\Factory\Creator\ChicagoPizzaStore;
use Core\Utils\PrintText;

class PizzaHouse extends Controller
{
    public function index()
    {
        $nyStore = new NYPizzaStore();
        $chicagoStore = new ChicagoPizzaStore();

        $pizza = $nyStore->orderPizza('cheese');
        PrintText::nextLine('Juan ordered a ' . $pizza->getName());
        PrintText::nextLine('');

        $pizza = $chicagoStore->orderPizza('cheese');
        PrintText::nextLine('Erica ordered a ' . $pizza->getName());
    }
}