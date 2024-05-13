
        function va() {

            var idclient = document.getElementById("idclient").value;
            var nbrp = document.getElementById("nbrp").value;
            var destination = document.getElementById("destination").value;
            var dateres = document.getElementById("dateres").value;
            var prixt = document.getElementById("prixt").value;

            var numRegExp = /^\d+$/;

            var alphaRegExp = /^[A-Za-z]+$/;

            var dateRegExp = /^\d{4}-\d{2}-\d{2}$/;

            if (!numRegExp.test(prixt)) {
                alert("Le prix total ne doit contenir que des chiffres.");
                return false;
            }

            if (!alphaRegExp.test(destination)) {
                alert("La destination doit contenir uniquement des lettres alphabétiques.");
                return false;
            }

            
            if (!numRegExp.test(idclient) || cartNumber.length !== 8) {
                alert("L id doit être une chaîne numérique de 8 chiffres.");
                return false;
            }

            var currentDate = new Date();
            if (dateres <= currentDate.toISOString().slice(0, 10)) {
                alert("La date de reservation doit être supérieure à la date actuelle.");
                return false;
            }

            if (!numRegExp.test(nbrp) || cvc.length !== 1) {
                alert("Le nbrp doit être un entier de 1 chiffre.");
                return false;
            }

            return true;
        }
