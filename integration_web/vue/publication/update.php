<?php
include_once '../../config.php';
include_once '../../model/publication/Publication.php';
include_once '../../controller/publication/PublicationCrud.php'; // Adjust the path accordingly
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Publication</title>
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .form-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            text-align: center;
        }

        .cont-head {
            color: #ff0000;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        input,
        textarea {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ff0000;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            color: #fff;
            background-color: #ff0000;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
        }

        .btn:hover {
            background-color: #ff0000;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }

            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-5px);
            }

            20%, 40%, 60%, 80% {
                transform: translateX(5px);
            }
        }
    </style>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission here
    $id = $_POST['id'];
    $newPublication = $_POST['publication'];
    $newNom = $_POST['nom'];
    $newImage = $_POST['image'];

    $publicationCrud = new PublicationCrud();

    if ($publicationCrud->updatePublication($id, $newPublication, $newNom, $newImage)) {
        echo "<div class='form-card'>";
        echo "<p class='cont-head'>Publication updated successfully!</p>";
        echo "<a href='Dash.php' class='btn'>Back to Update</a>";
        echo "</div>";
    } else {
        echo "<div class='form-card'>";
        echo "<p class='cont-head'>Failed to update publication.</p>";
        echo "<a href='Dash.php' class='btn'>Back to Update</a>";
        echo "</div>";
    }
} else {
    // Display the form to update the publication
    $id = $_GET['id'];

    $publicationCrud = new PublicationCrud();
    $publicationData = $publicationCrud->afficher1R($id);
    ?>

    <div class="form-card">
        <h2 class="cont-head">Update Publication</h2>

        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="publication">Description :</label>
            <textarea name="publication" id="publication"><?= $publicationData['publication'] ?></textarea>
            <br>

            <label for="nom">Title :</label>
            <input type="text" name="nom" id="nom" value="<?= $publicationData['nom'] ?>">
            <br>

            <label for="image">Image:</label>
            <input type="text" name="image" id="image" <?= $publicationData['image'] ?>>
            <label for="image">Prix:</label>
            <input type="text" name="prix" id="prix" <?= $publicationData['prix'] ?>>
            <label for="image">Hotel:</label>
            <input type="text" name="hotel" id="hotel" <?= $publicationData['hotel'] ?>>
            <br>

            <input type="submit" value="Update" class="btn">
        </form>
    </div>

<?php
}
?>

</body>
</html>
