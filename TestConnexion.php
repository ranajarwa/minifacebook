<?php

require "connexion.php";

$appliBD = new Connexion();

//insérer quelque type dans le tableau Hoppy
/*$x = $appliBD->insertHobby ("informatique");
echo "<br>".$x;

$y = $appliBD->insertHobby ("musique");
echo "<br>".$y;*/

/*$a = $appliBD->insertHoppy("sport");
echo "<br>".$a;*/

/*$b = $appliBD->insertHoppy("voyage");
echo "<br>".$b;*/

/*insérer quelque type dans le tableau Musique
$c = $appliBD->insertMusique("Rape");
echo "<br>".$c;*/

/*$d = $appliBD->insertMusique("rock");
echo "<br>".$d;*/

/*$f = $appliBD->insertMusique("classique");
echo "<br>".$f;*/

/*$g = $appliBD->insertMusique("oriental");
echo "<br>".$g;*/


/*$test = $appliBD->insertHoppy("Danse"); 
if  ($test!= null) {
    echo "true";
 }else { 
    echo "false";
 }*/

// insérer quelque information dans le tableau personne
 /*$h = insertPersonne("Claire","Pivon", "1975,05,05" ,"http://www.vaincre-sa-timidite.fr/wp-content/uploads/2015/10/test-personne-timide.jpg","mariée");
 echo "<br>".$h;*/

//stocker tous les hobby dans un variable
 /*echo "<p>Hobbies </p><br>";
 echo"<ul>";
 $hobbies =$appliBD->selectAllHobbies();
 echo "<br>Hobby:<br>";
 foreach ($hobbies as $hoppy){
     echo "<li>".$hoppy->Type."</li>";
 }
 echo "</ul>";*/

//stocker tous les musique dans un variable(Ex:9)

/*
 echo "<p> Musique: </p><br>";
 echo"<ul>";
 $musique =$appliBD->selectAllMusiques();
 foreach ($musique as $m){
     echo '<input Type ="checkbox">'.$m->Type.'</input>';
     echo "<br>";
 }*/

//appeler notre function (EX:10)
 /*$personne = $appliBD->SelectPersonneById(1);
$personne->Nom ;*/

/*appeler notre function (EX:11)
$personnes =$appliBD-> SelectPersonneByNomPrenomLike("cam");*/

//appeler function getPersonnHobby

/*$hobbies = getPersonnHobby(2);
foreach ($hobbies as $hobby) {
    echo $hobby->Type . '<br>';
}*/

/*$musiques = getPersonnMusique(1);
foreach ($musiques as $musique) {
    echo $musique->Type . '<br>';
}*/

$relations = $appliBD->getRelationPersonne(1);
foreach ($relations as $relation) {
    echo $relation->Type . '<br>';
}

?>