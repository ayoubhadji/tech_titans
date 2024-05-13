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
   <title>Famms - Payment Success</title>
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
   <?php include 'C:/xampp/htdocs/web_project/vue/paiement/menu.php'; ?>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="payment-success">
               <h2>Payment Successful!</h2>
               <p>Your payment has been processed successfully.</p>
               <form action="generatepdf.php" method="GET">
    <input type="hidden" name="facture_id" value="<?php echo isset($_GET['facture_id']) ? $_GET['facture_id'] : ''; ?>">
    <input type="hidden" name="reservation_id" value="<?php echo isset($_GET['reservation_id']) ? $_GET['reservation_id'] : ''; ?>">
    <input type="hidden" name="paiement_id" value="<?php echo isset($_GET['paiement_id']) ? $_GET['paiement_id'] : ''; ?>">
    <input type="hidden" name="total" value="<?php echo isset($_GET['total']) ? $_GET['total'] : ''; ?>">
    <input type="hidden" name="date_created" value="<?php echo isset($_GET['date_created']) ? $_GET['date_created'] : ''; ?>">
    <input type="hidden" name="nom" value="<?php echo isset($_GET['nom']) ? $_GET['nom'] : ''; ?>">
    <input type="hidden" name="paiement_date" value="<?php echo isset($_GET['paiement_date']) ? $_GET['paiement_date'] : ''; ?>">
    <button type="submit" class="btn btn-primary">Generate PDF</button>
</form>


            </div>
         </div>
      </div>
   </div>
</body>
</html>
