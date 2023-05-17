<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatRepository::class)]
class Plat
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $titre = null;

  #[ORM\Column(type: Types::TEXT, nullable: true)]
  private ?string $description = null;

  #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
  private ?string $prix = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  private ?\DateTimeInterface $creation = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
  private ?\DateTimeInterface $modification = null;

  #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'plats')]
  #[ORM\JoinColumn(nullable: false)]
  private $categorie = null;

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

  public function getDescription(): ?string
  {
    return $this->description;
  }

  public function setDescription(?string $description): self
  {
    $this->description = $description;

    return $this;
  }

  public function getPrix(): ?string
  {
    return $this->prix;
  }

  public function setPrix(string $prix): self
  {
    $this->prix = $prix;

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

  public function getCategorie(): ?Categorie
  {
    return $this->categorie;
  }

  public function setCategorie(?Categorie $categorie): self
  {
    $this->categorie = $categorie;

    return $this;
  }
}
