<!DOCTYPE html>
<html>
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
            <li class="nav-item">
              <a class="nav-link" href="list.php">Tous les étudiants</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add.php">Ajout d'un étudiant</a>
            </li>
          </ul>
          <form class="form-inline" action="list.php" method="get">
            <label class=" mr-2" for="">Recherche</label>
            <input class=" mr-2" type="text" name="search" value="">
             <button class="mr-2" type="submit">Envoyer</button>
          </form>
        </div>
      </nav>
    </header>
