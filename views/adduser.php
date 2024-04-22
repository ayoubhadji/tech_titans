<?php
include '../controller/userc.php';
include '../model/user.php';

$error = "";


$user = null;


$userc = new userC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["code"])&&
    isset($_POST["adresse"]) &&
    isset($_POST["numero"]) &&
    isset($_POST["pwd1"]) )

{
    if (
        !empty($_POST['nom']) &&
        !empty($_POST['prenom']) &&
        !empty($_POST['email']) &&
        !empty($_POST['code'])&&
        !empty($_POST['adresse']) &&
        !empty($_POST['numero']) &&
        !empty($_POST["pwd1"]) 
       
    ) {
        $user = new user(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['code'],
            $_POST['adresse'],
            $_POST['numero']
            
        );
        $userc->adduser($user);
        header('Location:listuser.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <a href="listuser.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <style>
        form {
            width: 50%; /* Ajustez la largeur selon vos préférences */
            margin: 0 auto; /* Centrer le formulaire horizontalement */
        }

        table {
            border-collapse: collapse; /* Fusionner les bordures des cellules */
            width: 100%; /* Remplir complètement la largeur du conteneur parent */
        }

        td {
            padding: 10px; /* Ajouter un peu d'espace autour du contenu dans chaque cellule */
        }

        input[type="text"],
        input[type="submit"],
        input[type="reset"] {
            width: 100%; /* Remplir complètement la largeur de leur conteneur parent */
            padding: 8px; /* Ajouter un peu d'espace autour du texte dans les champs de texte */
            box-sizing: border-box; /* Inclure la largeur du remplissage et de la bordure dans la largeur totale */
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50; /* Couleur de fond */
            color: white; /* Couleur du texte */
            border: none; /* Supprimer la bordure */
            cursor: pointer; /* Définir le curseur en pointeur au survol */
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049; /* Changement de couleur au survol */
        }

        label {
            font-weight: bold; /* Mettre en gras les libellés */
        }
    </style>
</head>
<body>
    <form action="" method="POST" onsubmit="return va()">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="nom">Nom:</label>
                </td>
                <td><input type="text" name="nom" id="nom" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="prenom">Prénom:</label>
                </td>
                <td><input type="text" name="prenom" id="prenom" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="adresse">Adresse:</label>
                </td>
                <td><input type="text" name="adresse" id="adresse"></td>
            </tr>
            <tr>
                <td>
                    <label for="numero">Numéro de téléphone:</label>
                </td>
                <td><input type="text" name="numero" id="numero"></td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email:</label>
                </td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <td>
                    <label for="code">Code:</label>
                </td>
                <td><input type="text" name="code" id="code"></td>
            </tr>
            <tr>
                <td>
                    <label for="pwd1">Code 2:</label>
                </td>
                <td><input type="text" name="pwd1" id="pwd1"></td>
            </tr>
            <tr align="center">
                <td><input type="submit" value="Save"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
    </form>

    <script>
        // Fonction de validation appelée lors de la soumission du formulaire
        function va() {
            // Récupération des valeurs des champs
            var nom = document.getElementById("nom").value;
            var prenom = document.getElementById("prenom").value;
            var email = document.getElementById("email").value;
            var code = document.getElementById("code").value;
            var adresse = document.getElementById("adresse").value;
            var numero = document.getElementById("numero").value;

            // Expression régulière pour vérifier si la valeur ne contient que des chiffres
            var numRegExp = /^\d+$/;

            // Expression régulière pour vérifier si la valeur ne contient que des lettres alphabétiques
            var alphaRegExp = /^[A-Za-z]+$/;

            // Expression régulière pour vérifier si la valeur ressemble à une adresse e-mail
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!alphaRegExp.test(nom)) {
                alert("Le nom doit contenir uniquement des lettres alphabétiques.");
                return false;
            }

            if (!alphaRegExp.test(prenom)) {
                alert("Le prénom doit contenir uniquement des lettres alphabétiques.");
                return false;
            }

            if (!emailRegex.test(email)) {
                alert("L'email doit être sous le format : xxxxx@xxxx.xxx");
                return false;
            }

            if (code.length < 8) {
                alert("Le code doit être supérieur à 8 caractères.");
                return false;
            }

            if (!alphaRegExp.test(adresse)) {
                alert("L'adresse ne doit contenir que des lettres alphabétiques.");
                return false;
            }

            if (!numRegExp.test(numero) || numero.length !== 8) {
                alert("Le numéro doit être un entier de 8 chiffres.");
                return false;
            }

            // Si toutes les validations réussissent, le formulaire est soumis
            return true;
        }
    </script>
</body>
</html>
</body>

</html>