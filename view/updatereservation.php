<?php

include '../controller/reservationc.php';

$error = "";


$reservation = null;

// create an instance of the controller
$reservationC = new reservationC();
if (
    isset($_POST["idclient"]) &&
    isset($_POST["nbrp"]) &&
    isset($_POST["destination"]) &&
    isset($_POST["dateres"])&&
    isset($_POST["prixt"]) 

    
) {
    if (
        !empty($_POST['idclient']) &&
        !empty($_POST['nbrp']) &&
        !empty($_POST['destination']) &&
        !empty($_POST['dateres'])&&
        !empty($_POST['prixt']) 
     
    ) { 
        $reservation = new reservation(
           
            $_POST['idclient'],
            $_POST['nbrp'],
            $_POST['destination'],
            new DateTime($_POST['dateres']),
            $_POST['prixt']
        );
        $reservationC->updatereservation($reservation, $_POST["idclient"]);
        header('Location:Listereservation.php');
        } else
        $error = "Missing information";
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description"
        content="These can be used with other components and elements to create stunning and unique new elements for your UIs.">
    <link rel="icon" href="favicon.ico">
    <script src="./controlsais.js"></script>
    <meta name="msapplication-tap-highlight" content="no">
    <link href="main.07a59de7b920cd76b874.css" rel="stylesheet">
</head>

<body>
    
    <div class="app-inner-layout app-inner-layout-page">
        <div class="app-inner-layout__wrapper">
            <div class="app-inner-layout__content pt-1">
                <div class="tab-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <style>
                                            /* Style du titre h2 */
                                            h5 {
                                                font-size: 30px;
                                                /* Taille de la police */
                                                color: #333;
                                                /* Couleur du texte */
                                                margin: 20px 0;
                                                /* Marge supérieure et inférieure */
                                                text-align: center;
                                                /* Centrage horizontal */
                                                font-weight: bold;
                                                /* Gras */
                                                text-transform: uppercase;
                                                /* Convertit le texte en majuscules */
                                                letter-spacing: 2px;
                                                /* Espacement entre les lettres */
                                            }
                                        </style>
                                        <h5 class="card-title">reservation Infos</h5>
                                        <?php echo $error; ?>
                                        <?php
                                        if (isset($_POST['idclient'])) {
                                            $reservation = $reservationC->showreservation($_POST['idclient']);
                                        ?>
                                            <form id="signupForm" method="post" action="" novalidate="novalidate">
                                                <div class="form-group row">
                                                    <label for="idclient" class="col-sm-4 col-form-label">id client</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="idclient" name="idclient"
                                                            value="<?php echo $reservation['idclient']; ?>"
                                                            placeholder="id client">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nbrp" class="col-sm-4 col-form-label">nombre de personne</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="nbrp" name="nbrp"
                                                            value="<?php echo $reservation['nbrp']; ?>"
                                                            placeholder="nombre de personne">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="destination" class="col-sm-4 col-form-label">destination</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="destination"
                                                            name="destination" value="<?php echo $reservation['destination']; ?>"
                                                            placeholder="destination">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dateres" class="col-sm-4 col-form-label">Date de reservation</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="dateres" name="dateres"
                                                            value="<?php echo date('Y-m-d', strtotime($reservation['dateres'])); ?>"
                                                            placeholder="Date de reservation">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="prixt" class="col-sm-4 col-form-label">prix total</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="prixt"
                                                            value="<?php echo $reservation['prixt']; ?>" name="prixt"
                                                            placeholder="prix total">
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="col-sm-8">
                                                        <button type="submit" class="btn btn-primary" name="submit" value="submit">submit
                                                        </button>
                                                        <button type="submit" class="btn btn-primary" name="reset" value="reset">reset
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
