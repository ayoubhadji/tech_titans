<?php
class Avis {
  private $user;
    private $avis;

    private $time;
    private $IdEvenement;

    function __construct($user, $avis,$IdEvenement) {
      $this->avis = $avis;
      $this->user = $user;
      $this->time = date('Y-m-d H:i:s'); // current date and time in MySQL format
      $this->IdEvenement=$IdEvenement;
    }
  
    function getavis() {
      return $this->avis;
    }
    function setavis($avis) {
       $this->avis=$avis;
      }
    function getIdEvenement() {
        return $this->IdEvenement;
      }

    function setUser($user) {
      $this->user=$user;
    }
  
    function setTime($time) {
      $this->time=$time;
    }
    function setIdEvenement($IdEvenement) {
         $this->IdEvenement=$IdEvenement;
      }
    

    
      function getUser() {
        return $this->user;
      }
    
      function getTime() {
         return $this->time;
      }
  }
  

?>