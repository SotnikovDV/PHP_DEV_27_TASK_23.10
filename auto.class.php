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
    public $soundEngine;  // звук запуска двигателя
    public $direct;  // направление движения
    public $currentSpeed;   // текущая скорость

    // Поехали!
    public function drive($speed){
        $this->currentSpeed = $speed;
    }
    // Остановка
    public function stop(){
        $this->currentSpeed = 0;
    }
    // Поворот налево
    public function turnLeft(){
        $this->direct = 'Left';
    }
    // Поворот направо
    public function turnRight(){
        $this->direct = 'Right';
    }
    // Гудок
    public function beep(){
        echo 'Beep<br>';
    }
    // Отобразить состояние
    public function showState(){
        echo '<br>';
        echo '<b>Speed:</b> '.$this->currentSpeed.'<br>';
        echo '<b>Direction:</b> '.$this->direct.'<br>';
    }
    // Завести
    abstract public function startEngine ();
    // Погрузка
    abstract public function loading($count);
    // Разгрузка
    abstract public function unloading();
}

// Легковушка
class Car extends Auto {
    
    const passengerCapacity = 4;
    
    public $countPassenger;

    public function __construct()
    {
        $this->soundEngine =  'вжжж';
    }

    // Спцифичное действие - переворачивание
    public function __invoke(){
        echo 'Ой бл...!';
    }

        public function startEngine (){
        echo $this->soundEngine.' Домчу куда скажите<br>';
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

// Грузовик
class Truck extends Auto {
    const loadCapacity = 10;  // грузоподъемность в тоннах
    
    public $weightCargo;
    
    public function __construct()
    {
        $this->soundEngine = 'гржжж';
    }

    // Спцифичное действие - отвал кузова
    public function __invoke(){
        echo 'Шшшшшшш.... Плюх!';
        }

    public function startEngine (){
        echo $this->soundEngine.' Грузите полный кузов<br>';
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

// Бульдозер
class Bulldozer extends Auto {

    public function __construct()
    {
        $this->soundEngine = 'Чух-чух';
    }

    // Спцифичное действие - опускание ковша
    public function __invoke(){
        echo 'Шлёпс!';
        }
    
    public function startEngine (){
        echo $this->soundEngine.' Разойдись! Бульдозер гуляет<br>';
    }
    public function loading($count){
        return;
    }

    public function unloading(){
        return;
    }
}

// Танк
class Panzer extends Auto {
    const maxAmmunition = 20;
    
    public $countAmmunition;
    
    public function __construct(){
        $this->soundEngine = 'РРРРРР';
    }
    // Спцифичное действие - выстрел
    public function __invoke(){
    echo 'Ба-Бах... Точно в цель!';
    }

    public function startEngine (){
        echo $this->soundEngine.' Ща как прицелюсь!<br>';
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
    // специфичное действие
    $auto();
}
