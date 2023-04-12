<?php

namespace App\Entity;

use App\Repository\ArtiestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtiestRepository::class)]
class Artiest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 50)]
    private ?string $naam;

    #[ORM\Column(length: 50)]
    private ?string $genre = null;

    #[ORM\Column(length: 100)]
    private ?string $omschrijving = null;

    #[ORM\Column(length: 100)]
    private ?string $afbeelding_url = null;

    #[ORM\Column(length: 100)]
    private ?string $website = null;

    #[ORM\ManyToOne(inversedBy: 'artiest')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Optreden $artiest = null;

    #[ORM\ManyToOne(inversedBy: 'voorprogramma')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Optreden $voorprogramma = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getAfbeeldingUrl(): ?string
    {
        return $this->afbeelding_url;
    }

    public function setAfbeeldingUrl(string $afbeelding_url): self
    {
        $this->afbeelding_url = $afbeelding_url;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getArtiest(): ?Optreden
    {
        return $this->artiest;
    }

    public function setArtiest(?Optreden $artiest): self
    {
        $this->artiest = $artiest;

        return $this;
    }

    public function getVoorprogramma(): ?Optreden
    {
        return $this->voorprogramma;
    }

    public function setVoorprogramma(?Optreden $voorprogramma): self
    {
        $this->voorprogramma = $voorprogramma;

        return $this;
    }
}