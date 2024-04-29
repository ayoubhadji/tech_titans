
        // Fonction de validation appelée lors de la soumission du formulaire
        function va() {
            // Récupération des valeurs des champs
            var nom = document.getElementById("nom").value;
            var prenom = document.getElementById("prenom").value;
            var email = document.getElementById("email").value;
            var code = document.getElementById("code").value;
            var adresse = document.getElementById("adresse").value;
            var numero = document.getElementById("numero").value;

            // Expression régulière pour vérifier si la valeur ne contient que des chiffres
            var numRegExp = /^\d+$/;

            // Expression régulière pour vérifier si la valeur ne contient que des lettres alphabétiques
            var alphaRegExp = /^[A-Za-z]+$/;

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


            if (!alphaRegExp.test(nom)) {
                alert("le nom doit contenir uniquement des lettres alphabétiques.");
                return false;
            }

            if (!alphaRegExp.test(prenom)) {
                alert("Le prenom de carte doit contenir uniquement des lettres alphabétiques.");
                return false;
            }

            // Vérification du Cart Number
            if (!emailRegex.test(email)) {
                alert("le email doit etre sous le forme :xxxxxx@xxxx.xxx ");

                return false;
            }
            if (code.length < 8)) {
                alert("Le code doit etre suppirieur a 8 caratere ");
                return false;
            }
            
            

            // Vérification du Nom
            if (!alphaRegExp.test(adresse)) {
                alert("L'adresse ne doit contenir que des lettres alphabétiques.");
                return false;
            }

            // Vérification du CVC
            if (!numRegExp.test(numero) || numero.length !== 8) {
                alert("Le numero doit être un entier de 8 chiffres.");
                return false;
            }

            // Si toutes les validations réussissent, le formulaire est soumis
            return true;
        }
