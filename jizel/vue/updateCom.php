<?php
include_once '../config.php';
include_once '../controller/CommentaireCrud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission here
    $id = $_POST['id'];
    $newCommentaire = $_POST['commentaire'];

    $commentaireCrud = new CommentaireCrud();

    if ($commentaireCrud->updateCommentaire($id, $newCommentaire)) {
        echo "Comment updated successfully!";
    } else {
        echo "Failed to update comment.";
    }
} else {
    // Display an error or redirect as needed
    echo "Invalid request method.";
}
?>
