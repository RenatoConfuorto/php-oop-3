<?php
require_once __DIR__ . '/server.php';

class Gioco extends Prodotto {
  public $materiale;
  public $animale;

  function __construct($_nome, $_marca, $_costo, $_disponibile, $_quantità, $_materiale, $_animale)
  {
    parent::__construct($_nome, $_marca, $_costo, $_disponibile, $_quantità);

    $this->materiale = $_materiale;
    $this->animale = $_animale;
  }
  
}