<?php
require_once __DIR__.'/../inc/config.php' ;

$lastname = '';
$firstname = '';
$birthdate = '';
$email = '';
$friendliness = '';
$session = '';
$city = '';


if(isset($_GET['id'])) {
  $id = $_GET['id'] ;
  $id = trim(strip_tags($id)) ;
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
} ;

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
if(isset($_POST['lastname'])){
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
    if(empty($_GET['id'])) {
      $sql = "INSERT INTO student (stu_lastname, stu_firstname, stu_birthdate, stu_email, stu_friendliness, session_ses_id, city_cit_id) VALUES (:lastname, :firstname, :birthdate, :email, :friendliness, :session, :city)" ;
    } else {
      $sql = "UPDATE student SET stu_lastname=:lastname, stu_firstname=:firstname, stu_birthdate=:birthdate, stu_email=:email, stu_friendliness=:friendliness, session_ses_id=:session, city_cit_id=:city WHERE stu_id=:id" ;
      print_r("hello") ;
    }
    $pdoStatement = $pdo->prepare($sql) ;
    $pdoStatement->bindValue(':lastname',$lastname, PDO::PARAM_STR) ;
    $pdoStatement->bindValue(':firstname',$firstname, PDO::PARAM_STR) ;
    $pdoStatement->bindValue(':birthdate',$birthdate, PDO::PARAM_INT) ;
    $pdoStatement->bindValue(':email',$email, PDO::PARAM_STR) ;
    $pdoStatement->bindValue(':friendliness',$friendliness, PDO::PARAM_INT) ;
    $pdoStatement->bindValue(':session',$session, PDO::PARAM_INT) ;
    $pdoStatement->bindValue(':city',$city, PDO::PARAM_INT) ;
    $pdoStatement->bindValue(':id',$id, PDO::PARAM_INT) ;
    $pdoStatement->execute() ;
    if(empty($_GET['id'])) {
      $id = $pdo->lastInsertId() ;
    } else {
      print_r($pdoStatement->fetchAll(PDO::FETCH_ASSOC)) ;
    };
    header("Location: student.php?id={$id}");
    exit();
  } else {
    //echo 'formulaire non valide' ;
  } ;
} ;


require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/add.php' ;
require_once __DIR__.'/../view/footer.php' ;

 ?>
