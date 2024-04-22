<?php
require_once '../Controller/ReclamationCrud.php';
require_once '../Model/Reclamation.php';
require_once '../Controller/ReponseCrud.php';
require_once '../Model/Reponse.php';
$rc = new ReclamationCrud();
$list=$rc->readAll();
$list=array_reverse($list);
$rp = new ReponseCrud();   
if (isset($_GET['generatePDF'])) {
   $rp = new ReponseCrud(); // Déplacer l'initialisation de $rp ici
   generatePDF($list, $rp);
}
function generatePDF($list, $rp) {
   // Inclure la bibliothèque TCPDF
   require_once('tcpdf/tcpdf.php');

   // Créer une nouvelle instance de TCPDF
   $pdf = new TCPDF();

   // Ajouter une page au PDF
   $pdf->AddPage();

   // Définir la couleur de la bordure
   $pdf->SetDrawColor(74, 212, 137); // Couleur en RGB : #4AD489

   // Ajouter la bordure à la page
   $pdf->Rect(5, 5, $pdf->getPageWidth() - 10, $pdf->getPageHeight() - 10);

   // Définir la police
   $pdf->SetFont('times', '', 12);

   $pdf->SetFont('times', 'B', 16); // Police en gras, taille 16
   $pdf->SetTextColor(74, 212, 137); // Couleur en RGB : #4AD489
   $pdf->Cell(0, 10, 'Explore beyond: List of Complaints', 0, 1, 'C'); // Centré

   // Réinitialiser la couleur du texte
   $pdf->SetTextColor(0, 0, 0); // Couleur noire par défaut

   // Revenir à la police normale
   $pdf->SetFont('times', '', 12);

   // Ajouter le contenu au PDF (exemple avec la liste des réclamations)
   foreach ($list as $p) {
       $pdf->Cell(0, 10, 'ID: ' . $p['id'] . ', Name: ' . $p['nom'] . ', Email: ' . $p['email'], 0, 1);

       // Ajouter les autres variables au PDF
       $pdf->Cell(0, 10, 'Etat: ' . $p['etat'], 0, 1);
       $pdf->Cell(0, 10, 'Category: ' . $p['category'], 0, 1);
       $pdf->Cell(0, 10, 'Reclamation: ' . $p['reclamation'], 0, 1);

       // Vérifier si $rp est défini avant d'appeler la fonction
       if ($rp !== null) {
           // Ajouter les réponses au PDF
           $reponses = $rp->getReponseByIdReclamation($p['id']);
           if (!empty($reponses)) {
               foreach ($reponses as $reponse) {
                   $pdf->Cell(0, 10, 'Reponse: ' . $reponse['reponse'], 0, 1);
               }
           }
       }
   }

   // Enregistrez le PDF dans un fichier (vous pouvez également utiliser 'I' pour afficher dans le navigateur)
   ob_clean(); // Nettoie le tampon de sortie
   $pdf->Output('reclamations.pdf', 'D');
   exit(); // Assurez-vous de quitter le script après avoir généré le PDF
}
?>

<!DOCTYPE html>

<html lang="en">
   
   <head>

      <!--fin script-->
      <meta charset="utf-8">
      <title>ADMIN - COMPLAINTS</title>
      <link rel="icon" href="https://i.ibb.co/hB9fBx1/376504141-224121517218350-4545070668865803371-n.png" sizes="64x64">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
  



      <style type="text/css">
      body {
    color: red; /* Light mode text color */
  }

  table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
  }

  th, td {
    border: 1px solid #e5e5e5;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: red;
    color: #fff; /* Light mode text color for table headers */
  }

  /* Add dark mode styles */
  body.dark-mode {
    background-color: #1a1a1a !important; /* Dark background color */
      /* Dark mode text color */
  }

  table.dark-mode {
    border-color: #ffffff !important; /* Dark mode border color for table */
  }

  th.dark-mode {
    background-color: red !important; /* Dark mode background color for table headers */
    color: #red !important; /* Dark mode text color for table headers */
  }

  td.dark-mode {
    background-color: #2a2a2a !important; /* Dark mode background color for table cells */
    border-color: #ffffff !important; /* Dark mode border color for table cells */
    color: #ffffff !important; /* Dark mode text color for table cells */
  }
  #darkModeToggle {
  border: 1px solid #e5e5e5;
  border-radius: 20px;
  background-color: red;
  color: #fff !important;
  transition: background-color 0.3s ease, color 0.3s ease;
  font-size: 20px; /* Adjust the font size to make the button slightly larger */
  padding: 10px 20px; /* Adjust padding for more spacing around text */
}

