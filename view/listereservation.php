<?php
include '../controller/reservationc.php';

$reservationC = new reservationC();
$list = $reservationC->listreservation();
$error = ""; 
$reservationa = null;
$reservationCa = new reservationC();
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
        $reservationa = new reservation(
            
            $_POST['idclient'],
            $_POST['nbrp'],
            $_POST['destination'],
            new DateTime($_POST['dateres']),
            $_POST['prixt'],
            null,
        
        );
        $reservationCa->addreservation($reservationa);
        header('Location:http://localhost/eyaweb/view/listereservation.php');
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
                        <div class="app-header-overlay d-none animated fadeIn"></div>
                    </div>
                    <div class="app-inner-layout app-inner-layout-page">
                        <div class="app-inner-layout__wrapper">
                            <div class="app-inner-layout__content pt-1">
                                <div class="tab-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                           
                                            <div class="col-md-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body">
                                                        <style > /* Style du titre h2 */
h5 {
    font-size: 30px; /* Taille de la police */
    color: #333; /* Couleur du texte */
    margin: 20px 0; /* Marge supérieure et inférieure */
    text-align: center; /* Centrage horizontal */
    font-weight: bold; /* Gras */
    text-transform: uppercase; /* Convertit le texte en majuscules */
    letter-spacing: 2px; /* Espacement entre les lettres */
}</style>

                                                        <h5 class="card-title">reservation infos</h5>
                                                        <div id="error">
                                                            <?php echo $error; ?>
                                                         </div>
    <script>                                                   
    function va() {
        var idclient = document.getElementById("idclient").value;
        var nbrp = document.getElementById("nbrp").value;
        var destination = document.getElementById("destination").value;
        var dateres = document.getElementById("dateres").value;
        var prixt = document.getElementById("prixt").value;

        var numRegExp = /^\d+$/;
        var alphaRegExp = /^[A-Za-z]+$/;
        var dateRegExp = /^\d{4}-\d{2}-\d{2}$/;

        if (!numRegExp.test(prixt)) {
            alert("Le prix total ne doit contenir que des chiffres.");
            return false;
        }

        if (!alphaRegExp.test(destination)) {
            alert("La destination doit contenir uniquement des lettres alphabétiques.");
            return false;
        }

        if (!numRegExp.test(idclient) || idclient.length !== 8) {
            alert("L'ID client doit être une chaîne numérique de 8 chiffres.");
            return false;
        }

        var currentDate = new Date();
        if (dateres <= currentDate.toISOString().slice(0, 10)) {
            alert("La date de réservation doit être supérieure à la date actuelle.");
            return false;
        }

        if (!numRegExp.test(nbrp) || nbrp.length !== 1) {
            alert("Le nombre de personnes doit être un entier de 1 chiffre.");
            return false;
        }

        return true;
    }
</script>   

<form class="col-md-10 mx-auto" action="listereservation.php" onsubmit="return va()" method="post">


                                                             
                                                            <div class="form-group">
                                                                <label for="firstname">Id client</label>
                                                                <div>
                                                                    <input type="text" class="form-control"
                                                                        id="idclient" name="idclient" 
                                                                        placeholder="Id client">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="lastname">nombre de personne</label>
                                                                <div>
                                                                    <input type="text" class="form-control"
                                                                        id="nbrp" name="nbrp"
                                                                        placeholder="nombre de personne">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="username">destination</label>
                                                                <div>
                                                                    <input type="text" class="form-control"
                                                                        id="destination" name="destination" 
                                                                        placeholder="destination">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Date de reservation</label>
                                                                <div>
                                                                    <input type="date" class="form-control"
                                                                        id="dateres" name="dateres" 
                                                                        placeholder="Date de reservation">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="text">prix total</label>
                                                                <input type="text" class="form-control" id="prixt" 
                                                                    name="prixt" placeholder="prixt">
                                                            </div>
                                                            <div class="row">
                                                            <div class="button-container">
                                                                <style >.button-container {
  display: flex; /* Utilisation de Flexbox */
  justify-content: space-between; /* Espacement égal entre les éléments */
}</style>

  <div class="col-md-3">
    <form method="post" action="submit.php">
      <div class="form-group">
        <button type="submit" class="btn btn-primary" name="submit" value="Réserver">Submit</button>
      </div>
    </form>
  </div>
  <div class="col-md-3">
    <form method="post" action="recherche.php">
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Rechercher</button>
      </div>
    </form>
  </div>
  <div class="col-md-3">
    <form method="post" action="stat.php">
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Stat</button>
      </div>
    </form>
  </div>
  <div class="col-md-3">
    <form method="post" action="tri.php">
      <div class="form-group">
        <button type="submit" class="btn btn-primary">afficher</button>
      </div>
    </form>
  </div>
</div>


                                                    </div>
                                                </div>
                                                <div class="main-card mb-3 card">
                                                    <div class="container-fluid">
                                                        <div class="card-body">
                                                            <h5 class="card-title">data table</h5>
                                                            <table class="mb-0 table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>idclient</th>
                                                                        <th>nbrp</th>
                                                                        <th>destination</th>
                                                                        <th>dateres</th>
                                                                        <th>prixt</th>                                             
                                                                        <th>Update</th>
                                                                        <th>Delete</th>

                                                                    </tr>
                                                                </thead>
                                                                <?php
                                          
                                          foreach ($list as $reservation) {
                                         ?>
                             <tr>
                                 <td>
                                     <?= $reservation['idclient']; ?>
                                 </td>
                                 <td>
                                     <?= $reservation['nbrp']; ?>
                                 </td>
                                 <td>
                                     <?= $reservation['destination']; ?>
                                 </td>
                                 <td>
                                     <?= $reservation['dateres']; ?>
                                 </td>
                                 <td>
                                     <?= $reservation['prixt']; ?>
                                 </td>
                                
                                 <td >
                                     <form method="POST" action="updatereservation.php">
                                         <div class="container py-2">
                                             <button class="btn btn-info" type="submit" name="update"
                                                 value="update">Update</button>
                                             <input type="hidden" value=<?PHP echo $reservation['idclient']; ?>
                                             name="idclient">
                                     </form>
                                 </td>
                                 <td>
                                     <form method="POST"
                                         action="deletereservation.php?idclient=<?php echo $reservation['idclient']; ?>">
                                         <div class="container py-2">
                                             <button class="btn btn-danger" type="submit" name="Delete"
                                                 value="Delete">Delete</a>
                                     </form>
                                 </td>
                              
                                 <?php
                                       }
                                     ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="app-drawer-wrapper">
        <div class="drawer-nav-btn">
            <button type="button" class="hamburger hamburger--elastic is-active">
                <span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
        </div>
       
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="assets/scripts/main.07a59de7b920cd76b874.js"></script>
</body>

</html>