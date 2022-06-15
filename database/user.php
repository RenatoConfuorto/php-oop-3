<?php
require_once __DIR__ . '/server.php';

class User {

  public $nome;
  public $cognome;
  public $email;
  public $carrello;
  private $indirizzo;
  public $registrato;
  private $password;
  private $cardInfo;

  function __construct($_nome, $_cognome, $_email, $_indirizzo){
    $this->nome = $_nome;
    $this->cognome = $_cognome;
    $this->email = $_email;
    $this->carrello = [];
    $this->indirizzo = $_indirizzo;

    $this->registrato = false;
    $this->password = null;
    $this->cardInfo;

  }

  public function addToCart($_item, $q = 1){
    for($i = 0; $i < $q; $i++){
      $this->carrello[] = $_item;
    }
  }

  public function getTotal(){
    $cart = $this->carrello;
    $totale = 0;

    foreach($cart as $item){
      $totale += intval($item->costo);
    }

    if($this->registrato){
      $totale = $totale - (($totale / 100) * 20);
    }

    return $totale;
  }

  public function signUp($_password){
    $this->password = $_password;
    $this->registrato = true;
  }

  public function addCard($_cardNumber, $_cardExpiration, $_cardCVV, $_funds){
    $this->cardInfo->cardNumber = $_cardNumber;
    $this->cardInfo->cardExpiration = $_cardExpiration;
    $this->cardInfo->cardCVV = $_cardCVV;
    $this->cardInfo->funds = $_funds;
  }

  public function payment(){
    //controllare se la carta è scaduta
    $currentDate = date('d.m.y');
    $currentDateTime = strtotime($currentDate);
    $cardExpirationDateTime = strtotime($this->cardInfo->cardExpiration);
    // var_dump($currentDateTime);
    // var_dump($cardExpirationDateTime);

    //controllare la scadenza della carta
    if($cardExpirationDateTime > $currentDateTime){
      //la carta non è scaduta
      //controllare se ci sono fondi sufficienti
      if($this->cardInfo->funds >= $this->getTotal()){
        //pagamento riuscito
        echo '<h1>Pagamento Riuscito</h1>';
        $this->cardInfo->funds -= $this->getTotal();
        // var_dump($this->cardInfo->funds);
      }else{
        echo '<h1>Fondi Insufficienti</h1>';
      }
    }else{
      //la carta è scaduta
      echo 'La carta è scaduta';
    }
  }
}
