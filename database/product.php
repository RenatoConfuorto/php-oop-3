<?php

class Prodotto {
  
  public $nome;
  public $marca;
  public $costo;
  public $codice;

  function __construct($_nome, $_marca, $_costo)
  {
    $this->nome = $_nome;
    $this->marca = $_marca;
    $this->costo = $_costo;

    $this->codice = random_int(1000000000, 9999999999);
  }

}