<?php
include '../../model/event/Avis.php';
include_once '../../config.php';

class AvisC{


    function listAvis($IdEvenement){
        $sql="SELECT * FROM Avis  join Evenement on Avis.IdEvenement=Evenement.IdEvenement where Avis.IdEvenement=$IdEvenement ";
        $db=config::getConnection();
        try{
            $liste=$db->query($sql);
            return $liste;
        }catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        
            }
    function deleteAvis ($IdAvis){
        $sql="DELETE FROM Avis WHERE IdAvis =:IdAvis";
$db=config::getConnection();
$req = $db->prepare($sql);
$req->bindValue(':IdAvis', $IdAvis);

try {
    $req->execute();
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}

    }
    function addAvis($Avis){
        $sql="INSERT INTO Avis (user,avis,time,IdEvenement)VALUES(:user,:avis,:time,:IdEvenement)";
        $db=config::getConnection();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'avis' => $Avis->getavis(),
                'user' => $Avis->getUser(),
                'time' => $Avis->getTime(),
                'IdEvenement' => $Avis->getIdEvenement()
                
            ]);
        
        }catch(Exception $e){
            echo "error=:".$e->getMessage();
        
        
        }
        }
        function updateAvis($Avis,$IdAvis){
            try{
         
           
             $sql="UPDATE Avis SET user=:user,avis=:avis,time=:time,IdEvenement=:IdEvenement  where IdAvis=:IdAvis";
         
             $db=config::getConnection(); 
             $query = $db->prepare($sql);
             $query->execute([
                'IdAvis'=> $IdAvis,
                'avis' => $Avis->getavis(),
                'user' => $Avis->getUser(),
                'time' => $Avis->getTime(),
                'IdEvenement' => $Avis->getIdEvenement()
             ]);
         
         }catch(Exception $e){
             echo "error=:".$e->getMessage();
         }
         }
         
         
      
        
        function recupererAvis($IdAvis){
            $sql="SELECT * from Avis where IdAvis=$IdAvis";
            $db = config::getConnection();
        try{
            $query = $db->prepare($sql);
        $query->execute();
        $Avis = $query->fetch();
        return $Avis;
        }catch (Exception $e){
            $e->getMessage();}
        }
         
         function CountAvis($IdEvenement){
            $sql="SELECT count(IdAvis) FROM Avis  join Evenement on Avis.IdEvenement=Evenement.IdEvenement where Avis.IdEvenement=$IdEvenement ";
            $db = config::getConnection();
        try{
            $query = $db->prepare($sql);
        $query->execute();
        $nb = $query->fetchColumn();
        return $nb;
        }catch (Exception $e){
            $e->getMessage();}
        }
         
    }


?>