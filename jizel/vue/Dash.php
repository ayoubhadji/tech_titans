<?php
require_once '../controller/PublicationCrud.php';
require_once '../model/Publication.php';
require_once '../controller/CommentaireCrud.php';
require_once '../model/Commentaire.php';
$rc = new PublicationCrud();
$list=$rc->AffichertoutR();
$list=array_reverse($list);
$rp = new CommentaireCrud();   



?>


<!DOCTYPE html>

<html lang="en">
   
   <head>

    
      <meta charset="utf-8">
     
     
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

      <style type="">
          html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .container-fluid {
            height: 100%;
            padding-left: 0;
        }

        .row {
            height: 100%;
            margin-left: 0;
        }

        .sidebar {
            min-width: 250px;
            max-width: 200px;
            height: 100%;
            position: fixed;
            background-color: #ff0000;
            padding-top: 20px;
            padding-bottom: 20px;
            text-align: center;
        }

        .sidebar img {
            max-width: 80%;
            margin-bottom: 20px;
        }

        .col {
            margin-left: 250px;
        }

        a {
            color: white !important;
        }

        li {
            border: 1px solid #e5e5e5;
            border-radius: 20px;
            background-color: #ff0000;
            color: #fff !important;
        }

        .active {
            background-color: #ff0000 !important;
            border-radius: 20px;
        }

        .activebuttom {
            color: cyan !important;
            background-color: #ff0000 !important;
            border-radius: 20px;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-item.active .page-link {
            background-color: #ff0000;
            border-color: #e5e5e5;
        }

        .pagination .page-link {
            color: red;
        }
        .btn-group .btn {
            background-color: #ff0000;
            color: #fff;
            border: 1px solid #ff0000;
        }
  /* Ajout des styles pour la table */
  .e-panel.card {
            height: 70vh;
            margin-left: -200px ;
            width: calc(100% - 210px);
            box-sizing: border-box;
        }

        .e-panel.card .card-body {
            height: calc(100% - 20px);
            overflow-y: auto;
        }

        .card-title {
            color: #ff0000;
            text-align: center;


        }
        th {
    background-color: #ff0000; /* Couleur de fond pour les cellules d'en-tête */
    color: white; /* Couleur du texte dans les cellules d'en-tête */
}



     


</style>


     
      </head>
     
      <body>
    
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

         <div class="container-fluid">
            <div class="row">
            <div class="sidebar">
                <img src="logo.png" alt="Explore Beyond">
                <div class="text-center">
                    <button class="button" onclick="window.location.href='Forum_pub.php'">Add Publication</button>
                    <br>
                    <br>
                    <button class="button" onclick="window.location.href='front.php'">Publication Space</button>
                    <br>
                    <br>
                    <button class="button" onclick="window.location.href='stat.php'">Statis Publication</button>
                </div>
            </div>
               <div class="col">
                  <div class="e-tabs mb-3 px-3">
                   
                  </div>
                  <div class="row flex-lg-nowrap">
                     <div class="col mb-3">
                        <div class="e-panel card">
                           <div class="card-body">
                            
                           <div class="card-title">
                              <h2 span style="color red">List of publications</span></h2>
                           </div>
                           <div class="e-table">
                              <div class="table-responsive table-lg mt-3">
                                 <table id="publication-table" class="table table-bordered">
                                    <thead>
                                       <tr>
                                       
                                          <th>ID</th>
                                          <th class="max-width">Title</th>
                                          <th class="sortable">Date</th>
                                           <th>Delete</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          foreach ($list as $p) {
                                          ?>
                                     <?php
      $itemsPerPage = 5; // Adjust the number of items per page as needed
      $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset = ($currentPage - 1) * $itemsPerPage;
      $pagedList = array_slice($list, $offset, $itemsPerPage);
                                          }
      foreach ($pagedList as $p) {
   ?>
                                       <tr>
                                      
                                          <td class="text-nowrap align-middle"><?=$p['id'];?> </td>
                                          <td class="text-nowrap align-middle"><?=$p['nom'];?> </td>
                                           <td class="text-nowrap align-middle"><?=$p['date'];?></td>
                                           <td class="text-center align-middle">
                                             <div class="btn-group align-top">
                                             <?php
if ($p['etat'] == '0') {
    ?>
    <button type="button" onclick="window.location.href='supprimer.php?id=<?= $p['id']; ?>'">
        <i class="fa fa-trash"></i>
    </button>

    <!-- Add the Update button here -->
    <button type="button" onclick="window.location.href='update.php?id=<?= $p['id']; ?>'">
        <i class="fa fa-pencil"></i>
    </button>
    <?php
} else {
    ?>
    <button type="button" onclick="window.location.href='supprimer.php?id=<?= $p['id']; ?>'">
        <i class="fa fa-trash"></i>
    </button>
    <?php
}
?>

                                             </div>
                                          </td>
                                       </tr>
                                      
                                       <?php } ?>
                                        <?php
   $totalPages = ceil(count($list) / $itemsPerPage);

   echo '<nav aria-label="Page navigation example">';
   echo '<ul class="pagination">';

   for ($i = 1; $i <= $totalPages; $i++) {
      echo '<li class="page-item ' . ($currentPage == $i ? 'active' : '') . '">';
      echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
      echo '</li>';
   }

   echo '</ul>';
   echo '</nav>';
?>
                                 </table>
                              </div>
                           
                           </div>
                        </div>
                     </div>
                  </div>
                 
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="js/chercher.js"></script>
      
   




   </body>
</html>