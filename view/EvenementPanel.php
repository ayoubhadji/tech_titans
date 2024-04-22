<?php
include '../controller/EvenementC.php';
$error = '';
$evenementC = new EvenementC();
$listevenement = $evenementC->listEvenement();

if (isset($_POST["nom"]) && isset($_POST["content"]) && isset($_POST["adresse"]) && isset($_POST["prix"])) {
    if (!empty($_POST['nom']) && !empty($_POST["content"]) && !empty($_POST['adresse']) && !empty($_POST["prix"])) {


        if (!empty($_FILES['image']['tmp_name'])) {
            $image_data = file_get_contents($_FILES['image']['tmp_name']);
            $image_type = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        } else if (!is_null($imageData)) {
            $image_data = $imageData;
            $image_type = $imageType;
        }

        $evenement = new Evenement(
            $_POST['nom'],
            $_POST['content'],
            'me',
            $image_data,
            $image_type,
            $_POST['adresse'],
            $_POST['prix']
        );
        $evenementC->addEvenement($evenement);
        header('Location:EvenementPanel.php');
    } else {
        $error = "Missing information";
    }
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+icons+sharp">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
        <!----- end of aside -->
        <main >
        <div class="container">
        <form id="myForm" action="" method="POST" enctype="multipart/form-data">
            <h2 style="text-align: center;">Add New Evenement</h2>
            <div class="form-group">
                <label for="nom">nom</label>
                <input type="text" id="nom" name="nom" class="form-control">
                <span class="error-msg" id="titreerror"></span>
            </div>
            <div class="form-group">
                <label for="adresse">adresse</label>
                <input type="text" id="adresse" name="adresse" class="form-control">
                <span class="error-msg" id="adresseerror"></span>
            </div>
            <div class="form-group">
                <label for="prix">prix</label>
                <input type="text" id="prix" name="prix" class="form-control">
                <span class="error-msg" id="prixerror"></span>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea rows="10" id="content" name="content" class="form-control"></textarea>
                <span class="error-msg" id="contenterror"></span>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control-file">
                <span class="error-msg" id="imageerror"></span>
                <input type="hidden" name="image_type" id="image_type">
            </div>
            <button type="submit" name="submit" class="btn">Submit</button>
        </form>
    </div>
    <section class="content-section">
        <h2 class="section-heading">Recent Content</h2>
        <ul class="content-list">
            <?php foreach ($listevenement as $Evenement) { ?>
            <li class="content-item">
                <div class="content-info">
                    <h3 class="content-title">
                        <?php echo $Evenement['nom']; ?>
                    </h3>
                    <div class="content-actions">
                        <a href="EvenementSupp.php?IdEvenement=<?php echo $Evenement['IdEvenement']; ?>" class="content-action"><i
                                class="fas fa-trash"></i></a>
                        <a href="EvenementMod.php?IdEvenement=<?php echo $Evenement['IdEvenement']; ?>" class="content-action"><i
                                class="fas fa-edit"></i></a>
                    </div>
                    <span class="content-time">
                        <?php echo $Evenement['time']; ?>
                    </span>
                </div>
                <div class="content-image">
                    <img src="data:<?php echo $Evenement['image_type']; ?>;base64,<?php echo base64_encode($Evenement['image_data']); ?>"
                        alt="<?php echo $Evenement['nom']; ?>" class="content-img">
                </div>
            </li>
            <?php } ?>
        </ul>
    </section>



</main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>

    <script>
    let myForm = document.getElementById('myForm');

    myForm.addEventListener('submit', function (e) {
        let mytest = document.getElementById('nom');
        let mycontent = document.getElementById('content');
        let myprix = document.getElementById('prix');
        let myAdresse = document.getElementById('adresse');
        let regex = /^[a-zA-Z0-9\s]+$/; // Updated regex to allow spaces as well

        let errornom = document.getElementById('titreerror');
        let errorContent = document.getElementById('contenterror');
        let errorPrix = document.getElementById('prixerror');
        let errorAdresse = document.getElementById('adresseerror'); // Corrected variable name

        // Clear previous error messages
        errornom.textContent = '';
        errorContent.textContent = '';
        errorPrix.textContent = '';
        errorAdresse.textContent = ''; // Corrected variable name

        if (mytest.value.trim() === '') {
            errornom.textContent = "Le champ titre est requis";
            errornom.style.color = 'red';
            e.preventDefault();
        } else if (!regex.test(mytest.value)) {
            errornom.textContent = "Le champ titre ne doit contenir que des caractères alphanumériques";
            errornom.style.color = 'red';
            e.preventDefault();
        }

        if (mycontent.value.trim() === '') {
            errorContent.textContent = "Le champ content est requis";
            errorContent.style.color = 'red';
            e.preventDefault();
        }
        if (myAdresse.value.trim() === '') {
            errorAdresse.textContent = "Le champ adresse est requis";
            errorAdresse.style.color = 'red';
            e.preventDefault();
        }
        if (myprix.value.trim() === '') {
            errorPrix.textContent = "Le champ prix est requis";
            errorPrix.style.color = 'red';
            e.preventDefault();
        }
    });
</script>

   


</body>

</html>