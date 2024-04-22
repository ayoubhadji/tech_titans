<?php
require_once '../controller/PublicationCrud.php';
require_once '../model/Publication.php';

$rc = new PublicationCrud();

if (isset($_POST['name']) && isset($_POST['message']) && isset($_FILES['image'])) {
    $name = $_POST['name'];
    $message = $_POST['message'];

    $targetDirectory = __DIR__ . '/uploads/';
    $targetFile = $targetDirectory . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Créez le répertoire s'il n'existe pas
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    // Vérifiez si le fichier est une image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        echo "Le fichier n'est pas une image.";
        exit();
    }

    // Vérifiez la taille de l'image (exemple : 5 Mo)
    if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
        echo "Désolé, le fichier est trop volumineux.";
        exit();
    }

    // Vérifiez les formats autorisés (ajoutez ou supprimez des formats selon vos besoins)
    $allowedFormats = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        exit();
    }

    // Vérifiez si le fichier existe déjà, renommez-le le cas échéant
    $counter = 1;
    while (file_exists($targetFile)) {
        $targetFile = $targetDirectory . pathinfo($targetFile, PATHINFO_FILENAME) . '_' . $counter . '.' . $imageFileType;
        $counter++;
    }

    // Déplacez le fichier téléchargé vers le répertoire de destination
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        // Le téléchargement de l'image a réussi, maintenant vous pouvez créer la publication
        $imagePath = $targetFile;
        $publication = new Publication($message,0, $name, $imagePath);
        $rc->creer($publication);

        // Redirigez l'utilisateur après le téléchargement et la création de la publication
        header("Location: Forum_pub.php");
        exit();
    } else {
        echo "Désolé, une erreur s'est produite lors du téléchargement de l'image.";
        exit();
    }
} else {
    echo "Tous les champs du formulaire doivent être renseignés.";
    exit();
}
?>
