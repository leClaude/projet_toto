<?php
require_once __DIR__.'/../inc/config.php' ;

// récupérer les informations sur tous les étudiants
$sql = 'SELECT * FROM student ORDER BY stu_id ASC' ;
$pdoStatement = $pdo->prepare($sql) ;
$pdoStatement->execute() ;
$list = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;


// inclusion header et footer
require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/list.php' ;
require_once __DIR__.'/../view/footer.php' ;

 ?>
