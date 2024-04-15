<?php
include '../config.php';
include '../Model/paiement.php';

class paiementC
{
    public function listpaiement()
    {
        $sql = "SELECT * FROM paiement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletepaiement($id)
    {
        $sql = "DELETE FROM paiement WHERE idpaiement  = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addpaiement($paiement)
    {
        $sql = "INSERT INTO paiement  
        VALUES (:PrixTotal, :Cartetype,:CartNumber,:Datedexpiration,:Nom,:Cvc,null)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'PrixTotal' => $paiement->getPrixTotal(),
                'Cartetype' => $paiement->getCartetype(),
                'CartNumber' => $paiement->getCartNumber(),
                'Datedexpiration' => $paiement->getDatedexpiration()->format('Y/m/d'),
                'Nom' => $paiement->getNom(),
                'Cvc' => $paiement->getCvc()
               
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatepaiement($paiement, $idpaiement)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE paiement SET 
                    PrixTotal = :PrixTotal, 
                    Cartetype = :Cartetype, 
                    CartNumber = :CartNumber, 
                    Datedexpiration = :Datedexpiration,
                    Nom = :Nom,
                    Cvc = :Cvc
                   

                WHERE idpaiement= :idpaiement'
            );
            $query->execute([
               
                'PrixTotal' => $paiement->getPrixTotal(),
                'Cartetype' => $paiement->getCartetype(),
                'CartNumber' => $paiement->getCartNumber(),
                'Datedexpiration' => $paiement->getDatedexpiration()->format('Y/m/d'),
                'Nom' => $paiement->getNom(),
                'Cvc' => $paiement->getCvc(),
                'idpaiement' => $idpaiement
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showpaiement($id)
    {
        $sql = "SELECT * from paiement where idpaiement = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $paiement = $query->fetch();
            return $paiement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function searchpaiement($id,$Cartetype,$CartNumber)
    {
        $sql ="SELECT * from paiement where idpaiement like '%"+$id+"%' or Cartetype like '%"+$Cartetype+"%' or CartNumber like '%"+$CartNumber+"%'" ;
        $db = config::getConnexion();
        try {
            $lis = $db->query($sql);
            return $lis;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

}
?>
