<?php
include '../../config.php';
include '../../model/reservation/voyagee.php';

class voyageeC
{
    public function listvoyagee()
    {
        $sql = "SELECT * FROM voyagee";
        $db = config::getConnection();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletevoyagee($id)
    {
        $sql = "DELETE FROM voyagee WHERE idvoyage  = :id";
        $db = config::getConnection();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addvoyagee($voyagee)
    {
        $sql = "INSERT INTO voyagee 
        VALUES (:idvoyage,:description,:datedepart,:dateretour,:idclient,null)";
        $db = config::getConnection();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idvoyage' => $voyagee->getidvoyage(),
                'description' => $voyagee->getdescription(),
                'datedepart' => $voyagee->getdatedepart()->format('Y/m/d'),
                'dateretour' => $voyagee->getdateretour()->format('Y/m/d'),
                'idclient' =>$voyagee->getidclient()
               
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatevoyagee($voyagee, $idvoyage)
    {
        try {
            $db = config::getConnection();
            $query = $db->prepare(
                'UPDATE voyagee SET 
                    idvoyage = :idvoyage, 
                    description = :description, 
                    datedepart = :datedepart, 
                    dateretour = :dateretour,
                    idclient=idclient
                   

                WHERE idvoyage= :idvoyage'
            );
            $query->execute([
               
                'idvoyage' => $voyagee->getidvoyage(),
                'description' => $voyagee->getdescription(),
                'datedepart' => $voyagee->getdatedepart()->format('Y/m/d'),
                'dateretour' => $voyagee->getdateretour()->format('Y/m/d'),
                'idclient' =>$voyagee->getidclient(),
                'idvoyage' => $idvoyage
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showvoyagee($idvoyage)
    {
        $sql = "SELECT * from voyagee where idvoyage = $idvoyage";
        $db = config::getConnection();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $voyagee = $query->fetch();
            return $voyagee;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    }
?>
