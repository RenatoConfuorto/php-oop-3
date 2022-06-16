<?php

trait Card{
  public $numeroCarta;
  public $dataScadenza;
  public $CVV;
  public $fondi;

  public function addCard($_numeroCarta, $_dataScadenza, $_CVV, $_fondi){
    $this->cardInfo->cardNumber = $_numeroCarta;
    $this->cardInfo->cardExpiration = $_dataScadenza; // 'm.y'
    $this->cardInfo->cardCVV = $_CVV;
    $this->cardInfo->funds = $_fondi;
  }

}