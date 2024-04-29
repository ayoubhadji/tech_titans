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
    isset($_POST["numero"]) 
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
            $_POST['numero']
            
        );
        $userc->adduser($user);
        header('Location:listuser.php');
    } else
        $error = "Missing information";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>explore beyond Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class=""></div>
                    <div class="col-lg-8">
                        <div class="p-4">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="" method="POST" onsubmit="return va()">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="nom" id="nom"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="prenom" id="prenom"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                        name="code" id="code" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                        name="code" id="code" placeholder="Repeat Password">
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="adresse" id="adresse"
                                                placeholder="adresse">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" name="numero" id="numero"
                                                placeholder="numero">
                                        </div>
                                        
                                </div>
                                <td><input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block"></td>
                                
                                <hr>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
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