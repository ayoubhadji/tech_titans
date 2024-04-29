<?php
include "C:/xampp/htdocs/projetvoyage/controller/userc.php"; 
$userc =new userc();
$list =$userc->listuser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs avec CSS intégré</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Utilisation d'une police de caractères générique */
        }

        h1, h2 {
            text-align: center; /* Centrer les titres */
        }

        table {
            border-collapse: collapse; /* Fusionner les bordures des cellules */
            width: 70%; /* Largeur du tableau */
            margin: 0 auto; /* Centrer le tableau horizontalement */
        }

        th, td {
            border: 1px solid #dddddd; /* Bordure des cellules */
            text-align: left; /* Alignement du texte à gauche dans les cellules */
            padding: 8px; /* Espacement du contenu à l'intérieur des cellules */
        }

        th {
            background-color: #f2f2f2; /* Couleur de fond pour la ligne d'en-tête */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Couleur de fond pour les lignes paires */
        }

        a {
            text-decoration: none; /* Supprimer le soulignement par défaut des liens */
            color: blue; /* Couleur du texte des liens */
        }

        a:hover {
            color: darkblue; /* Changement de couleur au survol */
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Couleur de fond pour les boutons */
            color: white; /* Couleur du texte des boutons */
            border: none; /* Supprimer la bordure */
            padding: 8px 12px; /* Espacement du contenu à l'intérieur des boutons */
            cursor: pointer; /* Définir le curseur en pointeur au survol */
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Changement de couleur au survol des boutons */
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
            <th>Mise à jour</th>
            <th>Supprimer</th>
        </tr>

        <?php
        foreach ($list as $user) {
        ?>

        <tr>
            <td><?= $user['iduser']; ?></td>
            <td><?= $user['prenom']; ?></td>
            <td><?= $user['nom']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['code']; ?></td>
            <td><?= $user['adresse']; ?></td>
            <td><?= $user['numero']; ?></td>
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
</body>
</html>