#darkModeToggle:hover {
  background-color: #fff !important;
  color: #4AD489 !important;
}



 
   html,
         body {
            height: 100%;
         }

         .container-fluid {
            height: 100%;
         }

         .row {
            height: 100%;
         }

         /* Adjust the styles of the left navigation bar */
         .col-12.col-lg-auto.mb-3 {
            min-width: 250px;
            max-width: 200px;
            height: 100%;
            position: fixed; /* Add this line to fix the position */
            background-color: red;
            
         }

         .col {
            margin-left: 150px; /* Adjust the margin value based on the width of the navbar */
         }

         a {
            color: white !important;
         }

         li {
            border: 1px solid #e5e5e5;
            border-radius: 20px;
            background-color: red;
            color: red !important;
         }

         .active {
            background-color: red !important;
            border-radius: 20px;
         }
         .activebuttom {
            color: cyan !important;
            background-color:red !important;
            border-radius: 20px;

         }
         .nav-item:hover {
            color: cyan !important;
            background-color: #red !important;
            border-radius: 20px;    }

    .nav-link:hover {
      color: cyan !important;
            background-color: #4AD489 !important;
            border-radius: 20px;    }
  #generatePDFButton {
  border: 1px solid #e5e5e5;
  border-radius: 20px;
  background-color: red;
  color: #fff !important;
  transition: background-color 0.3s ease, color 0.3s ease;
  font-size: 15px;
  padding: 9px 20px;
  text-decoration: none; /* Ajoutez cette ligne pour supprimer le soulignement du lien */
  display: inline-block; /* Ajoutez cette ligne pour que le lien ait une boîte de modèle en ligne */
}

#generatePDFButton:hover {
  background-color: #fff !important;
  color:red !important;
}
   
      </style>
      </head>

      <body>
         
  
<script>
    document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
   });
</script>

<div class="container-fluid">
            <div class="row">
               <!-- Left Navigation Bar -->
               <div class="col-12 col-lg-auto mb-3">
                  <div class="card p-3 h-100" style="background-color: red ; !important;">
                     <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                           <div style="display: flex; align-items: center; margin-bottom: 0;">
                              <img src="images/logo.png" alt="Logo" style="width: 80px; margin-right: 10px;">
                              <h5 style="margin-left: 0; margin-bottom: 0;">
                              <span style="color: white;"> Dashboard </span><span style="color: white;">Admin</span>
                              </h5>
                           </div>


                           <hr>

                           <li style="width: 270px; margin-bottom:10px;" class="nav-item"><a class="nav-link px-2 activebuttom" href="admin.php"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>List of complaints</span></a></li>
                           
                           <li style="width: 270px; margin-bottom:10px;" class="nav-item"><a class="nav-link px-2 activebuttom" href="contact.php"><i class="fa fa-home mr-1"></i><span>Complaint Space</span></a></li>
                           
                           <li style="width: 270px; margin-bottom:10px;" class="nav-item"><a class="nav-link px-2 activebuttom" href="statis.php"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>statistical claim</span></a></li>
 
                        </ul>
                     </div>
                  </div>
               </div>

         <div class="container-fluid">
            <div class="row">
             
               <!-- Main Content -->
               <div class="col">
                  <div class="e-tabs mb-3 px-3">
                   
                  </div>
                  <div class="row flex-lg-nowrap">
                     <div class="col mb-3">
                        <div class="e-panel card">
                           <div class="card-body">
                            
                           <div class="card-title">
                            <center>  <h1 style="color:red;"class="mr-2"><span>List of complaints</span></h1></center>
                           </div>
                           <div class="e-table">
                              <div class="table-responsive table-lg mt-3">
                              <tbody>
   <?php
      $itemsPerPage = 5; // Adjust the number of items per page as needed
      $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset = ($currentPage - 1) * $itemsPerPage;
      $pagedList = array_slice($list, $offset, $itemsPerPage);

      foreach ($pagedList as $p) {
   ?>
   
   <?php  }?>
