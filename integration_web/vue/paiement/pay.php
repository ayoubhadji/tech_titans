<!DOCTYPE html>
<html>
<head>
   <!-- Basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="../../images/favicon.png" type="">
   <title>Famms - Fashion HTML Template</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="../../css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="../../css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="../../css/responsive.css" rel="stylesheet" />
   
</head>
<body>
   <?php include 'C:\xampp\htdocs\web_project\vue\paiement\menu.php'; ?>
   <section class="slider_section">
      <div class="slider_bg_box">
         <img src="../../images/az.jpg" alt="">
      </div>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container">
                  <div class="row">
                     <div class="col-md-7 col-lg-6 mx-auto">
                        <div class="detail-box">
                           <h3>Create Payment</h3>
                           <form id="paymentForm" action="process_pay.php" method="post" novalidate>
                              <div class="form-group">
                                 <label for="CartType">Cart Type</label>
                                 <select name="CartType" id="CartType" class="form-control" required>
                                    <option value="carte_bancaire">Carte Bancaire</option>
                                    <option value="Visa">Visa</option>
                                    <option value="MasterCard">MasterCard</option>
                                    <option value="PayPal">PayPal</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="CartNumber">Cart Number</label>
                                 <input type="text" class="form-control" id="CartNumber" name="CartNumber" placeholder="Cart Number" required>
                              </div>
                              <div class="form-group">
                                 <label for="Datedexpiration">Date d'expiration</label>
                                 <input type="date" class="form-control" id="Datedexpiration" name="Datedexpiration" placeholder="Date d'expiration" required>
                              </div>
                              <div class="form-group">
                                 <label for="Cvc">Cvc</label>
                                 <input type="text" class="form-control" id="Cvc" name="Cvc" placeholder="Cvc" required>
                              </div>
                              <a href="by.html" class="btn btn-primary">
    <i class="fas fa-money-bill-wave"></i> Payer
</a>

                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <ol class="carousel-indicators">
               <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
               <li data-target="#customCarousel1" data-slide-to="1"></li>
               <li data-target="#customCarousel1" data-slide-to="2"></li>
            </ol>
         </div>
      </div>
   </section>

   <script>
      // Function to validate CVC input
      function validateCvc(cvc) {
         // CVC should be exactly 3 digits
         return /^\d{3}$/.test(cvc);
      }

      // Function to validate card number input
      function validateCardNumber(cardNumber) {
         // Card number should be exactly 16 digits
         return /^\d{16}$/.test(cardNumber);
      }

      // Function to validate expiration date
      function validateExpirationDate(expirationDate) {
         // Get the current date
         var currentDate = new Date();

         // Parse the expiration date input value
         var inputDate = new Date(expirationDate);

         // Check if the expiration date is greater than the current date
         return inputDate > currentDate;
      }

      // Function to handle form submission
      function validateForm() {
         // Get form inputs
         var cardTypeValue = document.getElementById('CartType').value;
         var cardNumberValue = document.getElementById('CartNumber').value;
         var expirationDateValue = document.getElementById('Datedexpiration').value;
         var cvcValue = document.getElementById('Cvc').value;

         // Array to store error messages
         var errors = [];

         // Validate card number
         if (!validateCardNumber(cardNumberValue)) {
            errors.push('Please enter a valid 16-digit card number.');
         }

         // Validate expiration date
         if (!validateExpirationDate(expirationDateValue)) {
            errors.push('Expiration date must be greater than the current date.');
         }

         // Validate CVC
         if (!validateCvc(cvcValue)) {
            errors.push('Please enter a valid 3-digit CVC.');
         }

         // Check if there are any errors
         if (errors.length > 0) {
            // If there are errors, display an alert with error messages
            alert('Please correct the following errors:\n' + errors.join('\n'));
         } else {
            // If no errors, submit the form
            document.getElementById('paymentForm').submit();
         }
      }
   </script>
</body>
</html>
