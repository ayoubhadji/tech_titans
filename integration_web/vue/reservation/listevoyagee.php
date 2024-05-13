<?php
include '../../controller/reservation/voyageec.php';

$voyageeC = new voyageeC();
$list = $voyageeC->listvoyagee();
$error = ""; 
$voyageea = null;
$voyageeCa = new voyageeC();
if (
    isset($_POST["idvoyage"]) &&
    isset($_POST["description"]) &&
    isset($_POST["datedepart"]) &&
    isset($_POST["dateretour"]) &&
    isset($_POST["idclient"]) 

    
) {
    if (
        !empty($_POST['idvoyage']) &&
        !empty($_POST['description']) &&
        !empty($_POST['datedepart']) &&
        !empty($_POST['dateretour'])&&
        !empty($_POST["idclient"]) 
     
    ) {
        $voyageea = new voyagee(
            
            $_POST['idvoyage'],
            $_POST['description'],
            new DateTime($_POST['datedepart']),
            new DateTime($_POST['dateretour']),
            $_POST['idclient'],
            null,
        
        );
        $voyageeCa->addvoyagee($voyageea);
        header('Location: listevoyagee.php');
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
                                           
                                            <div class="col-md-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body">
                                        <div class="row">
                                           
                                            <div class="col-md-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body">
                                                       <h5 class="card-title">voyage infos</h5>
                                                        <div id="error">
                                                            <?php echo $error; ?>
                                                         </div>
    <script>                                                   
    function va() {
        var idvoyage = document.getElementById("idvoyage").value;
        var description = document.getElementById("description").value;
        var datedepart = document.getElementById("datedepart").value;
        var dateretour = document.getElementById("dateretour").value;
        var idclient=document.getElementById("idclient").value;

        var numRegExp = /^\d+$/;
        var alphaRegExp = /^[A-Za-z]+$/;
        var dateRegExp = /^\d{4}-\d{2}-\d{2}$/;

        if (!numRegExp.test(idvoyage) || idvoyage.length !== 8) {
            alert("L'ID de voyage doit être une chaîne numérique de 8 chiffres.");
            return false;
        }
        if (!numRegExp.test(idclient) || idclient.length !== 8) {
            alert("L'ID de client doit être une chaîne numérique de 8 chiffres.");
            return false;
        }

        if (!alphaRegExp.test(description)) {
            alert("La description doit contenir uniquement des lettres alphabétiques.");
            return false;
        }


        var currentDate = new Date();
        if (datedepart <= currentDate.toISOString().slice(0, 10)) {
            alert("La date de depart doit être supérieure à la date actuelle.");
            return false;
        }

        var currentDate = new Date();
        if (dateretour <= currentDate.toISOString().slice(0, 10)) {
            alert("La date de retour doit être supérieure à la date actuelle.");
            return false;
        }

        return true;
    }
</script>   

<form class="col-md-10 mx-auto" action="listevoyagee.php" onsubmit="return va()" method="post">

                                                             
                                                            <div class="form-group">
                                                                <label for="firstname">Id voyage</label>
                                                                <div>
                                                                    <input type="text" class="form-control"
                                                                        id="idvoyage" name="idvoyage"
                                                                        placeholder="Id voyage">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="lastname">description</label>
                                                                <div>
                                                                    <input type="text" class="form-control"
                                                                        id="description" name="description"
                                                                        placeholder="description">
                                                                </div>
                                                            </div>
                                    
                                                            <div class="form-group">
                                                                <label for="email">Date de depart</label>
                                                                <div>
                                                                    <input type="date" class="form-control"
                                                                        id="datedepart" name="datedepart"
                                                                        placeholder="Date de depart">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Date de retour</label>
                                                                <div>
                                                                    <input type="date" class="form-control"
                                                                        id="dateretour" name="dateretour"
                                                                        placeholder="Date de retour">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="firstname">Id client</label>
                                                                <div>
                                                                    <input type="text" class="form-control"
                                                                        id="idclient" name="idclient"
                                                                        placeholder="Id client">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div>

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="submit" value="submit">submit
                                                                </button>
                                                            </div>
                                                        </form>
                                                        <br>


                                                    </div>
                                                </div>
                                                <div class="main-card mb-3 card">
                                                    <div class="container-fluid">
                                                        <div class="card-body">
                                                            <h5 class="card-title">data table</h5>
                                                            <table class="mb-0 table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>idvoyage</th>
                                                                        <th>description</th>
                                                                        <th>datedepart</th>
                                                                        <th>dateretour</th>  
                                                                        <th>idclient</th>                                          
                                                                        <th>Update</th>
                                                                        <th>Delete</th>
                                                                    </tr>
                                                                </thead>
                                                                <?php
                                          
                                          foreach ($list as $voyagee) {
                                         ?>
                             <tr>
                                 <td>
                                     <?= $voyagee['idvoyage']; ?>
                                 </td>
                                 <td>
                                     <?= $voyagee['description']; ?>
                                 </td>
                                 <td>
                                     <?= $voyagee['datedepart']; ?>
                                 </td>
                                 <td>
                                     <?= $voyagee['dateretour']; ?>
                                 </td>
                                 <td>
                                     <?= $voyagee['idclient']; ?>
                                 </td>
                                
                                 <td >
                                     <form method="POST" action="updatevoyagee.php">
                                         <div class="container py-2">
                                             <button class="btn btn-info" type="submit" name="update"
                                                 value="update">Update</button>
                                             <input type="hidden" value=<?PHP echo $voyagee['idvoyage']; ?>
                                             name="idvoyage">
                                     </form>
                                 </td>
                                 <td>
                                     <form method="POST"
                                         action="deletevoyagee.php?idvoyage=<?php echo $voyagee['idvoyage']; ?>">
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