</tbody>
<table id="reclamation-table" class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th class="max-width">Name</th>
            <th class="max-width">Number</th>
            <th class="sortable">E-mail</th>
            <th class="sortable">Message</th>
            <th class="sortable">status claim</th>
            <th class="sortable">Date</th>
            <th>Actions</th>
            <th class="sortable">Category</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $itemsPerPage = 5;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        $pagedList = array_slice($list, $offset, $itemsPerPage);

        foreach ($pagedList as $p) {
        ?>
        <tr>
            <td class="text-nowrap align-middle"><?= $p['id']; ?> </td>
            <td class="text-nowrap align-middle"><?= $p['nom']; ?> </td>
            <td class="text-nowrap align-middle"><?= $p['tel']; ?> </td>
            <td class="text-nowrap align-middle"><?= $p['email']; ?></td>
            <td class="text-nowrap align-middle">
                <button class="btn btn-sm btn-outline-secondary badge" type="button" data-toggle="modal"
                    data-target="#user-form-<?= $p['id']; ?>" id="button">See Complaint</button>
            </td>

            <?php
            if (isset($p['etat'])) {
                if ($p['etat'] == '0') {
                    echo '<td class="text-center align-middle"><i class="fa fa-fw text-secondary cursor-pointer fa-toggle-off"></i></td>';
                } else {
                    echo '<td class="text-center align-middle"><i class="fa fa-fw text-secondary cursor-pointer fa-toggle-on" style="color: #4AD489 !important;"></i></td>';
                }
            } else {
                echo '<td class="text-center align-middle">N/A</td>';
            }
            ?>
            <td class="text-nowrap align-middle"><?= isset($p['date']) ? $p['date'] : 'N/A'; ?></td>
             
            <td class="text-center align-middle">
                <div class="btn-group align-top">
                    <?php
                    if (isset($p['etat']) && $p['etat'] == '0') {
                        ?>
                        <button class="btn btn-sm btn-outline-success badge" type="button"
                            data-toggle="modal" onclick="window.location.href='activer.php?act=1&id=<?= $p['id']; ?>'">Resolved</button>
                        <button class="btn btn-sm btn-outline-warning badge" type="button"
                            data-toggle="modal" onclick="window.location.href='activer.php?act=0&id=<?= $p['id']; ?>'"
                            disabled>Unresolved</button>
                        <button class="btn btn-sm btn-outline-danger badge" type="button"
                            onclick="window.location.href='supprimer.php?id=<?= $p['id']; ?>'"><i
                                class="fa fa-trash"></i></button>
                        <?php
                    } else {
                        ?>
                        <button class="btn btn-sm btn-outline-success badge" type="button"
                            data-toggle="modal" onclick="window.location.href='activer.php?act=1&id=<?= $p['id']; ?>'"
                            disabled>Resolved</button>
                        <button class="btn btn-sm btn-outline-warning badge" type="button"
                            data-toggle="modal" onclick="window.location.href='activer.php?act=0&id=<?= $p['id']; ?>'">Unresolved</button>
                        <button class="btn btn-sm btn-outline-danger badge" type="button"
                            onclick="window.location.href='supprimer.php?id=<?= $p['id']; ?>'"><i
                                class="fa fa-trash"></i></button>
                    <?php } ?>
                </div>
            </td>
                     <!-- Ajouter la colonne category -->

            <td class="text-nowrap align-middle"><?= $p['category']; ?></td>
   
        </tr>
        <?php } ?>
    </tbody>
