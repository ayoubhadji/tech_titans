<?php
include "C:/xampp/htdocs/projetvoyage/controller/userc.php"; 
$userc = new userc();
$list = $userc->listuser()->fetchAll(); // Fetch all rows

// Pagination variables
$itemsPerPage = 5; // Number of items per page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page, default is 1
$totalItems = count($list); // Total number of items
$totalPages = ceil($totalItems / $itemsPerPage); // Total number of pages

// Get current page's items
$offset = ($currentPage - 1) * $itemsPerPage;
$currentPageItems = array_slice($list, $offset, $itemsPerPage);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <style>
    body {
        font-family: Arial, sans-serif; /* Utilisation d'une police de caractères générique */
        background-color: #ff5f5f; /* Red background color */
        color: white; /* Text color */
        margin: 0;
        padding: 0;
    }

    h1, h2 {
        text-align: center; /* Centrer les titres */
    }

    h1 {
        margin-top: 20px; /* Add margin to the top */
    }

    h2 {
        margin-bottom: 20px; /* Add margin to the bottom */
    }

    table {
        border-collapse: collapse; /* Fusionner les bordures des cellules */
        width: 70%; /* Largeur du tableau */
        margin: 20px auto; /* Centrer le tableau horizontalement */
        background-color: black; /* Black background color */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow for a card-like effect */
    }

    th, td {
        border: 1px solid #dddddd; /* Bordure des cellules */
        text-align: left; /* Alignement du texte à gauche dans les cellules */
        padding: 10px; /* Espacement du contenu à l'intérieur des cellules */
        color: white; /* Text color */
    }

    th {
        background-color: #333; /* Couleur de fond pour la ligne d'en-tête */
    }

    tr:nth-child(even) {
        background-color: #222; /* Couleur de fond pour les lignes paires */
    }

    a {
        text-decoration: none; /* Supprimer le soulignement par défaut des liens */
        color: #007bff; /* Blue link color */
    }

    a:hover {
        color: #0056b3; /* Darker blue on hover */
    }

    input[type="submit"] {
        background-color: #dc3545; /* Red button color */
        color: white; /* Text color */
        border: none; /* Supprimer la bordure */
        padding: 8px 12px; /* Espacement du contenu à l'intérieur des boutons */
        cursor: pointer; /* Définir le curseur en pointeur au survol */
        transition: background-color 0.3s; /* Smooth transition */
    }

    input[type="submit"]:hover {
        background-color: #c82333; /* Darker red on hover */
    }

    .pagination {
        margin-top: 20px; /* Add margin to the top of the pagination */
    }

    .page-item {
        margin: 0 10px; /* Add margin between pagination items */
    }
</style>

</head>
<body>
    <center>
        <h1>Liste des utilisateurs</h1>
        <h2>
            <a href="register.php">Ajouter des utilisateurs</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>ID</th>
            <th>nom</th>
            <th>prenom</th>
            <th>Email</th>
            <th>Code</th>
            <th>Adresse</th>
            <th>Numéro</th>
            <th>role</th>
            <th>Mise à jour</th>
            <th>Supprimer</th>
        </tr>

        <?php
        foreach ($currentPageItems as $user) {
        ?>

        <tr>
            <td><?= $user['iduser']; ?></td>
            <td><?= $user['prenom']; ?></td>
            <td><?= $user['nom']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['code']; ?></td>
            <td><?= $user['adresse']; ?></td>
            <td><?= $user['numero']; ?></td>
            <td><?= $user['rol']; ?></td>
            <td align="center">
                <form method="POST" action="updateuser.php">
                    <input type="submit" name="update" value="Mettre à jour">
                    <input type="hidden" value=<?= $user['iduser']; ?> name="iduser">
                </form>
            </td>
            <td>
                <a href="deleteuser.php?id=<?= $user['iduser']; ?>">Supprimer</a>
            </td>
        </tr>

        <?php
        }
        ?>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item <?= ($currentPage == 1 ? 'disabled' : '') ?>">
            <a class="page-link" href="?page=<?= ($currentPage - 1) ?>" style="background-color: #333; color: white; border-radius: 20px; padding: 8px 16px; margin-right: 10px;">Previous</a>
        </li>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($currentPage == $i ? 'active' : '') ?>">
                <a class="page-link" href="?page=<?= $i ?>" style="background-color: <?= ($currentPage == $i ? '#ff5f5f' : '#333'); ?>; color: <?= ($currentPage == $i ? 'white' : 'black'); ?>; border-radius: 20px; padding: 8px 16px; margin-right: 10px;"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?= ($currentPage == $totalPages ? 'disabled' : '') ?>">
            <a class="page-link" href="?page=<?= ($currentPage + 1) ?>" style="background-color: #333; color: white; border-radius: 20px; padding: 8px 16px;">Next</a>
        </li>
    </ul>
</nav>



</body>
</html>
