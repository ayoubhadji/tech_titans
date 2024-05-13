<?php
class voyagee {
    private ?int $idvoyage =null;
    private ?string $description=null;
    private ?DateTime $datedepart=null;
    private ?DateTime $dateretour=null;
    private ?int $idclient =null;
   
    

    public function __construct( $idvoyage=null, $description, $datedepart, $dateretour,$idclient)
    {
        $this->idvoyage = $idvoyage;
        $this->description= $description;
        $this->datedepart = $datedepart;
        $this->dateretour = $dateretour;
        $this->idclient = $idclient;
    }


   
    public function getidvoyage()
    {
        return $this->idvoyage;
    }
    public function setidvoyage($idvoyage)
    {
        $this->idvoyage = $idvoyage;

        return $this;
        
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }
    public function getdatedepart()
    {
        return $this->datedepart;
    }
    public function setdatedepart($datedepart)
    {
        $this->datedepart = $datedepart;

        return $this;
    }
    public function getdateretour()
    {
        return $this->dateretour;
    }
    public function setdateretour($dateretour)
    {
        $this->dateretour = $dateretour;

        return $this;
    }
    public function getidclient()
    {
        return $this->idclient;
    }
    public function setidclient($idclient)
    {
        $this->idclient = $idclient;

        return $this;
        
    }

}
?>