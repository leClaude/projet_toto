<?php
session_start() ;
if ($_SERVER['REMOTE_ADDR']!=$_SESSION['ip']) {
    header("Location: disconnect.php");
} ;
require_once __DIR__.'/../inc/config.php' ;

if(isset($_GET['id'])) {
  $id = $_GET['id'] ;
  $id = trim(strip_tags($id)) ;

} ;

require_once __DIR__.'/../view/header.php' ;

require_once __DIR__.'/../view/footer.php' ;
 ?>
