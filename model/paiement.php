<?php
class paiement {
    private ?string $Nom = null;
    private ?string $CartNumber=null;
    private ?float $PrixTotal=null;
    private ?string $Cartetype=null;
    private ?int $Cvc=null;
    private ?int $idpaiement =null;
    private ?DateTime $Datedexpiration=null;

    

    public function __construct( $PrixTotal, $Cartetype, $CartNumber, $Datedexpiration,$Nom,$Cvc,$idpaiement =null )
    {
        $this->PrixTotal = $PrixTotal;
        $this->Cartetype = $Cartetype;
        $this->CartNumber = $CartNumber;
        $this->Datedexpiration = $Datedexpiration;
        $this->Nom = $Nom;
        $this->Cvc = $Cvc;
        $this->idpaiement = $idpaiement;
    }


    public function getPrixTotal()
    {
        return $this->PrixTotal;
    }
    public function setPrixTotal($PrixTotal)
    {
        $this->PrixTotal = $PrixTotal;

        return $this;
    }

    public function getCartetype()
    {
        return $this->Cartetype;
    }
    public function setCartetype($Cartetype)
    {
        $this->Cartetype = $Cartetype;

        return $this;
    }
    public function getCartNumber()
    {
        return $this->CartNumber;
    }
    public function setCartNumber($CartNumber)
    {
        $this->CartNumber = $CartNumber;

        return $this;
    }
    public function getDatedexpiration()
    {
        return $this->Datedexpiration;
    }
    public function setDatedexpiration($Datedexpiration)
    {
        $this->Datedexpiration = $Datedexpiration;

        return $this;
    }
    public function getNom()
    {
        return $this->Nom;
    }
    public function setNom($Nom)
    {
        $this->Nom = $Nom;

        return $this;
    }
    public function getCvc()
    {
        return $this->Cvc;
    }
    public function setCvc($Cvc)
    {
        $this->Cvc = $Cvc;

        return $this;
        
    }
    public function getidpaiement()
    {
        return $this->idpaiement;
    }
    public function setidpaiement($idpaiement)
    {
        $this->idpaiement = $idpaiement;

        return $this;
        
    }
}
?>