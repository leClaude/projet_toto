<?php
session_start() ;
header($_SERVER["SERVER_PROTOCOL"].' 403 Forbidden', true, 403);
require_once __DIR__.'/../inc/config.php' ;

// on affiche
require_once __DIR__.'/../view/header.php' ;
?>
<div class="container w-50 mx-auto">
    <img class="w-100 mt-5" src="img/error_403.jpg" alt="Erreur 403 : accès interdit">
    <p class="w-50 mx-auto mt-5 text-center">Veuillez vous connecter en tant qu'administrateur pour accéder à cette page...</p>
</div>
<?php
require_once __DIR__.'/../view/footer.php' ;

?>
