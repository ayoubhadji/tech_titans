
        // Fonction de validation appelée lors de la soumission du formulaire
        function va() {
            // Récupération des valeurs des champs
            var Nom = document.getElementById("Nom").value;
            var quantite = document.getElementById("quantite").value;
            var prix = document.getElementById("prix").value;
            var date_debut = document.getElementById("date_debut").value;
            var date_fin = document.getElementById("date_fin").value;


            // Expression régulière pour vérifier si la valeur ne contient que des chiffres
            var numRegExp = /^\d+$/;

            // Expression régulière pour vérifier si la valeur ne contient que des lettres alphabétiques
            var alphaRegExp = /^[A-Za-z]+$/;

            // Expression régulière pour vérifier le format de la date (AAAA-MM-JJ)
            var dateRegExp = /^\d{4}-\d{2}-\d{2}$/;
             // Vérification du Nom
             if (!alphaRegExp.test(Nom)) {
                alert("Le Nom ne doit contenir que des lettres alphabétiques.");
                return false;
            }
            // Vérification du quantite
            if (!numRegExp.test(quantite) || quantite.length !== 1) {
                alert("Le numéro de carte doit être une chaîne numérique de 1 chiffres.");
                return false;
            }
             // Vérification du prix
             if (!numRegExp.test(prix)) {
                alert("Le prix ne doit contenir que des chiffres.");
                return false;
            }
            // Vérification de la date_debut
            var currentDate = new Date();
            if (date_debut <= currentDate.toISOString().slice(0, 10)) {
                alert("La date_debut doit être supérieure à la date actuelle.");
                return false;
            }
             // Vérification de la date_fin
             var date_fin = new Date();
             if (expirationDate <= currentDate.toISOString().slice(0, 10)) {
                 alert("La date_fin doit être supérieure à la date actuelle.");
                 return false;
             }

           

           

            // Si toutes les validations réussissent, le formulaire est soumis
            return true;
        }
