
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="https://i.ibb.co/hB9fBx1/376504141-224121517218350-4545070668865803371-n.png" sizes="64x64">
    <title>visitor-complaint</title>
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-starter.css">
	<style>
.nav-link { color : white !important;}
.nav-link:hover , .active{ color : red !important; }
.btn {color : white !important;background-color : red !important;border-radius: 10px !important;}
 @keyframes shake {0% { transform: translateX(0); }10%, 90% { transform: translateX(-10px); }20%, 80% { transform: translateX(10px); }30%, 50%, 70% { transform: translateX(-10px); }40%, 60% { transform: translateX(10px); }100% { transform: translateX(0); }}
.btn:hover { color : red !important; box-shadow: 1px 1px 1px 1px red !important;animation: shake 2s;}
input:active:hover, input:focus:hover, input:hover , input:active , input:focus ,textarea:active:hover, textarea:focus:hover, textarea:hover , textarea:active , textarea:focus{  border-color: red !important; }
.navbar {
            background-color: red !important;
        }
        a {
            color: white; 
            text-decoration: none;
        }

        .right-align {
            text-align: right; 
        }
        label.container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 16px;
            user-select: none;
            color: white;
        }

        input[type="checkbox"] {
            opacity: 0;
            position: absolute;
        }

        /* Style the checkmark */
        span.checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color:red;
            border-radius: 5px;
        }

        /* Hide the checkmark by default */
        span.checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when the checkbox is checked */
        input[type="checkbox"]:checked + span.checkmark:after {
            display: block;
        }

        /* Style the checkmark inside the checkbox */
        span.checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
        }
        
</style></head><body>
<section class="w3l-bootstrap-header">
<nav class="navbar navbar-expand-lg navbar-light py-lg-2 py-2" style="background-color:red !important;">
<div class="container">
<img src="images/logo.PNG" alt="Logo" style="width: 80px; margin-right: 10px;">
<a class="navbar-brand" style="color:white" href=""><span ></span>Explore beyond</a>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
 <ul class="navbar-nav ml-auto">
<li class="nav-item mr-0">
<a class="nav-link active" href=""></a></li></ul>
</div></div></nav></section>
<section class="w3l-contact-breadcrum">
<div class="breadcrum-bg py-sm-5 py-4">
<div class="container py-lg-3">
<center><h2>Complaints Area</h2></center>
<div class="right-align">
        <a href="../index.php">Home <span> / Contact Us</span></a>
    </div>
</div></div></section>
<!-- contact form -->
<section class="w3l-contacts-2" id="contact">
<div class="contacts-main">
<div class="form-41-mian py-5">
<div class="container py-md-3">
<h3 class="cont-head">Information</h3>
<div class="d-grid align-form-map">
<div class="form-inner-cont">
<form action="addreclamation.php" method="POST" class="main-input" id="reclamation-form">
    <div class="top-inputs d-grid">
        <input type="text" placeholder="Name" name="name" id="w3lName">
        <input type="email" name="email" placeholder="Email" id="w3lSender">
        <input type="number" placeholder="Phone Number" name="tel" id="w3lName">
        <select name="category" id="w3lCategory">
            <option value="" disabled selected>Complaint Categories</option>
            <option value="Shop">Services</option>
            <option value="Appointment">Appointment</option>
            <option value="Drugs">flight</option>
            <option value="Others">Others</option>
        </select>
    </div>
    <textarea placeholder="Message" name="message" id="w3lMessage"></textarea>

    <div class="text-right"><button type="submit" class="btn btn-theme3">Send</button></div>
</form>
<label class="container">
    <input type="checkbox" id="robotCheckbox">
    <span class="checkmark"></span> I'm not a robot
</label>

<script>
    const form = document.getElementById("reclamation-form");
    const robotCheckbox = document.getElementById("robotCheckbox");

    form.addEventListener("submit", function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            return;
        }

        if (!robotCheckbox.checked) {
            alert("Please confirm that you're not a robot.");
            event.preventDefault();
        }
    });
</script>

</div>
<div class="contact-right">
<img src="assets/images/ab-2.jpg" class="img-fluid" alt="">
</div></div></div></div>
<div class="contant11-top-bg py-5">
<div class="container py-md-3">
<div class="d-grid contact section-gap">
<div class="contact-info-left d-grid text-center">
<div class="contact-info">
<span class="fa fa-location-arrow" aria-hidden="true"></span>
<h4>Address</h4>
<p>ESPRIT : Ecole Sup Privée d'Ingénierie et de Technologies</p>
</div>
<div class="contact-info">
<span class="fa fa-phone" aria-hidden="true"></span>
<h4>Phone</h4>
<p><a href="tel:+21654649999">+21627185228</a></p>
</div>
<div class="contact-info">
<span class="fa fa-envelope-open-o" aria-hidden="true"></span>
<h4>Mail</h4>
<p><a href="mailto:mohamedaziz.loueti@esprit.tn" class="email">mohamedaziz.loueti@esprit.tn</a></p>
</div></div></div></div></div>
</section>
</body>
</html>



