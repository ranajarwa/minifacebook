<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>  "Realbook" </title>

  <?php require "connexion.php";
     $appliBD = new Connexion(); ?>

  <link rel="stylesheet" type="text/css" href="recherche.css">
  <link rel="stylesheet" type="text/css" href="profille_realbook.css">

</head>

<body>
  <?php include "header.php"?>

  <?php $personnes = $appliBD->selectAllPersonne(); 

  foreach($personnes as $personne){?>
     <div class="grand">
      <div class="img1">
        <img src= <?php $personne->URL_Photo;?>
         name="";
         height=75% width=75%> <br />
      </div>

 
      <div class="h3">
        <?php echo $personne->Prenom ; echo "  ".$personne->Nom ;?>
      </div>
  </div>
<?php 
  }
    ?>

 

</body>

</html>