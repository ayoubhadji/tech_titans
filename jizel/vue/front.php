<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styles CSS */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #ffffff; /* Fond blanc par défaut */
    color: #333;
}

header {
    background-color: #405de6; /* Couleur de l'en-tête */
    color: #ffffff;
    text-align: center;
    padding: 20px 0;
}

.navbar {
    background-color: #ff0000; /* Couleur de la barre de navigation */
}

.navbar-brand {
    color: white;
}

.navbar-toggler-icon {
    background-color: white;
}

.container-fluid {
    max-width: 800px; /* Réduire la largeur maximale */
    margin: 20px auto; /* Ajouter des marges pour centrer le contenu */
}

.card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px; /* Réduire la marge inférieure */
    transition: transform 0.3s ease-in-out;
}

.card:hover {
    transform: scale(1.02);
}

.card-body {
    padding: 20px;
}

/* Styles pour les publications */
.post {
    border: 1px solid #ddd;
    border-radius: 10px;
    margin-bottom: 10px; /* Réduire la marge inférieure */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: rgba(255, 255, 255, 0.8);
    padding: 10px;
}

.post-image {
    width: 100%; /* Utiliser toute la largeur disponible */
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    object-fit: cover;
}

.post-body-container {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #f9f9f9;
}

.post-title {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.post-body {
    font-size: 14px;
}

.post-footer {
    padding: 10px;
    background-color: rgba(249, 249, 249, 0.8);
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.comment-btn {
    font-size: 12px;
    padding: 5px 8px;
}

.comment-container {
    margin-top: 10px;
}

.comment {
    border: 1px solid #eee;
    border-radius: 5px;
    padding: 5px;
    margin-bottom: 5px;
    background-color: rgba(255, 255, 255, 0.8);
}

.comment p {
    margin-bottom: 0;
    font-size: 12px;
}

.form textarea {
    resize: none;
}

.form .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    font-size: 12px;
    padding: 5px 8px;
}

.form .btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.btn-danger,
.btn-warning,
.btn-success,
.comment-btn {
    font-size: 14px;
    padding: 8px 12px;
    background-color: #ff0000;
    color: white;
    border: none;
    margin-right: 10px;
}

/* Styles pour le mode sombre */
body.dark-mode {
    background-color: #212121;
    color: #fff;
}

body.dark-mode .post-title,
body.dark-mode .post-body,
body.dark-mode .comment p {
    color: #fff;
}

body.dark-mode .card {
    background-color: #333; /* Couleur de fond sombre pour les cartes */
}
</style>
</head>

<body>

    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light py-lg-2 py-2">
        <a class="navbar-brand ml-2" href="" data-abc="true" style="color: white; font-size: 24px; display: flex; align-items: center;">
            <img src="logo.png" alt="Explore Beyond" height="50" style="margin-right: 10px;">
            <span style="color: white;">Explore Beyond</span>
        </a>
        <!-- Liens de navigation -->
        <a class="nav-link ml-auto" href="top_offres.php" style="color: white;">Top Offres</a>
        <a class="nav-link ml-auto" href="articles.php" style="color: white;">Articles ODD</a>

        <div class="ml-auto">
            <!-- Bouton pour basculer le mode sombre -->
            <input type="checkbox" id="darkModeToggle" onclick="toggleDarkMode()">
            <label for="darkModeToggle">Dark Mode</label>
            <!-- Contrôle de la luminosité -->
            <input type="range" min="0" max="200" value="100" class="slider" id="brightnessSlider" oninput="adjustBrightness(this.value)">
        </div>
        <div class="end">
            <div class="collapse navbar-collapse" id="navbarColor02"></div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container-fluid">
    <?php
// Inclure les fichiers requis
require_once '../controller/PublicationCrud.php';
require_once '../model/Publication.php';
require_once '../controller/CommentaireCrud.php';
require_once '../model/Commentaire.php';

// Instancier la classe de manipulation des publications
$rc = new PublicationCrud();

// Récupérer les données des publications
$list = $rc->AffichertoutR();

// Inverser l'ordre des publications si nécessaire
$list = array_reverse($list);

// Instancier la classe de manipulation des commentaires
$rp = new CommentaireCrud();
?>

        <?php foreach ($list as $p) { ?>
            <?php
            $commentaires = $rp->getCommentaireByIdPublication($p['id']);
            ?>
            <div class="card">
                <div class="card-body">
                    <img src="<?= 'uploads/' . basename($p['image']); ?>" alt="Image de la publication" class="post-image" width="200" height="400">
                    <div class="post-title"><?= $p['nom']; ?></div>
                    <div class="post-body-container">
                        <div class="post-body"><?= $p['publication']; ?></div>
                        <div class="post-price"> <?= $p['prix']; ?> DT</div>
            <div class="post-hotel">Hôtel: <?= $p['hotel']; ?></div>
                    </div>
                    <div class="post-footer">
                        <button class="btn btn-sm btn-outline-secondary badge" type="button" onclick="toggleComments('comment-container-<?= $p['id']; ?>')">Commentaire</button>
                        <div id="comment-container-<?= $p['id']; ?>" style="display: none; margin-top: 10px;">
                            <?php foreach ($commentaires as $commentaire) { ?>
                                <?php
                                // Liste des mots à filtrer
                                $motsInterdits = array("mot1", "mot2", "mot3");

                                // Filtrer les mots interdits
                                foreach ($motsInterdits as $mot) {
                                    $commentaire['commentaire'] = str_ireplace($mot, str_repeat('*', strlen($mot)), $commentaire['commentaire']);
                                }
                                ?>
                                <div class="comment" id="comment-<?= $commentaire['id']; ?>" style="margin-bottom: 10px;">
                                    <p id="comment-text-<?= $commentaire['id']; ?>" style="text-align: left;">
                                        <?= $commentaire['commentaire']; ?>
                                    </p>
                                    <div class="comment-buttons">
                                        <br> <hr>
                                        <button class="btn btn-sm btn-danger" onclick="deleteComment(<?= $commentaire['id']; ?>, <?= $p['id']; ?>)">Delete</button>
                                        <button class="btn btn-sm btn-warning" onclick="toggleUpdateInput(<?= $commentaire['id']; ?>)">Update</button>
                                        <button class="btn btn-sm btn-success" onclick="updateComment(<?= $commentaire['id']; ?>, <?= $p['id']; ?>)">Save</button>
                                    </div>
                                    <input type="text" id="update-comment-input-<?= $commentaire['id']; ?>" class="update-input form-control" style="display: none;" placeholder="Modifier le commentaire" />
                                </div>
                            <?php } ?>
                            <div class="form mt-3">
                                <textarea class="form-control" name="commentaire" id="commentaire-<?= $p['id']; ?>" rows="3" placeholder="Ajouter un commentaire" required></textarea>
                                <input type="hidden" name="publication_id" value="<?= $p['id']; ?>">
                                <button type="button" class="btn btn-primary comment-btn mt-2" onclick="submitComment(<?= $p['id']; ?>)">Publier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- JavaScript et jQuery -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fonction pour basculer l'affichage des commentaires
        function toggleComments(commentContainerId) {
            var commentContainer = document.getElementById(commentContainerId);
            commentContainer.style.display = commentContainer.style.display === "none" ? "block" : "none";
        }

        // Fonction pour soumettre un commentaire
        function submitComment(publicationId) {
            // Récupérer les données du formulaire
            var xhr = new XMLHttpRequest();
            var commentaire = document.getElementById("commentaire-" + publicationId).value;

            // Envoyer la requête AJAX pour ajouter le commentaire
            xhr.open("POST", "repondre.php?id=" + publicationId, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Traiter la réponse si nécessaire (par exemple, actualiser la liste des commentaires)
                    // Vous pouvez ajouter ici une logique pour mettre à jour la liste des commentaires sans recharger la page.
                    var commentContainer = document.getElementById("comment-container-" + publicationId);
                    commentContainer.innerHTML = xhr.responseText;
                }
            };
            xhr.send("commentaire=" + encodeURIComponent(commentaire));
        }

        // Fonction pour supprimer un commentaire
        function deleteComment(commentId, publicationId) {
            // Envoyer la requête AJAX pour supprimer le commentaire
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "supprimer_commentaire.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Actualiser la liste des commentaires après la suppression
                    var commentContainer = document.getElementById("comment-container-" + publicationId);
                    commentContainer.innerHTML = xhr.responseText;
                }
            };
            xhr.send("comment_id=" + commentId + "&publication_id=" + publicationId);
        }
    </script>

    <!-- Ajout du mode sombre et contrôle de la luminosité -->
    <script>
        // Fonction pour basculer le mode sombre
        function toggleDarkMode() {
            var body = document.querySelector("body");
            body.classList.toggle("dark-mode");
        }

        // Fonction pour ajuster la luminosité
        function adjustBrightness(value) {
            var body = document.querySelector("body");
            body.style.filter = "brightness(" + value + "%)";
        }
    </script>

</body>

</html>
