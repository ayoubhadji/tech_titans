<?php
class Evenement {
  private $IdEvenement;
    private $nom;
    private $content;
    private $adresse;
    private $prix;
    private $user;
    private $time;
    private $imageData;
    private $imageType;

    function __construct($nom, $content, $user, $imageData, $imageType,$adresse,$prix) {
      $this->nom = $nom;
      $this->content = $content;
      $this->adresse = $adresse;
      $this->prix = $prix;
      $this->user = $user;
      $this->time = date('Y-m-d H:i:s');
      $this->imageData = $imageData;
      $this->imageType = $imageType;
  }
  function getImageData() {
    return $this->imageData;
}
function getPrix() {
  return $this->prix;
}
function getAdresse() {
  return $this->adresse;
}
public function setAdresse($adresse)
{
    $this->adresse = $adresse;
}
public function setPrix($prix)
{
    $this->prix = $prix;
}
public function setIdEvenement($id)
{
    $this->IdEvenement = $id;
}
function getImageType() {
    return $this->imageType;
}
  
    function getnom() {
        return $this->nom;
      }
  
    function getContent() {
      return $this->content;
    }
  
    function setUser($user) {
      $this->user=$user;
    }
  
    function setTime($time) {
      $this->time=$time;
    }
    function setnom($nom) {
         $this->nom=$nom;
      }
    
      function setContent($content) {
         $this->content=$content;
      }
    
      function getUser() {
        return $this->user;
      }
    
      function getTime() {
         return $this->time;
      }
  }
  

?>