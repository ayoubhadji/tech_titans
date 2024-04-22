<?php 
include_once '../config.php';
include_once '../model/Reponse.php';
use PHPMailer\PHPMailer\PHPMailer;

class ReponseCrud {
  
 // Fonction pour creer une nouvelle reponse
 public function create($reponse) {
  $conn = config::getConnexion();
  $now = new DateTime(); 
  $formattedDateTime = $now->format('Y-m-d H:i:s');
  $stmt = $conn->prepare("INSERT INTO reponse (id_admin, id_reclamation, reponse, date) VALUES (:id_admin, :id_reclamation, :reponse, :date)");
  $stmt->bindParam(':id_admin', $reponse->getIdAdmin());
  $stmt->bindParam(':id_reclamation', $reponse->getIdReclamation());
  $stmt->bindParam(':reponse', $reponse->getReponse());
  $stmt->bindParam(':date', $formattedDateTime);
  $stmt->execute();
 }

 // Fonction pour recuperer une reponse par son ID
 public function getReponseByIdReclamation($id) {
  $conn = config::getConnexion();
  $stmt = $conn->prepare("SELECT * FROM reponse WHERE id_reclamation = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);

 }

 // Fonction pour supprimer une reponse
 public function deleteReponse($id) {
  $conn = config::getConnexion();
  $stmt = $conn->prepare("DELETE FROM reponse WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
 }
 // mailing function reponse 
/* function sendMailReponse($nom,$email,$reclamation,$reponse){



    require 'C:/xampp/php/ext/src/PHPMailer.php';  
    require 'C:/xampp/php/ext/src/SMTP.php';
    require 'C:/xampp/php/ext/src/Exception.php';
  
  
    
    // Creer une nouvelle instance de PHPMailer
    $mail = new PHPMailer(true);                            // true active les exceptions en cas d'erreur
    
    try {
        // Configuration du serveur SMTP
        $mail->SMTPDebug = 0;                                  // Activer le debogage SMTP (0 = desactive, 1 = messages de base, 2 = messages detailles)
        $mail->isSMTP();                                       // Utiliser SMTP
        $mail->Host = 'smtp.gmail.com';                        // Specifier le serveur SMTP
        $mail->SMTPAuth = true;                                // Activer l'authentification SMTP
        $mail->Username = 'mohamedaziz.loueti@esprit.tn';            // Nom d'utilisateur SMTP
        $mail->Password = 'cnbg rdqc lrgs rmvj';               // Mot de passe SMTP
        $mail->SMTPSecure ='TLS';                              // Activer le chiffrement TLS, `ssl` est egalement accepte
        $mail->Port =25;                                       // Port TCP pour se connecter
    
        // Destinataire et expediteur
        $mail->setFrom('mohamedaziz.loueti@esprit.tn','MediCoeur Support - Team');
        $mail->addAddress($email,$nom);                        // Ajouter un destinataire
    
        // Contenu de l'e-mail
        $mail->isHTML(true);                                   // Activer le format HTML
        $mail->SMTPDebug;
        $mail->Subject = 'Complaint Response';
  $mail->Body = '
  <!DOCTYPE html>
  <html>
  <head>
      <meta charset="UTF-8">
      <title>Response to your complaint</title>
      <style>
          body {
              font-family: "Arial", sans-serif;
              font-size: 16px;
              line-height: 1.6;
              color: #333333;
          }
          h2 {
              font-weight: bold;
              text-decoration: underline;
              color: #3498db;
          }
          strong {
              color: #e74c3c;
          }
          p {
              margin-bottom: 15px;
          }
          .email-container {
              max-width: 600px;
              margin: 0 auto;
          }
          .footer-logo {
              width: 80px;
              margin-top: 20px;
          }
      </style>
  </head>
  <body>
      <div class="email-container">
          <h2> Hello ' . $nom . ',</h2>
          <p> We have taken your complaint into account regarding: <strong>'.$reclamation.'</strong>.</p>
          <p> Here is our answer:</p>
          <p>'.$reponse.'</p>
          <p>Thank you for your understanding.</p>
          <p>Kind regards,<br>The Administration</p>
          <img src="https://i.ibb.co/hB9fBx1/376504141-224121517218350-4545070668865803371-n.png" alt="Logo" class="footer-logo">
  
      </div>
  </body>
  </html>
  ';
  
        $mail->AltBody = 'Contenu de votre e-mail en texte brut';
        $mail->send();
      } catch (Exception $e) {
    echo 'Echec de l\'envoi de l\'e-mail : ', $mail->ErrorInfo;
    }
  }
}
*/
}