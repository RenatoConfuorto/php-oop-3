<?php
require_once __DIR__ . '/product.php';

class Cibo extends Prodotto{

  public $gusto;
  public $tagliaAnimali;
  public $confezione;

  function __construct($_nome, $_marca, $_costo, $_gusto, $_tagliaAnimali, $_confezione)
  {
    parent::__construct($_nome, $_marca, $_costo);

    $this->gusto = $_gusto;
    $this->tagliaAnimali = $_tagliaAnimali;
    $this->confezione = $_confezione;
  }
}