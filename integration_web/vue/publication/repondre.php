<?php

require_once '../../model/publication/Commentaire.php';
require_once '../../model/publication/Publication.php';
require_once '../../controller/publication/PublicationCrud.php';
require_once '../../controller/publication/CommentaireCrud.php';

// Créer des instances des classes utilisées pour effectuer des opérations CRUD
$rc = new PublicationCrud();
$cc = new CommentaireCrud();

// Vérifier si les données du formulaire de commentaire sont envoyées et si l'identifiant de la publication est défini
if(isset($_POST['commentaire']) && isset($_GET['id'])) {
    $txt = $_POST['commentaire'];
    $id_publication = $_GET['id'];
    $id_admin = 1; // Supposons que vous ayez un moyen d'obtenir l'ID de l'administrateur

    // Vérification du contenu du commentaire pour détecter le spam ou les mots interdits
    $motsInterdits = array("mot1", "mot2", "mot3");
    $contientMotsInterdits = false;
    foreach ($motsInterdits as $mot) {
        if (stripos($txt, $mot) !== false) {
            $contientMotsInterdits = true;
            break;
        }
    }

    if ($contientMotsInterdits) {
        echo "Le commentaire contient des mots interdits.";
    } else {
        // Créer un nouvel objet Commentaire
        $commentaire = new Commentaire($txt, new DateTime(), 0, $id_admin, $id_publication);

        // Ajouter le commentaire à la base de données
        $cc->creer($commentaire);

        // Rediriger l'utilisateur vers la page de publication
        header("Location:front.php");//envoie une entête HTTP pour rediriger l'utilisateur vers la page PUB.php après l'exécution du script
        exit();
    }
}
?>
