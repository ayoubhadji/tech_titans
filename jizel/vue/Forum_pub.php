<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style-starter.css">
    <style>
       /* Styles CSS */
body {
    background-color: #f8f9fa;
    color: #333;
}

.navbar {
    background-color: #ff0000;
}

.navbar-brand {
    color: white;
}

.navbar-toggler-icon {
    background-color: white;
}

.form-41-mian {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 30px;
    margin-top: 20px;
}

.cont-head {
    color: #ff0000;
    font-size: 24px;
    margin-bottom: 20px;
}

.main-input {
    text-align: center;
}

input[type="text"],
textarea,
select {
    width: 100%;
    margin: 10px 0;
    padding: 10px;
    border: 1px solid #ff0000;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
    background-color: white;
    color: #333;
}

input[type="text"]:focus,
textarea:focus,
select:focus {
    outline: none;
    border-color: #ff6347;
    box-shadow: 0 0 5px rgba(255, 0, 0, 0.5);
}

.btn {
    color: white !important;
    background-color: #ff0000 !important;
    border-radius: 10px !important;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 16px;
    border: none;
}

.btn:hover {
    background-color: #ff6347 !important;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3) !important;
}

@media (max-width: 768px) {
    .container {
        max-width: 90%;
    }
}


    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light py-lg-2 py-2">
        <a class="navbar-brand ml-2" href="" data-abc="true" style="color: white; font-size: 24px; display: flex; align-items: center;">
            <img src="logo.png" alt="Explore Beyond" height="40" style="margin-right: 10px;">
            <span style="color: white;">Explore Beyond</span>
        </a>

        <div class="end">
            <div class="collapse navbar-collapse" id="navbarColor02"></div>
        </div>
    </nav>

    <section class="w3l-contacts-2" id="contact">
    <div class="contacts-main">
        <div class="form-41-mian py-5">
            <div class="container py-md-3">
                <h3 class="cont-head">Publication Content:</h3>
                <div class="d-grid align-form-map">
                    <div class="form-inner-cont">
                        <form action="addpublication.php" method="POST" enctype="multipart/form-data" class="main-input">
                            <div class="top-inputs d-grid">
                                <input type="text" placeholder="Title" name="name" id="w3lName" required="">
                            </div>
                            <textarea placeholder="Description" name="message" id="w3lMessage" required=""></textarea>
                            <div class="top-inputs d-grid">
                            <input type="text" placeholder="hotel" name="hotel" id="w3lName" required="">
                            <input type="text" placeholder="prix" name="prix" id="w3lName" required="">

                                <input type="file" name="image" accept="image/*" required="">
                            </div>
                            <center><button type="submit" class="btn">Add</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const publicationForm = document.getElementById("publicationForm");

            publicationForm.addEventListener("submit", function (event) {
                const nameInput = document.getElementById("w3lName");
                const imageInput = document.querySelector('input[type="file"]');
                const typeSelect = document.getElementById("publicationType");
                const priceInput = document.getElementById("price");
    const hotelInput = document.getElementById("hotel");
    const price = priceInput.value;
    const hotel = hotelInput.value;


                // Vérification du champ de titre non vide
                if (nameInput.value.trim() === "") {
                    event.preventDefault();
                    document.getElementById("nameError").textContent = "Please enter a title.";
                } else {
                    document.getElementById("nameError").textContent = "";
                }

                // Vérification du champ d'image non vide
                if (imageInput.files.length === 0) {
                    event.preventDefault();
                    document.getElementById("imageError").textContent = "Please select an image.";
                } else {
                    document.getElementById("imageError").textContent = "";
                }

                // Vérification de la sélection du type de publication
                if (typeSelect.value === "") {
                    event.preventDefault();
                    alert("Please select a publication type.");
                }
            });
        });
    </script>
</body>


</html>
