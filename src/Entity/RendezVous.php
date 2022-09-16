<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $poids = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $examunGeneral = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $vaccinCommentaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vaccinLot = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $vaccinExp = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $antiParasitaire = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $TomorowDate = null;

    #[ORM\Column]
    private ?bool $reminder = null;

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

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getExamunGeneral(): ?string
    {
        return $this->examunGeneral;
    }

    public function setExamunGeneral(?string $examunGeneral): self
    {
        $this->examunGeneral = $examunGeneral;

        return $this;
    }

    public function getVaccinCommentaire(): ?string
    {
        return $this->vaccinCommentaire;
    }

    public function setVaccinCommentaire(?string $vaccinCommentaire): self
    {
        $this->vaccinCommentaire = $vaccinCommentaire;

        return $this;
    }

    public function getVaccinLot(): ?string
    {
        return $this->vaccinLot;
    }

    public function setVaccinLot(?string $vaccinLot): self
    {
        $this->vaccinLot = $vaccinLot;

        return $this;
    }

    public function getVaccinExp(): ?\DateTimeInterface
    {
        return $this->vaccinExp;
    }

    public function setVaccinExp(?\DateTimeInterface $vaccinExp): self
    {
        $this->vaccinExp = $vaccinExp;

        return $this;
    }

    public function getAntiParasitaire(): ?string
    {
        return $this->antiParasitaire;
    }

    public function setAntiParasitaire(?string $antiParasitaire): self
    {
        $this->antiParasitaire = $antiParasitaire;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getTomorowDate(): ?\DateTimeInterface
    {
        return $this->TomorowDate;
    }

    public function setTomorowDate(?\DateTimeInterface $TomorowDate): self
    {
        $this->TomorowDate = $TomorowDate;

        return $this;
    }

    public function isReminder(): ?bool
    {
        return $this->reminder;
    }

    public function setReminder(bool $reminder): self
    {
        $this->reminder = $reminder;

        return $this;
    }
}