</table>



                                 <nav aria-label="Page navigation">
   <ul class="pagination justify-content-center"> 
      <?php
         $totalPages = ceil(count($list) / $itemsPerPage);

         echo '<nav aria-label="Page navigation example">';
         echo '<ul class="pagination justify-content-center">';

         if ($currentPage > 1) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '"style="background-color: red; color: red;">Previous</a></li>';
         }

         for ($i = 1; $i <= $totalPages; $i++) {
            echo '<li class="page-item ' . ($currentPage == $i ? 'active' : '') . '">';
            echo '<a class="page-link" href="?page=' . $i . '" style="background-color: red; color: red;">' . $i . '</a>';
            echo '</li>';
         }

         if ($currentPage < $totalPages) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '"style="background-color: red; color: red;">Next</a></li>';
         }

         echo '</ul>';
         echo '</nav>';
      ?>
   </ul>
</nav>

                               
                       
                              </div>
                           
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-lg-3 mb-3" style="margin-left:0px;">
                  
                        

                          
                           <div class="e-navlist e-navlist--active-bold">
                              <!-- Add this button inside the navigation bar -->


                              <ul class="nav">
                                 
                                 <li class="nav-item active"><a href="" class="nav-link"><span>All</span>&nbsp;<small>/&nbsp;<?= count($list) ?></small></a></li>
                                 <?php
                                 $count = 0;
                                 foreach ($list as $p) {
                                  if($p['etat'] == '0') {
                                   $count++;
                                  }
                                 }
                                 ?>
                                 <li class="nav-item"><a href="" class="nav-link"><span>Unresolved</span>&nbsp;<small>/&nbsp;<?= $count ?></small></a></li>
                                 <a id="generatePDFButton" href="?generatePDF=1" class="btn btn-primary">Generate PDF</a>
                              </ul>
                           </div>
                           <hr class="my-3">
                        
                        
<button id="darkModeToggle" class="btn btn-sm btn-outline-light badge" onclick="toggleDarkMode()">Dark /Light Mode</button>



                           <hr class="my-3">
                           <br>
                           <div>
                            
                              <div class="form-group">
                              
                                 <div>
                                    <input class="form-control w-100" type="text" placeholder="Search with Name" value="" id="search-name">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div>
                                    <input class="form-control w-100" type="number" placeholder="Search with ID" value="" id="search-id">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div>
                                    <input class="form-control w-100" type="text" placeholder="Search with Number" value="" id="search-num">
                                 </div>
                              </div>
                              <div class="form-group">
                    
                                 <div>
                                    <input class="form-control w-100" type="text" placeholder="Search with E-MAIL" value="" id="search-email">
                                 </div>
                              </div>


<!-- Votre champ de recherche existant -->
<div class="form-group">
   
    <div>
        <input class="form-control w-100" type="text" placeholder="Search by Category" value="" id="search-category">
    </div>
</div>

                           </div>
                           <hr class="my-3">
                           <div class="">


                        </div>
                     </div>
                  </div>
               </div>
               <!-- modifier-->
               <?php
$list2 = $rc->readAll();

