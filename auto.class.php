<?php
interface AutoInterface {
    public function startEngine ();
    public function drive($speed);
    public function stop();
    public function turnLeft();
    public function turnRight();
    public function beep();
    public function showState();
}

abstract class Auto implements AutoInterface {
    public $soundEngine;  
    public $direct;  // направление движения
    public $currentSpeed;   // скорость

    public function drive($speed){
        $this->currentSpeed = $speed;
    }

    public function stop(){
        $this->currentSpeed = 0;
    }
    public function turnLeft(){
        $this->direct = 'Left';
    }
    public function turnRight(){
        $this->direct = 'Right';
    }
    public function beep(){
        echo 'Beep<br>';
    }
    public function showState(){
        echo '<br>';
        echo '<b>Speed:</b> '.$this->currentSpeed.'<br>';
        echo '<b>Direction:</b> '.$this->direct.'<br>';
    }
    abstract public function startEngine ();
    abstract public function loading($count);
    abstract public function unloading();
}

class Car extends Auto {
    
    const passengerCapacity = 4;
    
    public $countPassenger;

    public function __construct()
    {
        $this->soundEngine =  'вжжж';
    }

    public function startEngine (){
        echo $this->soundEngine.'<br>';
    }
    
    public function loading($count){
        if ($count > $this::passengerCapacity) {
            //throw new Exception('Перегруз!');
            echo 'Перегруз!<br>';
        }
        $this->countPassenger = $count;
    }
    
    public function unloading(){
        $this->countPassenger = 0;
    }
}

class Truck extends Auto {
    const loadCapacity = 10;  // грузоподъемность в тоннах
    
    public $weightCargo;
    
    public function __construct()
    {
        $this->soundEngine = 'гржжж';
    }

    public function startEngine (){
        echo $this->soundEngine.'<br>';
    }

    public function loading($count){
        if ($count > $this::loadCapacity) {
            //throw new Exception('Перегруз!');
            echo 'Перегруз!<br>';
        }
        $this->weightCargo = $count;
    }

    public function unloading(){
        $this->weightCargo = 0;
    }
}

class Bulldozer extends Auto {

    public function __construct()
    {
        $this->soundEngine = 'Чух-чух';
    }

    public function startEngine (){
        echo $this->soundEngine.'<br>';
    }
    public function loading($count){
        return;
    }

    public function unloading(){
        return;
    }
}

class Panzer extends Auto {
    const maxAmmunition = 20;
    
    public $countAmmunition;
    
    public function __construct()
    {
        $this->soundEngine = 'РРРРРР';
    }

    public function startEngine (){
        echo $this->soundEngine.'<br>';
    }

    public function loading($count){
        if ($count > $this::maxAmmunition) {
            //throw new Exception('Перегруз!');
            echo 'Перегруз!<br>';
        }
        $this->countAmmunition = $count;
    }

    public function unloading(){
        $this->countAmmunition = 0;
    }    
}

function showAuto(Auto $auto){
    $auto->loading(10);
    $auto->startEngine();
    $auto->beep();
    $auto->drive(50);
    $auto->turnLeft();
    $auto->showState();

}
