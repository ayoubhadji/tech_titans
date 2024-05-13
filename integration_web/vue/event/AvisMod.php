<?php
include '../../controller/event/EvenementC.php';
include '../../controller/event/AvisC.php';

$evenementC = new EvenementC();
$avisC = new AvisC();
$IdEvenement = $_GET["IdEvenement"];
$IdAvis = $_GET["IdAvis"];
$listavis = $avisC->listAvis($IdEvenement);

$Evenement = $evenementC->recupererEvenement($IdEvenement);
$Avis = $avisC->recupererAvis($IdAvis);


if (
    isset($_POST["avis"])
) {

    $avisr = new Avis(
        "me",
        $_POST["avis"],
        $IdEvenement
    );
    $avisC->updateAvis($avisr, $IdAvis);
    header("Location:EvenementMod.php?IdEvenement=$IdEvenement");

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/stylee.css" rel="stylesheet">

</head>

<body>

<div >
        <div >
            <div >
                <!-- Blog Detail Start -->
                <div class="container">
    <h2 class="heading">Modify Content</h2>

    <form id="myforma" action="" method="POST" enctype="multipart/form-data" class="form">
       
        <div class="form-group">
            <label for="adresse" class="label">adresse</label>
            <input type="text" id="adresse" name="adresse" placeholder="<?php echo $Evenement['adresse']; ?>"  class="input">
            <span id="adresse"></span>        </div>
        <div class="form-group">
            <label for="prix" class="label">prix</label>
            <input type="text" id="prix" name="prix" placeholder="<?php echo $Evenement['prix']; ?>"  class="input">
            <span id="prix"></span>        </div>

        <div class="image-preview">
            <img src="data:<?php echo $Evenement['image_type']; ?>;base64,<?php echo base64_encode($Evenement['image_data']); ?>" alt="Image Preview" class="image-preview-img">
            <div class="form-group">
                <label for="image" class="label">Image</label>
                <input type="file" id="image" name="image" class="input-file">
                <span id="avis"></span>
                                <input type="hidden" name="image_type" id="image_type">
            </div>
        </div>

        <div class="form-group">
            <label for="content" class="label">Content</label>
            <textarea rows="5" id="content" name="content" placeholder="<?php echo $Evenement['Content']; ?>"  class="textarea"></textarea>
            <span id="content"></span>

        </div>

        <div class="button-group">
            <button class="btn btn-cancel">
                <a href="EvenementPanel.php" class="link">Cancel</a>
            </button>
            <button type="submit" class="btn btn-submit">
                <a href="EvenementPanel.php" class="link">Submit</a>
            </button>
        </div>
    </form>

    <div class="footer">
        <div class="user-info">
            <span class="username"><?php echo $Evenement['user']; ?></span>
        </div>
        <div class="stats">
  
        </div>
    </div>
</div>


                <div class="section">

    <?php foreach ($listavis as $Avis) { ?>
        <div class="item">
            <img src="../img/user.jpg" class="avatar" alt="User Avatar">
            <div class="content">
                <h6><a href="#" class="user"><?php echo $Avis['user']; ?></a> <small><i><?php echo $Avis['time']; ?></i></small></h6>
                <p class="text"><?php echo $Avis['avis']; ?></p>
                <a href="#" class="action">Modifier</a>
                <a href="#" class="action">Supprimer</a>
            </div>
        </div>
    <?php } ?>

    <!-- avis Form Start -->
    <div class="form-section">
        <h4>Leave a avis</h4>
        <form id="myform" action="" method="POST" class="form">
            <div class="form-group">
                <textarea rows="5" id="Avis" name="avis" class="textarea"><?php echo $Avis['avis']; ?></textarea>
                <span id="avis"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Leave Your avis</button>
            </div>
        </form>
    </div>
</div>

                <!-- avis Form End -->
            </div>


            <script>

                let myForm = document.getElementById('myform');


                myForm.addEventListener('submit', function (e) {
                    let mycontent = document.getElementById('Avis');


                    if (mycontent.value == '') {
                        let error = document.getElementById('avis');
                        error.innerHTML = "Le champs content est requis";
                        error.style.color = 'red';
                        e.preventDefault();
                    }



                })
                let myForma = document.getElementById('myforma');


                myForma.addEventListener('submit', function (e) {
                    let mynom = document.getElementById('nom');
                    let myadresse = document.getElementById('adresse');
                    let myprix = document.getElementById('prix');
                    let mycontent = document.getElementById('content');

                    if (mynom.value == '') {
                        let error = document.getElementById('nom');
                        error.innerHTML = "Le champs mynom est requis";
                        error.style.color = 'red';
                        e.preventDefault();
                    }
                    if (myadresse.value == '') {
                        let error = document.getElementById('adresse');
                        error.innerHTML = "Le champs adresse est requis";
                        error.style.color = 'red';
                        e.preventDefault();
                    }
                    if (myprix.value == '') {
                        let error = document.getElementById('prix');
                        error.innerHTML = "Le champs prix est requis";
                        error.style.color = 'red';
                        e.preventDefault();
                    }
                    if (mycontent.value == '') {
                        let error = document.getElementById('content');
                        error.innerHTML = "Le champs prix est requis";
                        error.style.color = 'red';
                        e.preventDefault();
                    }
                  



                })


            </script>
</body>

</html>