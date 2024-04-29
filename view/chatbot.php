<!doctype html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/fonts/flaticon.css">
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/theme-dark.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+icons+sharp">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <style>
        #chat-container {
    background-color: #f5f5f5;
    border-radius: 10px;
    padding: 20px;
    max-width: 600px;
    margin: 0 auto;
    margin-top: 50px;
}

#chat {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.user-message {
    background-color: #dcf8c6;
    padding: 10px;
    border-radius: 10px;
    max-width: 70%;
}

.user-message:hover {
    background-color: #d1f5b8;
}

.bot-message {
    background-color: #e5f3ff;
    padding: 10px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.bot-message:hover {
    background-color: #d5e8ff;
}

.bot-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #007bff;
    display: flex;
    align-items: center;
    justify-content: center;
}

.bot-avatar i {
    color: #fff;
    font-size: 24px;
}

#options {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 10px;
}

#options button {
    background-color: #Ffa500;
    padding: 10px;
    border-radius: 10px;
    flex-basis: calc(20% - 10px);
}

#options button:hover {
    background-color: #d1f5b8;
}
.chat-container {
            background-color: #ffffff;
            border-radius: 30px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            margin-top: 50px;
        }
        .button-container {
            position: absolute;
            top: 20px; /* Adjust this value to give space from the top */
            left: 50%;
            transform: translateX(-50%);
        }

        .button {
            background-color: #ff5722; /* New color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(255, 87, 34, 0.1); /* New shadow color */
        }

        .button:hover {
            background-color: #e64a19; /* Darker color on hover */
        }


</style>
</head>

<body>

    <div class="button-container">

<button onclick="window.location.href = 'EvenementPanel.php';">Go to Evenement Panel</button>

</div>

   

<div class="chat-container">
    <section class="shop-detls ptb-100">
        <center><h1>Chatbot</h1></center>
        <div id="chat-container">
    <div id="chat"></div>
    <div id="options">
      <!--  <button id="option-hello">Hello</button> -->
        <button id="option-products">bonjour</button>
        <button id="option-order">événements</button>
        <button id="option-discounts">moyens de paiement</button>
        <button id="option-help">hébergement</button>
        <button id="option-scuba">visites guidées</button>

    </div>
   <center> <input type="text" id="user-input" placeholder="Ecrire ici..."></center>
</div>
    </section>

</div>
    

  

    <script>
        // Chatbot function
function botResponse(message) {
    var chat = document.getElementById("chat");
    var botMessage = document.createElement("div");
    botMessage.classList.add("bot-message");
    var botAvatar = document.createElement("div");
    botAvatar.classList.add("bot-avatar");
    botAvatar.innerHTML = `<i class="fas fa-robot"></i>`;
    botMessage.appendChild(botAvatar);
    var messageElement = document.createElement("div");
    messageElement.classList.add("message");
    messageElement.innerText = message;
    botMessage.appendChild(messageElement);
    chat.appendChild(botMessage);
}

function handleUserInput() {
    var input = document.getElementById("user-input").value.toLowerCase();
    var response = "";

    switch (input) {
    // Prompts existants
    case "bonjour":
        response = "Bonjour ! Comment puis-je vous aider aujourd'hui ?";
        break;
    case "comment ca va":
        response = "Je suis juste un robot, mais merci de demander !";
        break;
    case "quel est ton nom ?":
        response = "Je suis juste un robot, donc je n'ai pas de nom !";
        break;
    case "au revoir":
        response = "Au revoir ! Bonne journée !";
        break;
    case "aide":
        response = "Bien sûr, voici quelques choses que vous pouvez me demander :\n- Quels événements sont prévus en Tunisie ?\n- Quels sont les sites touristiques populaires en Tunisie ?\n- Comment puis-je réserver un voyage en Tunisie ?\n- Avez-vous des offres spéciales pour les voyages en Tunisie ?";
        break;
    case "événements":
        response = "Voici quelques événements à venir en Tunisie :\n- Festival International de Carthage\n- Festival de la Médina de Tunis\n- Festival de Jazz de Tabarka\n- Festival du Sahara à Douz\n- Festival International de Hammamet\nCes événements offrent une expérience culturelle riche et diversifiée !";
        break;
    case "sites touristiques":
        response = "La Tunisie regorge de sites touristiques fascinants, notamment :\n- Les ruines de Carthage\n- Le site archéologique de Dougga\n- La médina de Tunis\n- Le musée du Bardo\n- Les plages de Sousse\nCes endroits offrent une expérience unique pour les visiteurs !";
        break;
    case "réservation":
        response = "Pour réserver un voyage en Tunisie, vous pouvez contacter notre agence de voyage tunisienne au +216-XX-XXX-XXX ou envoyer un e-mail à contact@voyagetunisie.com. Nous serons ravis de vous aider à planifier votre séjour !";
        break;
    case "offres spéciales":
        response = "Nous proposons régulièrement des offres spéciales pour les voyages en Tunisie, notamment des réductions sur les forfaits tout compris, des séjours prolongés et des visites guidées gratuites. Assurez-vous de consulter notre site Web ou de nous contacter pour les dernières offres !";
        break;
    
    // Prompts supplémentaires
    case "moyens de paiement":
        response = "Nous acceptons divers moyens de paiement, notamment les cartes de crédit/débit (Visa, Mastercard, American Express), PayPal et les virements bancaires. Vous pouvez choisir l'option de paiement qui vous convient le mieux lors de la réservation.";
        break;
    case "visites guidées":
        response = "Nous proposons des visites guidées personnalisées pour découvrir les merveilles de la Tunisie en compagnie de guides expérimentés. Que vous souhaitiez explorer les sites historiques, les oasis du désert ou les villes côtières, nous avons une visite pour vous !";
        break;
    case "location de voitures":
        response = "Si vous avez besoin d'une voiture pour explorer la Tunisie à votre rythme, nous proposons également des services de location de voitures avec une gamme de véhicules adaptés à vos besoins. Contactez-nous pour réserver votre voiture dès maintenant !";
        break;
    case "hébergement":
        response = "Que vous recherchez un hôtel luxueux, une villa privée ou un hébergement économique, notre agence de voyage tunisienne peut vous aider à trouver l'hébergement parfait pour votre séjour en Tunisie. Faites-nous savoir vos préférences et nous nous occuperons du reste !";
        break;
    case "circuit touristique":
        response = "Découvrez la beauté et la diversité de la Tunisie avec nos circuits touristiques soigneusement conçus. De l'exploration des vestiges antiques à la découverte des oasis cachées, nos circuits offrent une expérience inoubliable pour tous les voyageurs !";
        break;
    default:
        response = "Désolé, je n'ai pas compris votre demande.";
}



    // Add bot response to the chat
    botResponse(response);

    // Clear user input field
    document.getElementById("user-input").value = "";
}

function handleOptionClick(event) {
    var input = event.target.innerText.toLowerCase();
    document.getElementById("user-input").value = input;
    handleUserInput();
}

var options = document.querySelectorAll("#options button");
options.forEach(function(option) {
    option.addEventListener("click", handleOptionClick);
});

document.getElementById("user-input").addEventListener("keypress", function(e) {
    if (e.key === "Enter") {
        handleUserInput();
    }
});
    </script>

</body>

</html>
