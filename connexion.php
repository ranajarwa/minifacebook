<?php
///DEclaration de la class
class Connexion {
    private $connexion;

    public function __construct() {
        $param_hote="localhost";
        $param_port="3306";
        $param_nom_bd="minifacebook";
        $param_utilisateur="adminMiniFacebook";
        $param_mot_passe="minifacebook";

        // pour tester s'il y a des fautes
        try {
            $this->connexion = new PDO (
             'mysql:host='.$param_hote. // nom de chemin de mon base de données, si on ne utilise pas my-sql on mit un autre mots place my_sql
             ';dbname='.$param_nom_bd,$param_utilisateur,$param_mot_passe);
        } catch (Exception $e){
            echo "Erreur:" .$e->getMessage().'<br/>';
            echo 'N°: ' .$e->getCode();
        }   
    }

    // function pour insérer les types de hobby//
    public function insertHobby($hobby){
        try{
            $requete_prepare = $this->connexion->prepare("INSERT INTO Hoppy (Type) values (:hobby)"); 
            $requete_prepare->execute(array("hobby"=>$hobby));
        }catch (Exception $bb){
            echo "Erreur:" .$bb->getMessage().'<br/>';
            echo 'N°: ' .$bb->getCode();
            return false;
        }
        return true;
    }
    
    // function pour insérer les types de musique
    function insertMusique($style){
        try{
            $requete_prepare = $this->connexion->prepare("INSERT INTO Musique (Type) values (:musique)"); 
            $requete_prepare->execute(array("musique"=>$style));
        }catch (Exception $cc){
            echo "Erreur:" .$cc->getMessage().'<br/>';
            echo 'N°: ' .$cc->getCode();
            return false;
        }
        return true;
    }

    // function pour insérer les information dans le tableau personne
    function insertPersonne ($prenom, $nom, $date_de_nassaince, $Url_photo, $status){
        $requete_prepare = $this->connexion->prepare
            ("INSERT INTO personne
                        (Nom, 
                        Prenom,
                        Date_De_Naissance,
                        Url_Photo,
                        Status_couple) 
        values(:Nom,
                :Prenom,
                :Date_De_Naissance,
                :Url_Photo, 
                :Status_couple)");
        $requete_prepare->execute(array(
            "Nom"=>$nom,
            "Prenom"=>$prenom,
            "Date_De_Naissance"=>$date_de_nassaince,
            "Url_photo"=>$Url_photo,
            "Status_couple"=>$status));

        return true;
    }

    //function pour select tous les hobbies
    function selectAllHobbies(){
        $requete_prepare=$this->connexion->prepare(
            "SELECT *
            FROM Hoppy");
        $requete_prepare->execute();
        $resultat=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $resultat;
    }

    //function pour select tous les musiques(ex9)
    function selectAllMusiques(){
        $requete_prepare=$this->connexion->prepare(
            "SELECT * 
            FROM Musique");
        $requete_prepare->execute();
        $resultatmusique=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $resultatmusique;
    }

    //function pour select  les personne 10
    function SelectPersonneById($id){
        $requete_prepare=$this->connexion->prepare(
            "SELECT * 
            FROM personne 
            WHERE Id =$id");
        $requete_prepare->execute(array("id"=>$id));
        $resultat=$requete_prepare->fetch(PDO::FETCH_OBJ);
        return $resultat;
    }

    //function (11)
    function SelectPersonneByNomPrenomLike($pattern){
        $requete_prepare=$this->connexion->prepare(
            "SELECT * 
            FROM Personne 
            WHERE Nom LIKE :nom 
            OR Prenom LIKE :prenom");
        $requete_prepare->execute(array("nom"=>"%$pattern%",
                                        "prenom"=>"%prenom%" ));
        $resultat=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $resultat;
    }

    //function prend liste de hobby d'une personne
    function getPersonnHobby($id_personne){
        $requete_prepare=$this->connexion->prepare(
            "SELECT Type 
            FROM RelationHobby 
            INNER JOIN Hoppy 
            ON Hoppy_Id = Id
            WHERE Personne_Id = :id");
        $requete_prepare->execute(array("id"=>$id_personne));
        $hobbies = $requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $hobbies;
    }

    //function prend liste de musique d'une personne
    function getPersonnMusique($id_personne){
        $requete_prepare=$this->connexion->prepare(
            "SELECT Type 
            FROM RelationMusique 
            INNER JOIN Musique 
            ON Musique_Id = Id 
            WHERE Personne_Id = :id");
        $requete_prepare->execute(array("id"=>$id_personne));
        $musique = $requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $musique;
    }


    //function prend liste de musique d'une personne
    function getRelationPersonne($id_personne){
        $requete_prepare=$this->connexion->prepare(
            "SELECT Type FROM RelationPersonne 
            INNER JOIN personne
            ON Personne_Id = Id 
            WHERE Personne_Id = :id");
        $requete_prepare->execute(array("id"=>$id_personne));
        $relation = $requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $relation;
    }
    function selectAllPersonne(){
        
        $requete_prepare=$this->connexion->prepare(
            "SELECT * FROM personne" );
        
        $requete_prepare->execute();
        
        $allPersonne= $requete_prepare->fetchAll(PDO :: FETCH_OBJ);

        return $allPersonne;

    } 

}

// SI C'EST UN TABLEAU JE FAIS FOREACH POUR RECUPERER LES ELEMENTS
// SI C'EST UN STRING OU INTEGER JE FAIS ECHO POUR RECUPERER LES ELEMENT


// Selecter toute les personne pour afficher dans recherch

?>
