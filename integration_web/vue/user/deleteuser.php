<?php

include 'c:/xampp/htdocs/web_project/controller/user/userc.php';

// Ensure that user ID is provided
echo $_GET["id"];
if(isset($_GET["id"]))
{
    $userc = new userc();
    $userc->deleteuser($_GET["id"]);
    header('Location: listuser.php');
    exit;
} 
else {
    //header('Location: error.php');
    exit;
}
?>
