<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $titre = null;

  #[ORM\Column(length: 255)]
  private ?string $lien = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  private ?\DateTimeInterface $creation = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
  private ?\DateTimeInterface $modification = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getTitre(): ?string
  {
    return $this->titre;
  }

  public function setTitre(string $titre): self
  {
    $this->titre = $titre;

    return $this;
  }

  public function getLien(): ?string
  {
    return $this->lien;
  }

  public function setLien(string $lien): self
  {
    $this->lien = $lien;

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
}
