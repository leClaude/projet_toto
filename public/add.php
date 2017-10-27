<?php
require_once __DIR__.'/../inc/config.php' ;

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

// afffectation du POST aux variables
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$friendliness = isset($_POST['friendliness']) ? $_POST['friendliness'] : '';
$session = isset($_POST['session']) ? $_POST['session'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';

// nettoyage des variables
$lastname = strtoupper(trim(strip_tags($lastname)));
$firstname = ucfirst(trim(strip_tags($firstname)));
$email = trim(strip_tags($email));
$session = substr($session,0,1) ;
$city = substr($city,0,2) ;
$session = trim($session) ;
$city = trim($city) ;

// validation des données
$formOk = true;
if (strlen($lastname)<2) {
  $formOk = false ;
  //echo 'Nom invalide.<br>' ;
} ;
if (strlen($firstname)<2) {
  $formOk = false ;
  //echo 'Prénom invalide.<br>' ;
} ;

if (empty($birthdate)) {
  //echo 'Date de naissance invalide.<br>';
  $formOk = false;
} ;
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  //echo 'Email invalide.<br>' ;
  $formOk = false;
} ;
if (empty($session)) {
  //echo 'Session invalide.<br>';
  $formOk = false;
} ;
if (empty($city)) {
  //echo 'Date de naissance invalide.<br>';
  $formOk = false;
} ;


// insertion dans la db
if ($formOk) {
  $sql = "INSERT INTO student (stu_lastname, stu_firstname, stu_birthdate, stu_email, stu_friendliness, session_ses_id, city_cit_id) VALUES (:lastname, :firstname, :birthdate, :email, :friendliness, :session, :city)" ;
  $pdoStatement = $pdo->prepare($sql) ;
  $pdoStatement->bindValue(':lastname',$lastname, PDO::PARAM_STR) ;
  $pdoStatement->bindValue(':firstname',$firstname, PDO::PARAM_STR) ;
  $pdoStatement->bindValue(':birthdate',$birthdate, PDO::PARAM_INT) ;
  $pdoStatement->bindValue(':email',$email, PDO::PARAM_STR) ;
  $pdoStatement->bindValue(':friendliness',$friendliness, PDO::PARAM_INT) ;
  $pdoStatement->bindValue(':session',$session, PDO::PARAM_INT) ;
  $pdoStatement->bindValue(':city',$city, PDO::PARAM_INT) ;
  $pdoStatement->execute() ;
  $id = $pdo->lastInsertId() ;
  header("Location: /student.php?id={$id}");
  exit();
} else {
  //echo 'formulaire non valide' ;
} ;



require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/add.php' ;
require_once __DIR__.'/../view/footer.php' ;

 ?>
