<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AirTravel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"> <span>Explore</span>Beyond</a>
        </div>
        <ul class="menu">
            <li><a href="#">Acceuil</a></li>
            <li><a href="vue/publication/front.php">blog</a></li>
            <li><a href="#popular-destination">destinations</a></li>
            <li><a href="#contact">contact</a></li>
            <li><a href="vue/reclamation/contact.php">Reclamation</a></li>

        </ul>
        <a href="#" class="btn-reservation">Réserver Maintenant</a>

   <div class="responsive-menu"></div>
    </header>
    <!--aceeuil section-->
    <section id="home">
        <h2>nous suivre</h2>
        <h4>voyagez en sécurité</h4>
        <p>Expolre beyond est la pour votre service</p>
        <a href="#" class="btn-reservation home-btn">Réserver Maintenant</a>
    </section>

<!-- A propos section-->
<section id="blog">
    <h1 class="title">blog</h1>
    
    <div class="img-desc">


<div class="left">
    <video src="images/video.mp4" autoplay loop></video>
</div>   
    <div class="right">
        <h3>Nous voyageons pour chercher d'autres états, d'autres vies , d'autres àmes.</h3>
        <p>Lorem ipsum dolor, vel recusandae ratione modi repellat harum alias magni. Reiciendis voluptatibus provident distinctio hic nihil ab repellat modi veritatis odio quibusdam?</p>
        <a href="#">Lire Plus</a>
    </div>
</div>

</section>

<!--section destination-->

<section id="popular-destination">
    <h1 class="title">destination populaires</h1>
    <div class="content">
        <!--box-->
    <div class="box">
        <img src="images/tunis.jpg" alt="">
        <div class="content">
            <div>
                <h4>tunis</h4>
                <p> fetes une tour innobliable dans la capitale de tunisie</p>
            </div>
        </div>
    </div>

 <!--box-->

 <!--box-->
 <div class="box">
    <img src="images/eljam.jpg" alt="">
    <div class="content">
        <div>
            <h4>el jam</h4>
            <p> Explorer le theatre rommain</p>
            
        
        </div>
    </div>
</div>
 <!--box-->
<!--box-->
<div class="box">
    <img src="images/djerba.jpg" alt="">
    <div class="content">
        <div>
            <h4>Djerba</h4>
            <p> Explorer l'ile des reves </p>
        </div>
    </div>
</div>
 <!--box-->
 <!--box-->
<div class="box">
    <img src="images/sidi.jpg" alt="">
    <div class="content">
        <div>
            <h4>sidi bou said</h4>
            <p> c est le vilage connue par ces couleur bleu et blanc</p>
           
           
        </div>
    </div>
</div>
 <!--box-->
 <!--box-->
<div class="box">
    <img src="images/ouasis.jpg" alt="">
    <div class="content">
        <div>
            <h4>ouasis de touzeur</h4>
            <p> nisi, minima quod, consequuntur rerum quibusdam quia molestias corporis suscipit voluptatum pe asperiores moll</p>
        
        </div>
    </div>
</div>
 <!--box-->
 <!--box-->
<div class="box">
    <img src="images/sahara.jpg" alt="">
    <div class="content">
        <div>
            <h4>sahara</h4>
            <p> fetes une experience innoubliable dans le sahara de tunisie</p>
            
            
        </div>
    </div>
</div>
 <!--box-->
</section>
<!--contact sectoion-->
<section id="contact">
    <h1 class="title">Contact</h1>
    <form action="">
     <div class="left-right">
        <div class="left">
            <label>Nom complet</label>
            <input type="text">
            <label>Objet</label>
            <input type="text">
            <label>Email</label>
            <input type="text">
            <label>Message</label>
            <textarea name="" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="right">
        <label>Numéro</label>
        <input type="text">
        <label>Date</label>
        <input type="text">
        <label>Autres Details</label>
        <input type="text">
        <label>Adresse</label>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.368543067225!2d10.16543731531962!3d36.896319979916084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a3c99a4f23930b%3A0x43e3a128ed46be2!2sLot%2013%2C%20R%C3%A9sidence%20Essalem%20II%2C%20Av.%20Fethi%20Zouhir%2C%20Cebalat%20Ben%20Ammar%2C%202083%20Ariana!5e0!3m2!1sen!2stn!4v1714942951681!5m2!1sen!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>">


    </div>
         </div>
     <button>Envoyer</button>
    </form>
</section>
<footer>
    <p>Réalisé par<span>team name</span> | Tous les droits sont réservés. ©</p> 
</footer>

<script>
    var toggle_menu = document.querySelector('.responsive-menu');
    var menu = document.querySelector('.menu');
    toggle_menu.onclick= function(){
        toggle_menu.classList.toggle('active')
        menu.classList.toggle('responsive')

    }
    
</script>

</body>
</html>