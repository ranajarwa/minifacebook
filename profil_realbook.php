<!DOCTYPE html>
<html>
  <head>
        <link rel="stylesheet" type="text/css" href="profile_realbook.css"> <!-- liné aves page css pour style -->
        <meta charset="UTF-8">
        <title>"Realbook"</title>
        <?php require "connexion.php";
                $appliBD = new Connexion(); ?>

        <link rel="stylesheet" type="text/css" href="recherch.css"> 
        <link rel="stylesheet" type="text/css" href="profile_realbook.css">
  </head>

  <body >    
   <?php include "header.php"?>

    <div class = grand>
    <img src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" name="homme"> <br/><!--image -->
  
        <div>
        <?php $personne = $appliBD->SelectPersonneById(3);
            echo "<h2>" . $personne->Nom ." ".$personne->Prenom ."</h2>";
            echo "<h3>" . $personne->Date_DE_NaIssance . "</h3>";
            echo "<h3>" . $personne->Status_couple . "</h3>";
        ?>
        </div>

    </div>
     <div class="type"> Type de musique</div>
     <?php 
        $hobbies =$appliBD->getPersonnHobby(3);
            foreach ($hobbies as $hoppy){
                echo "<span>".$hoppy->Type."</span>";
            }

       ?>  
    <div class="type"> HObbies</div>
        <ul>
            <li>Informatique</li>
            <li>Cinéma</li>
            <li>voyage</li>
        </ul>  

    <div class="type"> Relation
        <ul>
            <li>Agnés Billard (famille)</li>
            <li>Andria Do Costa(ami(e))</li>
        </ul>

    </div>
 
    </form> 
   
  </body>

  </html>