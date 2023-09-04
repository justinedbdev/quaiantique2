<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    #[Assert\GreaterThanOrEqual(1)]
    private ?int $nb_couvert = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $nom_reservation = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $prenom_reservation = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email]
    #[Assert\NotBlank]
    private ?string $email_reservation = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?int $telephone_reservation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $allergie_reservation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNbCouvert(): ?int
    {
        return $this->nb_couvert;
    }

    public function setNbCouvert(int $nb_couvert): self
    {
        $this->nb_couvert = $nb_couvert;

        return $this;
    }

    public function getNomReservation(): ?string
    {
        return $this->nom_reservation;
    }

    public function setNomReservation(string $nom_reservation): self
    {
        $this->nom_reservation = $nom_reservation;

        return $this;
    }

    public function getPrenomReservation(): ?string
    {
        return $this->prenom_reservation;
    }

    public function setPrenomReservation(string $prenom_reservation): self
    {
        $this->prenom_reservation = $prenom_reservation;

        return $this;
    }

    public function getEmailReservation(): ?string
    {
        return $this->email_reservation;
    }

    public function setEmailReservation(string $email_reservation): self
    {
        $this->email_reservation = $email_reservation;

        return $this;
    }

    public function getTelephoneReservation(): ?int
    {
        return $this->telephone_reservation;
    }

    public function setTelephoneReservation(int $telephone_reservation): self
    {
        $this->telephone_reservation = $telephone_reservation;

        return $this;
    }

    public function getAllergieReservation(): ?string
    {
        return $this->allergie_reservation;
    }

    public function setAllergieReservation(?string $allergie_reservation): self
    {
        $this->allergie_reservation = $allergie_reservation;

        return $this;
    }
}
