<?php
class Facture {
    private ?int $id;
    private ?int $reservation_id;
    private ?int $paiement_id;
    private ?float $total;
    private ?string $date_created;

    public function __construct(?int $reservation_id, ?int $paiement_id, ?float $total, ?string $date_created) {
       
        $this->reservation_id = $reservation_id;
        $this->paiement_id = $paiement_id;
        $this->total = $total;
        $this->date_created = $date_created;
    }
    
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getReservationId(): ?int {
        return $this->reservation_id;
    }

    public function setReservationId(?int $reservation_id): void {
        $this->reservation_id = $reservation_id;
    }

    public function getPaiementId(): ?int {
        return $this->paiement_id;
    }

    public function setPaiementId(?int $paiement_id): void {
        $this->paiement_id = $paiement_id;
    }

    public function getTotal(): ?float {
        return $this->total;
    }

    public function setTotal(?float $total): void {
        $this->total = $total;
    }

    public function getDateCreated(): ?string {
        return $this->date_created;
    }

    public function setDateCreated(?string $date_created): void {
        $this->date_created = $date_created;
    }
}


?>