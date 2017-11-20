<?php
session_start() ;
if ($_SERVER['REMOTE_ADDR']!=$_SESSION['ip']) {
    header("Location: disconnect.php");
    exit ;
} ;
require_once __DIR__.'/../inc/config.php' ;

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'] ;
} else {
  echo "Aucun étudiant trouvé." ;
  exit ;
} ;


require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/student.php' ;
require_once __DIR__.'/../view/footer.php' ;
 ?>
 <script type="text/javascript">
     $.ajax({
         url : 'ajax/student.php',
         method : 'POST',
         data : {
             id : <?= $id ?>
         }
     }).done(function(response){
         $('#studentContent').html(response) ;
         alert
     }) ;
 </script>
