<?php
session_start() ;
require_once __DIR__.'/../inc/config.php' ;

if (!empty($_GET)) {
$token = trim(strip_tags($_GET['token'])) ;
$sql = "SELECT * FROM user WHERE usr_token=:token" ;
$pdoStatement = $pdo->prepare($sql) ;
$pdoStatement->bindValue(':token',$token) ;
$pdoStatement->execute() ;
$user = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;

}

require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/resetpwd.php' ;
require_once __DIR__.'/../view/footer.php' ;
 ?>
