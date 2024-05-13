<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentaire = $_POST["commentaire"];

    // Liste des mots à filtrer
    $motsInterdits = array("mot1", "mot2", "mot3");

    // Vérifier si le commentaire contient des mots interdits
    $contientMotsInterdits = false;
    foreach ($motsInterdits as $mot) {
        if (stripos($commentaire, $mot) !== false) {
            $contientMotsInterdits = true;
            break;
        }
    }

    // Si le commentaire contient des mots interdits, afficher un message d'erreur
    if ($contientMotsInterdits) {
        echo "Le commentaire contient des mots interdits.";
    } else {
        // Si le commentaire ne contient pas de mots interdits, l'ajouter à la base de données
        // Votre code d'ajout de commentaire ici...
        // Par exemple, vous pouvez appeler votre méthode de création de commentaire
        // $crud = new CommentaireCrud();
        // $crud->creer($commentaire);
        echo "Commentaire ajouté avec succès : " . $commentaire;
    }
}
?>

