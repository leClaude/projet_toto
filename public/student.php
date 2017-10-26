<pre>
<?php
require_once __DIR__.'/../inc/config.php' ;

$id = $_GET['id'] ;

$sql = "SELECT * FROM student WHERE stu_id=:id" ;
$pdoStatement = $pdo->prepare($sql) ;
$pdoStatement->bindValue(':id',$id,PDO::PARAM_INT) ;
$pdoStatement->execute() ;
$student = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;

print_r($student) ;

 ?>
</pre>
