<?php 

use Jenssegers\Blade\Blade;


// function homeController(){


//     echo $GLOBALS['blade']->make('pages/home', ['hello'=>'world1'])->render();


// }


class HomeController {

    private $blade;

    public function __construct() {
        
        $this->blade = new Blade('views', 'assets/cache');
    }

    public function getHome() {


        echo $this->blade->make('pages/home', ['hello'=>'world1'])->render();

    }


}



?>