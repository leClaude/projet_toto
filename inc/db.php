<?php

$dsn = "mysql:dbname={$config['DB_DATABASE']}; host={$config['DB_HOST']}; charset=UTF8" ;

try{
  $pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD']) ;
}
catch (exception $e){
  echo 'connexion échouée : '.$e->getMessage() ;
} ;


 ?>
