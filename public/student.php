<?php
require_once __DIR__.'/../inc/config.php' ;

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'] ;
} else {
  echo "Aucun étudiant trouvé." ;
  exit ;
} ;

$sql = "SELECT stu_id, stu_lastname, stu_firstname, stu_email, stu_birthdate, cit_name, stu_friendliness, ses_number, tra_name FROM student INNER JOIN city ON city.cit_id=student.city_cit_id INNER JOIN session ON session.ses_id=student.session_ses_id INNER JOIN training ON training.tra_id=session.training_tra_id WHERE stu_id=:id" ;

$pdoStatement = $pdo->prepare($sql) ;
$pdoStatement->bindValue(':id',$id,PDO::PARAM_INT) ;
$pdoStatement->execute() ;
$student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;

require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/student.php' ;
require_once __DIR__.'/../view/footer.php' ;
 ?>
