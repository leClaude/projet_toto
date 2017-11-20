<?php

require_once __DIR__.'\..\..\inc\config.php' ;

  $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
  $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
  $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $friendliness = isset($_POST['friendliness']) ? $_POST['friendliness'] : '';
  $session = isset($_POST['session']) ? $_POST['session'] : '';
  $city = isset($_POST['city']) ? $_POST['city'] : '';
  $id = isset($_POST['id']) ? $_POST['id'] : '';

  // nettoyage des variables
  $lastname = strtoupper(trim(strip_tags($lastname)));
  $firstname = ucfirst(trim(strip_tags($firstname)));
  $birthdate = trim(strip_tags($birthdate));
  $email = trim(strip_tags($email));
  $session = trim(strip_tags($session));
  $city = trim(strip_tags($city));
  $id = trim(strip_tags($id)) ;

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



// insertion - modification dans la db

// création si get n'existe pas - modification si il existe
if($formOk) {
    if ($id==0) {
      $sql = "INSERT INTO student (stu_lastname, stu_firstname, stu_birthdate, stu_email, stu_friendliness, session_ses_id, city_cit_id) VALUES (:lastname, :firstname, :birthdate, :email, :friendliness, :session, :city)" ;
      $pdoStatement = $pdo->prepare($sql) ;
      $pdoStatement->bindValue(':lastname',$lastname) ;
      $pdoStatement->bindValue(':firstname',$firstname) ;
      $pdoStatement->bindValue(':birthdate',$birthdate) ;
      $pdoStatement->bindValue(':email',$email) ;
      $pdoStatement->bindValue(':friendliness',$friendliness) ;
      $pdoStatement->bindValue(':session',$session) ;
      $pdoStatement->bindValue(':city',$city) ;
      $pdoStatement->execute() ;
      echo "Etudiant ajouté." ;
    } else {
        $sql2 = "UPDATE student SET stu_lastname=:lastname, stu_firstname=:firstname, stu_birthdate=:birthdate, stu_email=:email, stu_friendliness=:friendliness, session_ses_id=:session, city_cit_id=:city WHERE stu_id=:id" ;
        $pdoStatement2 = $pdo->prepare($sql2) ;
        $pdoStatement2->bindValue(':lastname',$lastname) ;
        $pdoStatement2->bindValue(':firstname',$firstname) ;
        $pdoStatement2->bindValue(':birthdate',$birthdate) ;
        $pdoStatement2->bindValue(':email',$email) ;
        $pdoStatement2->bindValue(':friendliness',(int)$friendliness) ;
        $pdoStatement2->bindValue(':session',(int)$session) ;
        $pdoStatement2->bindValue(':city',(int)$city) ;
        $pdoStatement2->bindValue(':id',(int)$id) ;
        $pdoStatement2->execute() ;
        echo 'Etudiant mis à jour.' ;
      } ;
} else {
    echo 'Formulaire incomplet ou incorrect.' ;
} ;
