<?php
session_start() ;
if ($_SERVER['REMOTE_ADDR']!=$_SESSION['ip']) {
    header("Location: disconnect.php");
    exit ; 
} ;
require_once __DIR__.'/../inc/config.php' ;

// récupérer les informations sur tous les étudiants
$page = 1 ;
$offset = 0 ;

if(isset($_GET['del'])){
  $delete = $_GET['del'] ;
  $delete = trim(strip_tags($delete)) ;
  $sql = "DELETE FROM student WHERE stu_id=:del" ;
  $pdoStatement = $pdo->prepare($sql) ;
  $pdoStatement->bindValue(':del',$delete,PDO::PARAM_INT) ;
  $pdoStatement->execute() ;
  echo '<script type="text/javascript">alert("Elève supprimé")</script>';
} ;

if(isset($_GET['search'])){
  $search = $_GET['search'] ;
  $search = trim(strip_tags($search)) ;

  $sql = "SELECT * FROM student INNER JOIN city ON city.cit_id=student.city_cit_id WHERE stu_lastname LIKE :search OR stu_firstname LIKE :search OR stu_email LIKE :search OR cit_name LIKE :search" ;
  $pdoStatement = $pdo->prepare($sql) ;
  $pdoStatement->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR) ;
  $pdoStatement->execute() ;
  $list = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;
} else if (isset($_GET['ses'])){
    $ses = $_GET['ses'] ;
    $ses = trim(strip_tags($ses)) ;
    $sql = "SELECT * FROM student INNER JOIN session ON session.ses_id=student.session_ses_id WHERE session_ses_id=:ses ORDER BY stu_id ASC" ;
    $pdoStatement = $pdo->prepare($sql) ;
    $pdoStatement->bindValue(':ses', $ses, PDO::PARAM_INT) ;
    $pdoStatement->execute() ;
    $list = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;
  } else {
      if (isset($_GET['page'])){
          $page= $_GET['page'] ;
          $offset = ($page-1)*5 ;
          if ($page>1){
            $prev = $page-1 ;
          } ;
        } ;
      $next = $page+1 ;
      $sql = "SELECT * FROM student ORDER BY stu_id ASC LIMIT 5 OFFSET {$offset}" ;
      $pdoStatement = $pdo->prepare($sql) ;
      $pdoStatement->execute() ;
      $list = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;
    } ;

// inclusion header et footer
require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/list.php' ;
require_once __DIR__.'/../view/footer.php' ;

 ?>
