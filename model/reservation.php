<?php
class reservation {
    private ?int $idclient =null;
    private ?int $nbrp=null;
    private ?string $destination=null;
    private ?DateTime $dateres=null;
    private ?float $prixt=null;
    

    public function __construct( $idclient=null, $nbrp, $destination, $dateres,$prixt)
    {
        $this->idclient = $idclient;
        $this->nbrp = $nbrp;
        $this->destination = $destination;
        $this->dateres = $dateres;
        $this->prixt = $prixt;
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
    public function getnbrp()
    {
        return $this->nbrp;
    }
    public function setnbrp($nbrp)
    {
        $this->nbrp = $nbrp;

        return $this;
    }
    public function getdestination()
    {
        return $this->destination;
    }
    public function setdestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }
    public function getdateres()
    {
        return $this->dateres;
    }
    public function setdateres($dateres)
    {
        $this->dateres = $dateres;

        return $this;
    }
    public function getprixt()
    {
        return $this->prixt;
    }
    public function setprixt($prixt)
    {
        $this->prixt = $prixt;

        return $this;
    }

}
?>