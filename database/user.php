<?php
require_once __DIR__ . '/server.php';
require_once __DIR__ . '/indirizzo.php';
require_once __DIR__ . '/card.php';

class User
{

  public $nome;
  public $cognome;
  public $email;
  public $carrello;
  public $registrato;
  private $password;
  private $cardInfo;

  use Indirizzo;
  use Card;

  function __construct($_nome, $_cognome, $_email)
  {
    $this->nome = $_nome;
    $this->cognome = $_cognome;
    $this->email = $_email;
    $this->carrello = [];

    $this->registrato = false;
    $this->password = null;
    $this->cardInfo;
  }

  public function addToCart($_item, $q = 1)
  {

    if ($_item->disponibile && $_item->quantità >= $q && get_parent_class($_item) === 'Prodotto') {
      for ($i = 0; $i < $q; $i++) {
        $this->carrello[] = $_item;
      }
      echo '<p>Prodotto aggiunto al carrello: ' . $_item->nome . ' ' . $_item->marca . ' ' . $q . 'pz</p>';
    } else {
      throw new Exception('Impossibile aggiungere al carrello');
    }
  }

  public function getTotal()
  {
    $cart = $this->carrello;
    $totale = 0;

    foreach ($cart as $item) {
      $totale += intval($item->costo);
    }

    if ($this->registrato) {
      $totale = $totale - (($totale / 100) * 20);
    }

    return $totale;
  }

  public function signUp($_password)
  {
    $this->password = $_password;
    $this->registrato = true;
  }

  public function checkIfExpiredCard()
  {
    //controllare se la carta è stata inserita
    if (!$this->cardInfo) {
      throw new Exception('Carta mancante');
      return false;
    }
    // var_dump($currentDateTime);
    // var_dump($cardExpirationDateTime);

    //controllare la scadenza della carta
    $currentDate = date('m.y');
    $currentDateTime = strtotime($currentDate);
    $cardExpirationDateTime = strtotime($this->cardInfo->dataScadenza);

    if ($cardExpirationDateTime > $currentDateTime) {
      //la carta non è scaduta
      return true;
    } else {
      //la carta è scaduta
      throw new Exception('La carta è scaduta');
    }
  }

  public function checkForFunds()
  {
    //controllare se ci sono fondi sufficienti
    if ($this->cardInfo->fondi >= $this->getTotal()) {
      return true;

    } else {
      throw new Exception('Fondi Insufficienti');
    }
  }

  public function checkForAddress(){
    //controllare se è stato aggiunto un indirizzo
    if($this->indirizzo){
      // c'è l'indirizzo
      return true;
    }else{
      throw new Exception('Indirizzo mancante');
    }

  }

  public function payment()
  {

    //controllare se è stato inserito l'indirizzo
    try{
      $this->checkForAddress();
    }catch (Exception $e){
      var_dump($e->getMessage());
    }

    try {
      $this->checkIfExpiredCard();
    } catch (Exception $e) {
      var_dump($e->getMessage());
    }

    try{
      $this->checkForFunds();
    }catch(Exception $e){
      var_dump($e->getMessage);
    }

    //pagamento riuscito
    $this->cardInfo->fondi -= $this->getTotal();
    // var_dump($this->cardInfo->fondi);


    // var_dump('Ciao');
  }
}
