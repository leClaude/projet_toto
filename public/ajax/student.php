<?php

require_once __DIR__.'\..\..\inc\config.php' ;

$id = $_POST['id'] ;


$sql = "SELECT stu_id, stu_lastname, stu_firstname, stu_email, stu_birthdate, cit_name, stu_friendliness, ses_number, tra_name FROM student INNER JOIN city ON city.cit_id=student.city_cit_id INNER JOIN session ON session.ses_id=student.session_ses_id INNER JOIN training ON training.tra_id=session.training_tra_id WHERE stu_id=:id" ;

$pdoStatement = $pdo->prepare($sql) ;
$pdoStatement->bindValue(':id',$id,PDO::PARAM_INT) ;
$pdoStatement->execute() ;
$student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;


?>

  <div class="card mx-auto mt-5">
          <i class="fa fa-times-circle-o text-right lead close" aria-hidden="true"></i>
    <div class="card-block">
        <h4 class="card-header text-center bg-primary text-white"><?php echo $student[0]['stu_firstname'].' '.$student[0]['stu_lastname']?></h4>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">IDENTIFIANT : <?= $student[0]['stu_id'] ?></li>
            <li class="list-group-item">NOM : <?= $student[0]['stu_lastname'] ?></li>
            <li class="list-group-item">PRENOM : <?= $student[0]['stu_firstname'] ?></li>
            <li class="list-group-item">DATE DE NAISSANCE : <?= $student[0]['stu_birthdate'] ?></li>
            <li class="list-group-item">EMAIL : <?= $student[0]['stu_email'] ?></li>
            <li class="list-group-item">FRIENDLINESS : <?= $student[0]['stu_friendliness'] ?></li>
        </ul>
    </div>
  </div>
