<?php 

include_once '../../config.php';
include_once '../../model/reclamation/Reclamation.php';
require 'C:/xampp/htdocs/vendor/autoload.php';
require 'C:/xampp/htdocs/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
class ReclamationCrud{
       //function badword :
       function filterComment($comment) {
        $badWords = array('badword', 'zeyda', 'test','tit');
        $words = explode(' ', $comment);
        foreach ($words as &$word) {
        $word = preg_replace('/[^a-zA-Z0-9]/', '', $word);
        $found = false;
        foreach ($badWords as $badWord) {
        $similarity = 0;
        similar_text(strtolower($word), strtolower($badWord), $similarity);
        if ($similarity >= 80) {
        $found = true;
        break;
         }}
        if ($found) {
        $censoredWord = '';
        for ($i = 0; $i < strlen($word); $i++) {
        if (ctype_upper($word[$i])) {
        $censoredWord .= '*';
        } else {
        $censoredWord .= '*';
        }}
        $word = $censoredWord;
        }}
        return implode(' ', $words); }
       //function statis category claim :
        public function getEventStatistics() {
        $sql = "SELECT category , COUNT(*) AS count FROM reclamation GROUP BY category";
        $db = config::getConnection();
        try {
        $stmt = $db->query($sql);
        $statistics = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $reclamationStatistics = [];
        foreach ($statistics as $stat) {
        $reclamationStatistics[$stat['category']] = $stat['count'];
        }
        return $reclamationStatistics;
        } catch (Exception $e) {
        die('Error:' . $e->getMessage());
        } 
      }
        
       //function create claim :
       public function create($reclamation){
        $db = config::getConnection();
        try {
        $req = $db->prepare('INSERT INTO `reclamation` (`id`, `reclamation`, `date`, `etat`, `nom`, `email`, `tel`, `category`) 
        VALUES (NULL, :reclamation, :date, :etat, :nom, :email, :tel, :category)');
        $now = new DateTime(); 
        $formattedDateTime = $now->format('Y-m-d H:i:s');
        $newmessage = ($this->filterComment($reclamation->getReclamation()));
        $req->execute([
                'reclamation' => $newmessage,
                'etat' => "0",
                'date' => $formattedDateTime,
                'nom' => $reclamation->getNom(),
                'email' => $reclamation->getEmail(),
                'tel' => $reclamation->getTel(),
                'category' => $reclamation->getCategory(), 
        ]);
        } catch(Exception $e) {
        die('Error :'.$e->getMessage());
        }}
      // function affiche tous reclamation :
      public function readAll(){
        $db = config::getConnection();
        try{
        $req = $db->prepare('SELECT * FROM `reclamation`');
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        }catch(Exception $e){
        die('Error :'.$e->getMessage());
        }}
      //function affiche une seule reclamation :
      public function readOne($id){
        $db = config::getConnection();
        try{
        $req = $db->prepare('SELECT * FROM `reclamation` WHERE `id` = :id');
        $req->execute([  'id' => $id, ]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;
        }catch(Exception $e){
        die('Error :'.$e->getMessage());
        }}
      //function for actions column etat=1 resolu : 
      public function activate($id){
        $db = config::getConnection();
        try{
        $req = $db->prepare('UPDATE `reclamation` SET `etat` = 1 WHERE `id` = :id');
        $req->execute([ 'id' => $id, ]);
        }catch(Exception $e){
        die('Error :'.$e->getMessage()); }}
      //function for actions column etat=0  non resolu : 
      public function deactivate($id){
        $db = config::getConnection();
        print_r("test");
        try{
        $req = $db->prepare('UPDATE `reclamation` SET `etat` = 0 WHERE `id` = :id');
        $req->execute([ 'id' => $id, ]);
        }catch(Exception $e){
        die('Error :'.$e->getMessage());}}
      // function delete reclamation with reponse :
      public function delete($id) {
        $db = config::getConnection();
        try {
        // Supprimer les réponses liées à la réclamation
        $deleteReponses = $db->prepare('DELETE r FROM `reponse` r INNER JOIN `reclamation` rec ON r.id_reclamation = rec.id WHERE rec.id = :id');
        $deleteReponses->execute(['id' => $id]);
        // Supprimer la réclamation
        $deleteReclamation = $db->prepare('DELETE FROM `reclamation` WHERE `id` = :id');
        $deleteReclamation->execute(['id' => $id]);
        } catch (PDOException $e) {
        // Gérer les erreurs ici
        echo "Erreur : " . $e->getMessage(); }}
// mailing function claim :
function sendMailReclamation($nom,$email,$reclamation){
     // Include the Composer autoloader
    //require 'C:/xampp/php/ext/src/Exception.php';
    //require 'C:/xampp/php/ext/src/PHPMailer.php';
   // require 'C:/xampp/php/ext/src/SMTP.php';

  
  // Créer une nouvelle instance de PHPMailer
  $mail = new PHPMailer(true);                            // true active les exceptions en cas d'erreur
  
  try {
      // Configuration du serveur SMTP
      $mail->SMTPDebug = 0;                                  // Activer le débogage SMTP (0 = désactivé, 1 = messages de base, 2 = messages détaillés)
      $mail->isSMTP();                                       // Utiliser SMTP
      $mail->Host = 'smtp.gmail.com';                        // Spécifier le serveur SMTP
      $mail->SMTPAuth = true;                                // Activer l'authentification SMTP
      $mail->Username = 'mohamedaziz.loueti@esprit.tn';            // Nom d'utilisateur SMTP
      $mail->Password = 'cnbg rdqc lrgs rmvj';               // Mot de passe SMTP
      $mail->SMTPSecure ='TLS';                              // Activer le chiffrement TLS, `ssl` est également accepté
      $mail->Port =25;                                       // Port TCP pour se connecter

      // Destinataire et expéditeur
      $mail->setFrom('mohamedaziz.loueti@esprit.tn','Explore beyond - Team');
      $mail->addAddress($email,$nom);                        // Ajouter un destinataire
  
      // Contenu de l'e-mail
      $mail->isHTML(true);                                   // Activer le format HTML
      $mail->SMTPDebug;
      $mail->Subject = 'Claim Confirmation';
      $mail->Body = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Complaint Received</title>
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
    </style>
</head>
<body>
    <div class="email-container">
        <h2> Hello ' . $nom . ',</h2>
        <hr>
        <br>
        <p> We have received your complaint regarding : <strong style="overflow: auto; max-height: 100px; display: block;">' . $reclamation. '</strong>.</p>
        <hr>
        <p> Our team strives to process all complaints as quickly as possible. We thank you for your patience.</p>
        <p> Kind regards, <br> MediCoeur - Support Team</p>
        <img src="https://i.ibb.co/hB9fBx1/376504141-224121517218350-4545070668865803371-n.png" alt="Logo" style="width:200px; margin-right: 10px;">

    </div>
</body>
</html>
';

      $mail->AltBody = 'Contenu de votre e-mail en texte brut';
      $mail->send();
      }catch (Exception $e) {
  echo 'Echec de l\'envoi de l\'e-mail : ', $mail->ErrorInfo;
  }
}}
 
