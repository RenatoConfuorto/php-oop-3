<?php

require_once __DIR__ . '/server.php';

trait Indirizzo {
  
  public function printAddress(){
    echo $this->paese . ', ' . $this->regione . ', ' . $this->provincia . ', ' . $this->comune . ', ' . $this->via;
  }

  public function addAddtress($_paese, $_regione, $_provincia, $_comune, $_via){

    $this->indirizzo->paese = $_paese;
    $this->indirizzo->regione = $_regione;
    $this->indirizzo->provincia = $_provincia;
    $this->indirizzo->comune = $_comune;
    $this->indirizzo->via = $_via;
  }

}