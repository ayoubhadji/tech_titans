<?php

include 'c:/xampp/htdocs/projetvoyage/controller/userc.php';

// Ensure that user ID is provided
if(isset($_GET["iduser"]))
{
    $userc = new userc();
    $userc->deleteuser($_GET["iduser"]);
    header('Location: listuser.php');
    exit;
} 
else {
    header('Location: error.php');
    exit;
}
?>
