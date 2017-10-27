<?php
require_once __DIR__.'/../inc/config.php' ;

// récupérer les informations sur tous les étudiants
if(isset($_GET['search'])){

$search = $_GET['search'] ;

} ;



$page = 1 ;
if (isset($_GET['page'])){
  $page= $_GET['page'] ;
}
$offset = ($page-1)*5 ;

if ($page>1){
  $prev = $page-1 ;
} ;
$next = $page+1 ;


$sql = "SELECT * FROM student ORDER BY stu_id ASC LIMIT 5 OFFSET {$offset}" ;
$pdoStatement = $pdo->prepare($sql) ;
$pdoStatement->execute() ;
$list = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;


// inclusion header et footer
require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/list.php' ;
require_once __DIR__.'/../view/footer.php' ;

 ?>
