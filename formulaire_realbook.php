<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>"Réalbook"</title>
        <?php require "connexion.php";
            $appliBD = new Connexion(); ?>
    <link rel="stylesheet" type="text/css" href="recherch.css"> 
    <link rel="stylesheet" type="text/css" href="profile_realbook.css">
  </head>
  
  <body>    
  <?php include "header.php"?>

    <div>
        <h2>Formulaire</h2>
    </div>

    <?php
    $personnes=$appliBD->selectAllPersonne(); 
    foreach($personnes as $personne){
        return $personne->Nom;

    }?>

    <div class ="card1">
     <input type="url" name="url>" >
       
     <form method="POST">
     <?php $personnes=$appliBD->insertPersonne();
        foreach($personnes as $personne){?>
            <input type="text" name =" Nom" value="Nom"  <?php $personne->Nom?> > <br>
            <input type="text" name = "prenom" value="Prenom "<?php $personne->Prenom?>  ><br>
            <input type ="date" name="date" value="date"<?php $personne->Date_De_NaIssanca?> >
   

        <label for="statut">statut:</label>
        <select id="statut">
            <option value="">--choisir votre statut--</option>
            <option value="celibataire">celibataire</option>
            <option value="nom definé">nom definé</option>
            <option value="en couple">en couple</option>
   
        </select><br>
    
        <?php echo "<p> Musique: </p>";
            $musique =$appliBD->selectAllMusiques();
            foreach ($musique as $m){
                echo '<input Type ="checkbox" name="musiques[]" value='.$m->Id.'>'.$m->Type.'</input>';
                echo "<br>";
            }
        ?>

        <?php echo "<p> Hobbies: </p>";
            $hobbies =$appliBD->selectAllHobbies();
            foreach ($hobbies as $hobby){
                echo '<input Type ="checkbox" name ="hobbie[]" value=' .$hobby->Id .'>'.$hobby->Type.'</input>';
                echo "<br>";
            }
        ?>



      
            <label for="relation">Relation:</label><br> 
        <input type="checkbox" name="Phillipe Carmeno" value="Phillipe Carmeno" > Phillipe Carmeno 
        <select id="relation">
            <option value="">--Quel est votre lien--</option>
            <option value="amié">Amié</option>
            <option value="famille">famille</option>
            <option value="collége">collége</option>
        </select><br> 

        <input type="checkbox" name="Agnés Billard" value="Agnés Billard" > Agnés Billard
        <select id="relation">
            <option value="">--Quel est votre lien--</option>
            <option value="amié">Amié</option>
            <option value="famille">famille</option>
            <option value="collége">collége</option>
        </select><br>

        <input type="checkbox" name="Andria Da Costa" value="Adria Da Costa" > Andria Da Costa
        <select id="relation">
            <option value="">--Quel est votre lien--</option>
            <option value="amié">Amié</option>
            <option value="famille">famille</option>
            <option value="collége">collége</option>
        </select><br>

     </div>    
    </form> 
   
  </body>

  </html>