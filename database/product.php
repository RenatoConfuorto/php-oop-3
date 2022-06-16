<?php

class Prodotto {
  
  public $nome;
  public $marca;
  public $costo;
  public $disponibile;  //bool;
  public $quantità;  //int
  public $codice;

  function __construct($_nome, $_marca, $_costo, $_disponibile, $_quantità)
  {
    $this->nome = $_nome;
    $this->marca = $_marca;
    $this->costo = $_costo;
    $this->disponibile = $_disponibile;
    $this->quantità = $_quantità;
    

    $this->codice = random_int(1000000000, 9999999999);
  }

}