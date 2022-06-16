<?php

require_once __DIR__ . '/server.php';

trait Indirizzo {
   public $paese;
   public $regione;
   public $provinvia;
   public $comune;
   public $via;

  public function printAddress(){
    echo $this->paese . ', ' . $this->regione . ', ' . $this->provincia . ', ' . $this->comune . ', ' . $this->via;
  }

  public function addAddtress($_paese, $_regione, $_provincia, $_comune, $_via){

    $this->paese = $_paese;
    $this->regione = $_regione;
    $this->provincia = $_provincia;
    $this->comune = $_comune;
    $this->via = $_via;
  }

}