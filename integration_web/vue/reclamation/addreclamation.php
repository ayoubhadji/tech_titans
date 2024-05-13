<?php
require_once '../../controller/reclamation/ReclamationCrud.php';
require_once '../../model/reclamation/Reclamation.php';
$rc = new ReclamationCrud();
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $tel = $_POST['tel'];
    $category = $_POST['category']; 
    $reclamation = new Reclamation($message, 0, $name, $email, $tel, $category);
    $rc->create($reclamation);
    $rc->sendMailReclamation($name,$email,$message);
    header("Location: contact.php");
      exit();
}
?>
