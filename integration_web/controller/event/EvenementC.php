<?php
include_once  '../../model/event/Evenement.php';
include_once '../../config.php';


class EvenementC{


    function listEvenement(){
        $sql="SELECT * FROM Evenement";
        $db=config::getConnection();
        try{
            $liste=$db->query($sql);
            return $liste;
        }catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        
            }
    function deleteEvenement ($IdEvenement){
        $sql="DELETE FROM Evenement WHERE IdEvenement =:IdEvenement";
$db=config::getConnection();
$req = $db->prepare($sql);
$req->bindValue(':IdEvenement', $IdEvenement);

try {
    $req->execute();
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}

    }
    function addEvenement($Evenement){
        $sql="INSERT INTO Evenement (nom,Content,user,time,image_data,image_type,adresse,prix) VALUES (:nom,:Content,:user,:time,:imageData,:imageType,:adresse,:prix)";
        $db=config::getConnection();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $Evenement->getnom(),
                'Content' => $Evenement->getContent(),
                'user' => $Evenement->getUser(),
                'time' => $Evenement->getTime(),
                'imageData' => $Evenement->getImageData(),
                'imageType' => $Evenement->getImageType(),
                'adresse' => $Evenement->getAdresse(),
                'prix' => $Evenement->getPrix()
            ]);
        }catch(Exception $e){
            echo "error=:".$e->getMessage();
        }
    }
     function updateEvenement($Evenement,$IdEvenement){
        try {
            $sql = "UPDATE Evenement SET nom=:nom,Content=:Content,user=:user,time=:time,image_data=:imageData,image_type=:imageType,adresse=:adresse,prix=:prix WHERE IdEvenement=:IdEvenement";
            $db = config::getConnection();
            $query = $db->prepare($sql);
            $query->execute([
                'IdEvenement' => $IdEvenement,
                'nom' => $Evenement->getnom(),
                'Content' => $Evenement->getContent(),
                'user' => $Evenement->getUser(),
                'time' => $Evenement->getTime(),
                'imageData' => $Evenement->getImageData(),
                'imageType' => $Evenement->getImageType(),
                'adresse' => $Evenement->getAdresse(),
                'prix' => $Evenement->getPrix()
            ]);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
        
        function recupererEvenement($IdEvenement){
            $sql="SELECT * from Evenement where IdEvenement=$IdEvenement";
            $db = config::getConnection();
        try{
            $query = $db->prepare($sql);
        $query->execute();
        $Evenement = $query->fetch();
        return $Evenement;
        }catch (Exception $e){
            $e->getMessage();}
        }
         }



?>