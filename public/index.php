<?php
session_start() ;
if ($_SERVER['REMOTE_ADDR']!=$_SESSION['ip']) {
    header("Location: disconnect.php");
} ;
require_once __DIR__.'/../inc/config.php' ;


// plein de choses à faire
$sql = 'SELECT * FROM training' ;
$pdoStatement = $pdo->prepare($sql) ;
$pdoStatement->execute() ;
$trainingLoc = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;

$sql2 = 'SELECT cit_name,COUNT(*) FROM student INNER JOIN city ON city.cit_id=student.city_cit_id GROUP BY cit_name ORDER BY cit_name ASC' ;
$pdoStatement2 = $pdo->prepare($sql2) ;
$pdoStatement2->execute() ;
$studentByCity = $pdoStatement2->fetchAll(PDO::FETCH_ASSOC) ;

// on affiche
require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/home.php' ;
require_once __DIR__.'/../view/footer.php' ;

 ?>
