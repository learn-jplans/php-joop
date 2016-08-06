<?php 
namespace App\Controllers;

use App\Patterns\Decorator\Beverages\Espresso;
use App\Patterns\Decorator\Beverages\DarkRoast;
use App\Patterns\Decorator\Condiments\Mocha;
use App\Patterns\Decorator\Condiments\Whip;
use App\Patterns\Decorator\Components\Beverage;
use Core\Utils\PrintText;

class StarBuzz
{
    public function index()
    {
        $espresso = new Espresso();
        PrintText::nextLine($espresso->getSize() . ': ' . $espresso->getDescription() . ' $' . $espresso->cost());

        $darkRoast = new DarkRoast();
        $darkRoast->setSize(Beverage::VENTI);

        $darkRoast = new Mocha($darkRoast);
        $darkRoast = new Mocha($darkRoast);
        $darkRoast = new Whip($darkRoast);
        PrintText::sameLine($darkRoast->getSize() . ': ' . $darkRoast->getDescription() . ' $' . $darkRoast->cost());
    }
}