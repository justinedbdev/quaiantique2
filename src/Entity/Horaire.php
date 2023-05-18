<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 10)]
  private ?string $jour = null;

  #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
  private ?\DateTimeInterface $ouverture_midi = null;

  #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
  private ?\DateTimeInterface $fermeture_midi = null;

  #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
  private ?\DateTimeInterface $ouverture_soir = null;

  #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
  private ?\DateTimeInterface $fermeture_soir = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  private ?\DateTimeInterface $creation = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
  private ?\DateTimeInterface $modification = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getJour(): ?string
  {
    return $this->jour;
  }

  public function setJour(string $jour): self
  {
    $this->jour = $jour;

    return $this;
  }

  public function getOuvertureMidi(): ?\DateTimeInterface
  {
    return $this->ouverture_midi;
  }

  public function setOuvertureMidi(?\DateTimeInterface $ouverture_midi): self
  {
    $this->ouverture_midi = $ouverture_midi;

    return $this;
  }

  public function getFermetureMidi(): ?\DateTimeInterface
  {
    return $this->fermeture_midi;
  }

  public function setFermetureMidi(?\DateTimeInterface $fermeture_midi): self
  {
    $this->fermeture_midi = $fermeture_midi;

    return $this;
  }

  public function getOuvertureSoir(): ?\DateTimeInterface
  {
    return $this->ouverture_soir;
  }

  public function setOuvertureSoir(?\DateTimeInterface $ouverture_soir): self
  {
    $this->ouverture_soir = $ouverture_soir;

    return $this;
  }

  public function getFermetureSoir(): ?\DateTimeInterface
  {
    return $this->fermeture_soir;
  }

  public function setFermetureSoir(?\DateTimeInterface $fermeture_soir): self
  {
    $this->fermeture_soir = $fermeture_soir;

    return $this;
  }

  public function getCreation(): ?\DateTimeInterface
  {
    return $this->creation;
  }

  public function setCreation(\DateTimeInterface $creation): self
  {
    $this->creation = $creation;

    return $this;
  }

  public function getModification(): ?\DateTimeInterface
  {
    return $this->modification;
  }

  public function setModification(?\DateTimeInterface $modification): self
  {
    $this->modification = $modification;

    return $this;
  }

  public function getFormattedOuvertureMidi(): ?string
  {
    return $this->ouverture_midi ? $this->ouverture_midi->format('H:i') : null;
  }

  public function getFormattedFermetureMidi(): ?string
  {
    return $this->fermeture_midi ? $this->fermeture_midi->format('H:i') : null;
  }

  public function getFormattedOuvertureSoir(): ?string
  {
    return $this->ouverture_soir ? $this->ouverture_soir->format('H:i') : null;
  }

  public function getFormattedFermetureSoir(): ?string
  {
    return $this->fermeture_soir ? $this->fermeture_soir->format('H:i') : null;
  }
}
