<?php
class Reservation {
    private ?int $id;
    private ?int $user_id;
    private ?string $reservation_date;
    private ?string $date_debut;
    private ?string $date_fin;
    private ?float $total;

    public function __construct(?int $user_id, ?string $reservation_date, ?string $date_debut, ?string $date_fin, ?float $total) {
        $this->user_id = $user_id;
        $this->reservation_date = $reservation_date;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->total = $total;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getUserId(): ?int {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): void {
        $this->user_id = $user_id;
    }

    public function getReservationDate(): ?string {
        return $this->reservation_date;
    }

    public function setReservationDate(?string $reservation_date): void {
        $this->reservation_date = $reservation_date;
    }

    public function getDateDebut(): ?string {
        return $this->date_debut;
    }

    public function setDateDebut(?string $date_debut): void {
        $this->date_debut = $date_debut;
    }

    public function getDateFin(): ?string {
        return $this->date_fin;
    }

    public function setDateFin(?string $date_fin): void {
        $this->date_fin = $date_fin;
    }

    public function getTotal(): ?float {
        return $this->total;
    }

    public function setTotal(?float $total): void {
        $this->total = $total;
    }
}

?>
