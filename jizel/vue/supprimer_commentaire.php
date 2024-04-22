<?php

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (isset($_POST['comment_id']) && isset($_POST['publication_id'])) {
    $commentId = $_POST['comment_id'];
    $publicationId = $_POST['publication_id'];
    require_once '../controller/CommentaireCrud.php';
    $commentaireCrud = new CommentaireCrud();
    $commentaireCrud->supprimerCommentaire($commentId);
    $commentaires = $commentaireCrud->getCommentaireByIdPublication($publicationId);
    foreach ($commentaires as $commentaire) {
        ?>
        <div class="comment">
            <p><?= $commentaire['commentaire']; ?></p>
            <button class="btn btn-sm btn-danger" onclick="deleteComment(<?= $commentaire['id']; ?>, <?= $publicationId; ?>)">Supprimer</button>
        </div>
        <?php
    }
}
?>
