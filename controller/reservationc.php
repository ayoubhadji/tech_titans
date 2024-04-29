<?php
include '../config.php';
include '../Model/reservation.php';

class reservationC

    { public function getreservationStatistics()
        {
            $sql = "SELECT destination, COUNT(*) AS count FROM reservation GROUP BY destination";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                $statistics = $liste->fetchAll(PDO::FETCH_ASSOC);
                $reservationStatistics = [];
                foreach ($statistics as $stat) {
                    $reservationStatistics[$stat['destination']] = $stat['count'];
                }
                return $reservationStatistics;
            } catch (Exception $e) {
                die('Error:' . $e->getMessage());
            }
        }
       /* function getReservationsSortedByDate()
        {
            $sql = "SELECT * FROM reservation ORDER BY dateres ASC";
            
            $db = config::getConnexion();
            
            try {
                // Exécution de la requête
                $liste = $db->query($sql);
                
                // Récupération des résultats sous forme de tableau associatif
                $reservations = $liste->fetchAll(PDO::FETCH_ASSOC);
                
                // Retourner les réservations triées par date de réservation
                return $reservations;
            } catch (Exception $e) {
                die('Error:' . $e->getMessage());
            }
        }
    }*/
        
    public function listreservation()
    {
        $sql = "SELECT * FROM reservation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletereservation($id)
    {
        $sql = "DELETE FROM reservation WHERE idclient  = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    /* function deletereservation($id) {
        $db = config::getConnexion();
           try {
      
       $deletevoyagee= $db->prepare('DELETE r FROM `voyagee` r INNER JOIN `reservation` rec ON r.idclient = rec.id WHERE rec.id = :id');
       $deletevoyagee->execute(['id' => $id]);

      
       $deletereservation = $db->prepare('DELETE FROM `reservation` WHERE `id` = :id');
       $deletereservation->execute(['id' => $id]);

              }
            catch (PDOException $e) {
       echo "Erreur : " . $e->getMessage();

                                      }
                                   }*/

    function addreservation($reservation)
    {
        $sql = "INSERT INTO reservation  
        VALUES (:idclient,:nbrp,:destination,:dateres,:prixt,null)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idclient' => $reservation->getidclient(),
                'nbrp' => $reservation->getnbrp(),
                'destination' => $reservation->getdestination(),
                'dateres' => $reservation->getdateres()->format('Y/m/d'),
                'prixt' => $reservation->getprixt()
               
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatereservation($reservation, $idclient)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reservation SET 
                    idclient = :idclient, 
                    nbrp = :nbrp, 
                    destination = :destination, 
                    dateres = :dateres,
                    prixt = :prixt
                   

                WHERE idclient= :idclient'
            );
            $query->execute([
               
                'idclient' => $reservation->getidclient(),
                'nbrp' => $reservation->getnbrp(),
                'destination' => $reservation->getdestination(),
                'dateres' => $reservation->getdateres()->format('Y/m/d'),
                'prixt' => $reservation->getprixt(),
                'idclient' => $idclient
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showreservation($idclient)
    {
        $sql = "SELECT * from reservation where idclient = $idclient";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reservation = $query->fetch();
            return $reservation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
?>
