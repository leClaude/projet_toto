<?php

$dsn = "mysql:dbname={$config['DB_DATABASE']}; host={$config['DB_HOST']}; charset=UTF8" ;

try{
  $pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD']) ;
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (exception $e){
  echo 'connexion échouée : '.$e->getMessage() ;
} ;


 ?>
