<!DOCTYPE html>
<html>
<!--
     __      _____  ______  __      ______  __    __  ______   _____
    |  |    |   __||   ___||  |    |  __  ||  |  |  ||   _  \ |   __|
    |  |    |  |__ |  |    |  |    | |__| ||  |  |  ||  |  \ \|  |__
    |  |    |   __||  |    |  |    |  __  ||  |  |  ||  |  | ||   __|
    |  |___ |  |__ |  |___ |  |___ | |  | ||  |__|  ||  |__/ /|  |__
    |______||_____||______||______||_|  |_||________||______/ |_____|

-->
<!--*************** HEAD ***************-->
  <head>
    <!-- AFFICHAGE -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- SEO A COMPLETER -->
    <meta name="title" content="Mon titre">
    <meta name="description" content="Description du site">
    <!-- TITRE -->
    <title></title>
<!--*************** LINKS ***************-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- FONT AWESOME LOCAL <link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css"> -->
    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <!-- NORMALIZE <link rel="stylesheet" href="css/normalize.css"> -->
    <!-- BOOTSTRAP LOCAL <link rel="stylesheet" href="lib/Bootstrap/css/bootstrap.min.css"> -->
    <!-- BOOTSTRAP CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <!-- JQUERY UI LOCAL <link rel="stylesheet" href="lib/jquery-ui-1.12.1/jquery-ui.min.css"> -->
    <!-- JQUERY UI CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <!-- MON CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Toutes les sessions</a>
            </li>
            <?php if (!empty($_SESSION['id'])) : ?>
                <li class="nav-item">
                  <a class="nav-link" href="list.php">Tous les étudiants</a>
                </li>
            <?php endif ; ?>
            <?php if (!empty($_SESSION['role'])) : if ($_SESSION['role']=='admin') : ?>
                <li class="nav-item">
                  <a class="nav-link" href="add.php">Ajout d'un étudiant</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="transfert.php">Transfert de fichiers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="users.php">Users</a>
                </li>
            <?php endif ; endif ;?>
            <?php if(empty($_SESSION['id'])) : ?>
                <li class="nav-item">
                  <a class="nav-link" href="signup.php">Inscription</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="signin.php">Connexion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="newpwd.php">Mot de passe oublié</a>
                </li>
            <?php endif ; ?>
          </ul>
          <?php if(!empty($_SESSION['id'])) : ?>
              <span class="text-info pr-2">Connecté en tant que : <?= $_SESSION['id'] ?></span>
              <a href="disconnect.php" class="btn btn-outline-info mr-5">Déconnexion</a>
          <?php endif ; ?>
          <form class="form-inline" action="list.php" method="get">
            <label class=" mr-2" for="">Recherche</label>
            <input class="form-control mr-2" type="text" name="search" value="">
             <button class="btn btn-outline-info mr-2" type="submit">Envoyer</button>
          </form>
        </div>
      </nav>
    </header>
