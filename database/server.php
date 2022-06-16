<?php 
require_once __DIR__ . '/product.php';
require_once __DIR__ . '/food.php';
require_once __DIR__ . '/games.php';
require_once __DIR__ . '/user.php';
require_once __DIR__ . '/indirizzo.php';
require_once __DIR__ . '/card.php';

$prodotti = [];

$crocchetteN_T_10 = new Cibo('Crocchette gatti', 'Natural Trainer', '35', true, 12, 'Pollo', 'Adult', '10Kg');
$crocchettteR_C_2 = new Cibo('Crocchette gatti', 'Royal Canin', '22', true, 5, 'Anatra', '8years+', '2Kg');
$ossoCani = new Gioco('Osso per cani', 'Natural Trainer', '1.5', true, 20, 'Plastica', 'Cani');
$tiragraffi = new Gioco('Tiragraffi', 'Natural Trainer', '10', true, 5, 'Corda', 'Gatto');

$prodotti[] = $crocchetteN_T_10;
$prodotti[] = $crocchettteR_C_2;
$prodotti[] = $ossoCani;
$prodotti[] = $tiragraffi;

//l'utente inserisce i dati
$renato = new User('Renato', 'Confuorto', 'renato@gmail.com');
try{
  $renato->addToCart($crocchetteN_T_10, 20);
} catch (Exception $e){
  echo '<p>'. $e->getMessage() . '</p>';
  // var_dump($e->getMessage());
}

try{
  $renato->addTocart($tiragraffi);
} catch (Exception $e){
  echo '<p>'. $e->getMessage() . '</p>';
  // var_dump($e->getMessage());
}

try{
  $renato->addToCArt($ossoCani, 7);
} catch (Exception $e){
  echo '<p>'. $e->getMessage() . '</p>';
  // var_dump($e->getMessage());
}

//l'utente si regisistra e aggiunge una carta
$renato->signUp('renatoconfuorto');
$renato->addCard('2544369859664457', '06.24', '224', 1220.30);
$renato->addAddtress('Italia', 'Campania', 'Napoli', 'Casoria', 'Via Roma 16');

//ottenere il totale del carrello
$totale = $renato->getTotal();

//pagare con la carta
$renato->payment();



var_dump($totale);

var_dump($renato);


// var_dump($prodotti);

