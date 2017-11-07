<?php
session_start() ;
require_once __DIR__.'/../inc/config.php' ;
session_destroy() ;

// on affiche
require_once __DIR__.'/../view/header.php' ;
?>
<div class="container w-50 mx-auto">
    <h2 class="w-50 mx-auto mt-5 text-center text-danger">Vous êtes déconnecté(e) !</h2>
    <a href="signin.php" class="btn btn-primary w-100 mt-5">Connectez-vous !</a>
    <a href="signup.php" class="btn btn-primary w-100 mt-2">Enregistrez-vous !</a>
</div>
<?php
require_once __DIR__.'/../view/footer.php' ;

?>
