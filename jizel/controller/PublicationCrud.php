<?php

include_once '../config.php';
include_once '../model/Publication.php';



class PublicationCrud 
{ public function getEventStatistics()
   {
       $sql = "SELECT nom, COUNT(*) AS count FROM publication GROUP BY nom";
       $db = config::getConnection(); // Assurez-vous que config::getConnexion() est correctement appelé
       try {
           $stmt = $db->query($sql);
           $statistics = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $publicationStatistics = [];
           foreach ($statistics as $stat) {
               $publicationStatistics[$stat['nom']] = $stat['count'];
           }
           return $publicationStatistics;
       } catch (Exception $e) {
           die('Error:' . $e->getMessage());
       }
   }
   public function creer($publication){
      $db = config::getConnection();
      try {
          $req = $db->prepare('INSERT INTO `publication` (`id`, `publication`, `date`, `etat`, `nom`, `image`) VALUES (NULL, :publication, :date, :etat, :nom, :image)');
          $now = new DateTime(); 
          $formattedDateTime = $now->format('Y-m-d H:i:s'); 
  
          $req->execute([
              'publication' => $publication->getPublication(),
              'etat' => "0",
              'date' => $formattedDateTime,
              'nom' => $publication->getNom(),
              'image' => $publication->getImage(), // Supposons que getImage() renvoie le chemin de l'image
          ]);
      } catch (PDOException $e) {
          // Gérer les erreurs ici
          echo "Erreur : " . $e->getMessage();
      }
  }
  
     
       public function AffichertoutR(){
         $db = config::getConnection();
             try{
             //  sélectionner toutes l/c de la table
             $req = $db->prepare('SELECT * FROM `publication`');
             $req->execute(); //La requête préparée est exécutée
             $result = $req->fetchAll(PDO::FETCH_ASSOC); //récupère toutes les lignes de résultat de la requête préparée.
             return $result;
                }
             catch(Exception $e){
             die('Error :'.$e->getMessage());
                                }
                                      }
        
        public function afficher1R($id){
           $db = config::getConnection();
               try{
                 //sélectionner une réclamation par son ID
               $req = $db->prepare('SELECT * FROM `publication` WHERE `id` = :id');
               $req->execute([ 'id' => $id, ]);
               $result = $req->fetch(PDO::FETCH_ASSOC);
               return $result;
                }
               catch(Exception $e){
               die('Error :'.$e->getMessage());
                                   }
                                        }
  
                                        public function updatePublication($id, $newPublication, $newNom, $newImage)
                                        {
                                            $db = config::getConnection();
                                            try {
                                                // Get the current date and time
                                                $now = new DateTime();
                                                $formattedDateTime = $now->format('Y-m-d H:i:s');
                                    
                                                // Update the publication
                                                $updateQuery = 'UPDATE `publication` SET 
                                                    `publication` = :newPublication,
                                                    `date` = :date,
                                                    `nom` = :newNom,
                                                    `image` = :newImage
                                                    WHERE `id` = :id';
                                    
                                                $stmt = $db->prepare($updateQuery);
                                                $stmt->execute([
                                                    'newPublication' => $newPublication,
                                                    'date' => $formattedDateTime,
                                                    'newNom' => $newNom,
                                                    'newImage' => $newImage,
                                                    'id' => $id
                                                ]);
                                    
                                                // Check if any row was affected
                                                $rowCount = $stmt->rowCount();
                                    
                                                if ($rowCount > 0) {
                                                    return true; // Update successful
                                                } else {
                                                    return false; // No rows were affected, the publication with the given ID might not exist
                                                }
                                            } catch (PDOException $e) {
                                                // Handle errors here
                                                echo "Erreur : " . $e->getMessage();
                                                return false;
                                            }
                                        }
       public function delete($id) {
         $db = config::getConnection();
            try {
       
        $deleteCommentaires = $db->prepare('DELETE r FROM `commentaire` r INNER JOIN `publication` rec ON r.id_publication = rec.id WHERE rec.id = :id');
        $deleteCommentaires->execute(['id' => $id]);

       
        $deletePublication = $db->prepare('DELETE FROM `publication` WHERE `id` = :id');
        $deletePublication->execute(['id' => $id]);

               }
             catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();

                                       }
                                    }

                                    
  }
 
