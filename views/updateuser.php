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
    isset($_POST["role"])
    )

{
    if (
        !empty($_POST['nom']) &&
        !empty($_POST['prenom']) &&
        !empty($_POST['email']) &&
        !empty($_POST['code'])&&
        !empty($_POST['adresse']) &&
        !empty($_POST['numero']) 
       
    ) {
        $user = new user(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['code'],
            $_POST['adresse'],
            $_POST['numero'],
            $_POST['role']
            
        );


        $userc->updateuser($user, $_POST["iduser"]);
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
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ff5f5f; /* Red background color */
        color: white;
        margin: 0;
        padding: 0;
    }

    a {
        display: inline-block;
        margin-bottom: 10px;
        color: #007bff; /* Blue link color */
        text-decoration: none;
    }

    a:hover {
        color: #0056b3; /* Darker blue on hover */
    }

    hr {
        margin: 20px 0;
        border-color: #555; /* Dark gray border color */
    }

    #error {
        color: red;
        margin-bottom: 10px;
    }

    .registration {
        width: 50%;
        margin: 20px auto;
        background-color: black; /* Black background color */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .registration header {
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
    }

    .registration input[type="text"],
    .registration input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #fff; /* White border */
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #222; /* Dark background color */
        color: white;
    }

    .registration input[type="submit"] {
        background-color: #dc3545; /* Red button color */
        color: white;
        cursor: pointer;
    }

    .registration input[type="submit"]:hover {
        background-color: #c82333; /* Darker red on hover */
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
        color: white;
    }
</style>

</head>

<body>
    <button><a href="listuser.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <div class="registration form">
        <header>Sign up</header>
        <form action="" method="POST" onsubmit="return va()">

            <?php
            if (isset($_POST['iduser'])) {
                $user = $userc->showuser($_POST['iduser']);
            }
            ?>
            <input type="text" name="id" id="id" placeholder=" ID" readonly value="<?php echo $user['iduser']; ?>">
            <input type="text" name="nom" id="nom" placeholder="Enter your FirstName" value="<?php echo $user['nom']; ?>">
            <input type="text" name="prenom" id="prenom" placeholder="Enter your LastName" value="<?php echo $user['prenom']; ?>">
            <input type="text" name="email" id="email" placeholder="Enter your email" value="<?php echo $user['email']; ?>">
            <input type="text" name="code" id="code" placeholder="Enter your code" value="<?php echo $user['code']; ?>">
            <input type="text" name="adresse" id="adresse" placeholder="Enter your adresse" value="<?php echo $user['adresse']; ?>">
            <input type="text" name="numero" id="numero" placeholder="Enter your numero" value="<?php echo $user['numero']; ?>">
            <input type="text" name="role" id="role" placeholder="role" readonly value="<?php echo $user['rol']; ?>">
            <input type="submit" value="Update">
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

           // if (!emailRegex.test(email)) {
             //   alert("L'email doit être sous le format : xxxxx@xxxx.xxx");
               // return false;
            //}

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
    </div>
</body>

</html>
