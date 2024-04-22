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
    isset($_POST["numero"]) )

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
            margin: 0;
            padding: 0;
        }

        a {
            display: inline-block;
            margin-bottom: 10px;
        }

        hr {
            margin: 20px 0;
        }

        #error {
            color: red;
            margin-bottom: 10px;
        }

        .registration {
            width: 50%;
            margin: 0 auto;
            background-color: #f9f9f9;
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
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .registration input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .registration input[type="submit"]:hover {
            background-color: #45a049;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
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
        <form action="" method="POST" onsubmit="return test()">

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
            <input type="submit" value="Update">
        </form>
    </div>
    <?php

    ?>
</body>

</html>
