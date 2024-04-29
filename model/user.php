<?php

class user 
{
    private ?int $iduser = null;
    private ?string $nom = null;
    private ?string $prenom=null;
    private ?string $email=null;
    private ?string $code=null;
    private ?string $adresse=null;
    private ?string $numero=null;
    

    public function __construct( $iduser=null , $nom, $prenom, $email,$code,$adresse,$numero )
    {
        $this->iduser = (int) $iduser;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->code= $code;
        $this->adresse = $adresse;
        $this->numero = $numero;
    }


    public function getiduser()
    {
        return $this->iduser;
    }
   

    public function getnom()
    {
        return $this->nom;
    }
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    public function getprenom()
    {
        return $this->prenom;
    }
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }
    public function getcode()
    {
        return $this->code;
    }
    public function setcode($code)
    {
        $this->code= $code;

        return $this;
    }
    public function getadresse()
    {
        return $this->adresse;
    }
    public function setadresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
        
    }
    public function getnumero()
    {
        return $this->numero;
    }
    public function setnumero($numero)
    {
        $this->numero = $numero;

        return $this;
        
    }
}
?>