<?php
session_start() ;
if ($_SERVER['REMOTE_ADDR']!=$_SESSION['ip']) {
    header("Location: disconnect.php");
    exit ;
} ;
if ($_SESSION['role']!='admin') {
    header("Location: 403.php");
    exit ;
} ;
require_once __DIR__.'/../inc/config.php' ;


// Si requête de modification - chargement des valeurs de l'élève
if(isset($_GET['id'])) {
$id = trim(strip_tags($_GET['id'])) ;
  $sql = 'SELECT stu_lastname, stu_firstname, stu_birthdate, stu_email, stu_friendliness, session_ses_id, city_cit_id, cit_name, cit_id, ses_id, ses_number, ses_start_date, ses_end_date FROM student INNER JOIN city ON city.cit_id=student.city_cit_id INNER JOIN session ON session.ses_id=student.session_ses_id WHERE stu_id=:id' ;
  $pdoStatement = $pdo->prepare($sql) ;
  $pdoStatement->bindValue(':id',$id,PDO::PARAM_INT) ;
  $pdoStatement->execute() ;
  $student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;
  $lastname = $student[0]['stu_lastname'] ;
  $firstname = $student[0]['stu_firstname'] ;
  $birthdate = $student[0]['stu_birthdate'] ;
  $email = $student[0]['stu_email'] ;
  $friendliness = $student[0]['stu_friendliness'] ;
  $session = $student[0]['session_ses_id'] ;
  $city = $student[0]['city_cit_id'] ;
} else {
    $lastname = '' ;
    $firstname = '' ;
    $birthdate = '' ;
    $email = '' ;
    $friendliness = '' ;
    $session = '' ;
    $city = '' ;
};


// récupération de la liste des villes
$sql1 = "SELECT cit_name, cit_id FROM city" ;
$pdoStatement1 = $pdo->prepare($sql1) ;
$pdoStatement1->execute() ;
$cities = $pdoStatement1->fetchAll(PDO::FETCH_ASSOC) ;

// récupération de la liste des sessions
$sql2 = "SELECT ses_id, ses_number, ses_start_date, ses_end_date FROM session" ;
$pdoStatement2 = $pdo->prepare($sql2) ;
$pdoStatement2->execute() ;
$sessions = $pdoStatement2->fetchAll(PDO::FETCH_ASSOC) ;



require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/add.php' ;
require_once __DIR__.'/../view/footer.php' ;

 ?>