foreach ($list2 as $p) {
   $reponces = $rp->getReponseByIdReclamation($p['id']);
  // print_r($reponces);
?>
    <div class="modal fade" role="dialog" tabindex="-1" id="user-form-<?= $p['id']; ?>">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Complaint n°<?=$p['id'];?></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:red;">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="py-1">
                        <form class="form" action="repondre.php?id=<?= $p['id']; ?>" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col" style="margin-left:0px;">
                                            <div class="form-group">
                                                <label style="color:#4AD489;"><h3>Claim :</h3> </label>
                                                <textarea class="form-control" id="nom" name="nom" rows="5" disabled><?= $p['reclamation'] ?></textarea>
                                                <hr>
                                                <?php if ((isset ($reponces))&&(!empty($reponces))) { ?>
                                                <label style="color:#4AD489;"><h5>List of answers:</h5> </label>
                                                   <?php foreach($reponces as $rps) { ?>
                                                <h6> Admin to: <?=$rps['date']?> </h6>
                                                <textarea class="form-control" id="reponse" name="reponse" rows="2" disabled ><?=$rps['reponse'];?></textarea>

                                                   <?php }}?>
                                                <br>
                                                <?php if($p['etat']==0) {?>
                                                <label style="color:#4AD489;"><h5>Response from the administration:</h5> </label>
                                                <textarea class="form-control" id="reponse" name="reponse" rows="5" ></textarea>
                                                <br>
                                                <hr>
                                                <button class="btn btn-success btn-block" type="submit" data-toggle="modal" >Answer</button>

                                                <?php } ?>
                                             </div>
                                        </div>

                                    </div>

                                  
                                   

                                   
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} ?>
<!-- Fin modifier -->


              
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="js/chercher.js"></script>
     
      <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Sélectionnez les champs de recherche et le tableau
        var searchNameInput = document.getElementById("search-name");
        var searchIdInput = document.getElementById("search-id");
        var searchNumInput = document.getElementById("search-num");
        var searchEmailInput = document.getElementById("search-email");
        var searchCategoryInput = document.getElementById("search-category");
        var table = document.getElementById("reclamation-table").getElementsByTagName("tbody")[0];

        // Ajoutez un écouteur d'événement à chaque champ de recherche
        searchNameInput.addEventListener("input", filterTable);
        searchIdInput.addEventListener("input", filterTable);
        searchNumInput.addEventListener("input", filterTable);
        searchEmailInput.addEventListener("input", filterTable);
        searchCategoryInput.addEventListener("input", filterTable);

        function filterTable() {
            var filterName = searchNameInput.value.toUpperCase();
            var filterId = searchIdInput.value.toUpperCase();
            var filterNum = searchNumInput.value.toUpperCase();
            var filterEmail = searchEmailInput.value.toUpperCase();
            var filterCategory = searchCategoryInput.value.toUpperCase();

            for (var i = 0; i < table.rows.length; i++) {
                var row = table.rows[i];
                var name = row.cells[1].textContent.toUpperCase();
                var id = row.cells[0].textContent.toUpperCase();
                var num = row.cells[2].textContent.toUpperCase();
                var email = row.cells[3].textContent.toUpperCase();
                var categoryCell = row.cells[8];
                
                // Vérifiez si la cellule contient un champ de sélection
                var categorySelect = categoryCell.querySelector('select');

                // Récupérez la valeur sélectionnée du champ de sélection
                var category = categorySelect ? categorySelect.options[categorySelect.selectedIndex].text.toUpperCase() : categoryCell.textContent.toUpperCase();

                if (name.includes(filterName) && id.includes(filterId) && num.includes(filterNum) && email.includes(filterEmail) && category.includes(filterCategory)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
    });
</script>
<!-- Add this script at the end of the body tag -->
<script>
  // Function to toggle between dark and light mode
  function toggleDarkMode() {
    // Toggle the dark-mode class on the body element
    document.body.classList.toggle("dark-mode");

    // Optionally, you can save the user's preference in localStorage
    var isDarkMode = document.body.classList.contains("dark-mode");
    localStorage.setItem("darkMode", isDarkMode);
  }

  // Check if the user has a preference for dark mode in localStorage
  var storedDarkMode = localStorage.getItem("darkMode");
  if (storedDarkMode === "true") {
    // If dark mode is preferred, enable it by default
    document.body.classList.add("dark-mode");
  }
</script>


     
   </body>
</html>