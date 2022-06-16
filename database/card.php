<?php

trait Card{

  public function addCard($_numeroCarta, $_dataScadenza, $_CVV, $_fondi){
    $this->cardInfo->numeroCarta = $_numeroCarta;
    $this->cardInfo->dataScadenza = $_dataScadenza; // 'm.y'
    $this->cardInfo->CVV = $_CVV;
    $this->cardInfo->fondi = $_fondi;
  }

}