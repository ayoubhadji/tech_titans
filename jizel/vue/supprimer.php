<?php 

if(isset($_GET['id'])) {

 include_once '../config.php';
 include_once '../controller/PublicationCrud.php';
$rc = new PublicationCrud();

$rc->delete($_GET['id']);
  
  header("location: Dash.php"); 
 exit(); 
}
