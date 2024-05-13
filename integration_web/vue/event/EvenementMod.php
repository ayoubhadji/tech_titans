<?php
include '../../controller/event/EvenementC.php';
include '../../controller/event/AvisC.php';

$evenementC = new EvenementC();
$IdEvenement=$_GET["IdEvenement"];
$Evenement = $evenementC->recupererEvenement($IdEvenement);

if (
    isset($_POST["nom"]) &&
    isset($_POST["content"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["prix"])
) {
    try {
        // Check if the file was uploaded successfully
        if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
            $imageType = $_FILES["image"]["type"];
        } else {
            // Use existing image data if no new image is uploaded
            $imageData = $Evenement["image_data"];
            $imageType = $Evenement["image_type"];
        }

        // Validate and sanitize user input
        $nom = $_POST["nom"];
        $content = $_POST["content"];
        $adresse = $_POST["adresse"];
        $prix = $_POST["prix"];

        if (empty($nom) || empty($content)) {
            throw new Exception("nom and content cannot be empty.");
        }

        // Update the Evenement
        $evenement = new Evenement($nom, $content, "me", $imageData, $imageType,$adresse,$prix);
        $evenementC->updateEvenement($evenement, $IdEvenement);
        header("Location: EvenementPanel.php");
        exit(); // Use exit after redirection to prevent further script execution
    } catch (Exception $e) {
        // Handle any exceptions or errors
        echo "Error: " . $e->getMessage();
    }}
$avisC = new AvisC();
  $listavis = $avisC->listAvis($IdEvenement);
  $nbravis = $avisC->CountAvis($IdEvenement);
  
  if (
    isset($_POST["avis"]) 
) {
    if (
        !empty($_POST['avis'])
    ) {
        $avis = new  Avis(
            "me",
            $_POST['avis'],
            $IdEvenement
            
        );
        $avisC->addAvis($avis);
        header("Location:EvenementMod.php?IdEvenement=$IdEvenement");
    } else
        $error = "Missing information";}
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/stylee.css" rel="stylesheet">

</head>

<body>
    <!-- Topbar Start -->
   

    <!-- Blog Start -->
    <div >
        <div >
            <div >
                <!-- Blog Detail Start -->
                <div class="container">
    <h2 class="heading">Modify Content</h2>

    <form action="" method="POST" id="myforma" enctype="multipart/form-data" class="form">
        <div class="form-group">
            <label for="nom" class="label">nom</label>
            <input type="text" id="nom" name="nom" value="<?php echo $Evenement['nom']; ?>"  class="input">
            <span id="nom"></span>

        </div>
        <div class="form-group">
            <label for="adresse" class="label">adresse</label>
            <input type="text" id="adresse" name="adresse" value="<?php echo $Evenement['adresse']; ?>"  class="input">
            <span id="adresse"></span>

        </div>
        <div class="form-group">
            <label for="prix" class="label">prix</label>
            <input type="text" id="prix" name="prix" value="<?php echo $Evenement['prix']; ?>"  class="input">
            <span id="prix"></span>

        </div>

        <div class="image-preview">
            <img src="data:<?php echo $Evenement['image_type']; ?>;base64,<?php echo base64_encode($Evenement['image_data']); ?>" alt="Image Preview" class="image-preview-img">
            <div class="form-group">
                <label for="image" class="label">Image</label>
                <input type="file" id="image" name="image" class="input-file">
                <span class="error-message" id="image-error"></span>
                <input type="hidden" name="image_type" id="image_type">
            </div>
        </div>

        <div class="form-group">
            <label for="content" class="label">Content</label>
            <textarea rows="5" id="content" name="content"   class="textarea"><?php echo $Evenement['Content']; ?></textarea>
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
       
    </div>
</div>

                <!-- Blog Detail End -->

                <!-- Comment List Start -->


                <div >
<h4 ><?php echo $nbravis; ?>  aviss</h4>

                <?php
  
  foreach ($listavis as $Avis) {
   ?>
                    <div >
                        <div>
                            <h6><a href=""><?php echo $Avis['user']; ?></a> <small><i><?php echo $Avis['time']; ?></i></small></h6>
                            <p><?php echo $Avis['avis']; ?></p>

                            <a  name="modfier" href="AvisMod.php?IdEvenement=<?php echo $Avis['IdEvenement']; ?>&IdAvis=<?php echo $Avis['IdAvis']; ?>">Modifier</a>
                            <a  name="supprimer" href="AvisSupp.php?IdEvenement=<?php echo $Avis['IdEvenement']; ?>&IdAvis=<?php echo $Avis['IdAvis']; ?>">Supprimer</a>

                        </div>
                    </div>
                    
                    <?php
    }?>
                </div>
                <!-- avis List End -->

                <!-- avis Form Start -->
                <div >
                    <h4 >Leave a avis</h4>
                    <form  id="myform" method="POST" >
                        <div >
                
                            <div >
                                <textarea rows="5" id="Avis" name="avis" placeholder="avis"></textarea>
                                <span id="avis"></span>

                            </div>
                            <div >
                                <button  type="submit">Leave Your avis</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- avis Form End -->
            </div>

     

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

let myForm = document.getElementById('myform');


myForm.addEventListener('submit' , function(e){
    let mycontent = document.getElementById('Avis');


  if(mycontent.value =='')
  {
    let error = document.getElementById('avis');
    error.innerHTML = "Le champs content est requis";
    error.style.color = 'red';
    e.preventDefault();
  }



})
document.addEventListener('DOMContentLoaded', function() {
    let myForma = document.getElementById('myforma');

    myForma.addEventListener('submit', function(e) {
        let mynom = document.getElementById('nom');
        let myadresse = document.getElementById('adresse');
        let myprix = document.getElementById('prix');
        let mycontente = document.getElementById('content');

        let isValid = true; // Flag to track form validity

        document.querySelectorAll('.error-message').forEach(function(error) {
            error.textContent = '';
        });

        if (mynom.value.trim() === '') {
            let error = document.getElementById('nom-error');
            error.textContent = "Le champ nom est requis";
            error.style.color = 'red';
            isValid = false;
        }
        if (myadresse.value.trim() === '') {
            let error = document.getElementById('adresse-error');
            error.textContent = "Le champ adresse est requis";
            error.style.color = 'red';
            isValid = false;
        }
        if (myprix.value.trim() === '') {
            let error = document.getElementById('prix-error');
            error.textContent = "Le champ prix est requis";
            error.style.color = 'red';
            isValid = false;
        }
        if (mycontente.value.trim() === '') {
            let error = document.getElementById('content-error');
            error.textContent = "Le champ content est requis";
            error.style.color = 'red';
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault(); // Prevent the form from submitting
        }
    });
});





      </script>
</body>

</html>