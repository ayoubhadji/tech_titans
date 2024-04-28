<?php
class Paiement {
    private ?int $id;
    private ?int $reservation_id;
    private ?float $amount;
    private ?string $payment_date;
    private ?string $card_type;
    private ?string $card_number;
    private ?string $expiry_date;
    private ?string $cvc;

    public function __construct(?int $reservation_id, ?float $amount, ?string $payment_date, ?string $card_type, ?string $card_number, ?string $expiry_date, ?string $cvc) {
        $this->reservation_id = $reservation_id;
        $this->amount = $amount;
        $this->payment_date = $payment_date;
        $this->card_type = $card_type;
        $this->card_number = $card_number;
        $this->expiry_date = $expiry_date;
        $this->cvc = $cvc;
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

    public function getAmount(): ?float {
        return $this->amount;
    }

    public function setAmount(?float $amount): void {
        $this->amount = $amount;
    }

    public function getPaymentDate(): ?string {
        return $this->payment_date;
    }

    public function setPaymentDate(?string $payment_date): void {
        $this->payment_date = $payment_date;
    }

    public function getCardType(): ?string {
        return $this->card_type;
    }

    public function setCardType(?string $card_type): void {
        $this->card_type = $card_type;
    }

    public function getCardNumber(): ?string {
        return $this->card_number;
    }

    public function setCardNumber(?string $card_number): void {
        $this->card_number = $card_number;
    }

    public function getExpiryDate(): ?string {
        return $this->expiry_date;
    }

    public function setExpiryDate(?string $expiry_date): void {
        $this->expiry_date = $expiry_date;
    }

    public function getCvc(): ?string {
        return $this->cvc;
    }

    public function setCvc(?string $cvc): void {
        $this->cvc = $cvc;
    }
}
?>
