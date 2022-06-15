<?php 
require_once __DIR__ . '/product.php';
require_once __DIR__ . '/food.php';
require_once __DIR__ . '/games.php';
require_once __DIR__ . '/user.php';

$prodotti = [];

$crocchetteN_T_10 = new Cibo('Crocchette gatti', 'Natural Trainer', '35', 'Pollo', 'Adult', '10Kg');
$crocchettteR_C_2 = new Cibo('Crocchette gatti', 'Royal Canin', '22', 'Anatra', '8years+', '2Kg');
$ossoCani = new Gioco('Osso per cani', 'Natural Trainer', '1.5', 'Plastica', 'Cani');
$tiragraffi = new Gioco('Tiragraffi', 'Natural Trainer', '10', 'Corda', 'Gatto');

$prodotti[] = $crocchetteN_T_10;
$prodotti[] = $crocchettteR_C_2;
$prodotti[] = $ossoCani;
$prodotti[] = $tiragraffi;

//l'utente inserisce i dati
$renato = new User('Renato', 'Confuorto', 'renato@gmail.com', 'Via Roma 16');
$renato->addToCart($crocchetteN_T_10, 2);
$renato->addTocart($tiragraffi);
$renato->addToCArt($ossoCani, 7);

//l'utente si regisistra e aggiunge una carta
$renato->signUp('renatoconfuorto');
$renato->addCard('2544369859664457', '20.06.24', '224', 122.30);

//ottenere il totale del carrello
$totale = $renato->getTotal();

//pagare con la carta
$renato->payment();



var_dump($totale);

var_dump($renato);

// var_dump($prodotti);

