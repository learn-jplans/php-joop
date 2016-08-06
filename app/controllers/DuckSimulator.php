<?php 
namespace App\Controllers;

use Core\Http\Controller;
use App\Patterns\Strategy\Simuduck\MallardDuck;
use App\Patterns\Strategy\Simuduck\RubberDuck;
use App\Patterns\Strategy\Simuduck\RedHeadDuck;
use App\Patterns\Strategy\Simuduck\Behavior\FlyWithWings;
use App\Patterns\Strategy\Simuduck\Behavior\Quack;
use App\Patterns\Strategy\Simuduck\Behavior\MuteQuack;
use App\Patterns\Strategy\Simuduck\Behavior\FlyNoWay;
use App\Patterns\Strategy\Simuduck\DecoyDuck;


class DuckSimulator extends Controller
{

    public function index()
    {
        $mallard = new MallardDuck();
        $mallard->display();
        $mallard->performQuack();
        $mallard->performFly();

        $mallard->swim();
    }

    public function rubber()
    {
        $rubberDuck = new RubberDuck();
        $rubberDuck->display();
        $rubberDuck->performQuack();
        $rubberDuck->performFly();
        $rubberDuck->swim();
    }

    public function redhead()
    {
        $redHeadDuck = new RedHeadDuck();
        $redHeadDuck->display();
        $redHeadDuck->setFlyBehavior(new FlyWithWings());
        $redHeadDuck->setQuackBehavior(new Quack());
        $redHeadDuck->performQuack();
        $redHeadDuck->performFly();
        $redHeadDuck->swim();
    }

    public function decoy()
    {
        $decoyDuck = new DecoyDuck();
        $decoyDuck->display();
        $decoyDuck->setFlyBehavior(new FlyNoWay());
        $decoyDuck->setQuackBehavior(new MuteQuack());
        $decoyDuck->performQuack();
        $decoyDuck->performFly();
        $decoyDuck->swim();
    }
}