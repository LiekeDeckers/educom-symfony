<?php

namespace App\Entity;

use App\Repository\OptredenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptredenRepository::class)]
class Optreden
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\ManyToOne(inversedBy: 'podium')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Poppodium $poppodium = null;

    #[ORM\OneToMany(mappedBy: 'artiest', targetEntity: artiest::class)]
    private Collection $artiest;

    #[ORM\OneToMany(mappedBy: 'voorprogramma', targetEntity: artiest::class)]
    private Collection $voorprogramma;

    #[ORM\Column(length: 100)]
    private ?string $omschrijving = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datum = null;

    #[ORM\Column]
    private ?int $prijs = null;

    #[ORM\Column(length: 100)]
    private ?string $ticket_url = null;

    #[ORM\Column(length: 100)]
    private ?string $afbeelding_url = null;

    public function __construct()
    {
        $this->artiest = new ArrayCollection();
        $this->voorprogramma = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoppodium(): ?Poppodium
    {
        return $this->poppodium;
    }

    public function setPoppodium(?Poppodium $poppodium): self
    {
        $this->poppodium = $poppodium;

        return $this;
    }

    /**
     * @return Collection<int, artiest>
     */
    public function getArtiest(): Collection
    {
        return $this->artiest;
    }

    public function addArtiest(artiest $artiest): self
    {
        if (!$this->artiest->contains($artiest)) {
            $this->artiest->add($artiest);
            $artiest->setArtiest($this);
        }

        return $this;
    }

    public function removeArtiest(artiest $artiest): self
    {
        if ($this->artiest->removeElement($artiest)) {
            // set the owning side to null (unless already changed)
            if ($artiest->getArtiest() === $this) {
                $artiest->setArtiest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, artiest>
     */
    public function getVoorprogramma(): Collection
    {
        return $this->voorprogramma;
    }

    public function addVoorprogramma(artiest $voorprogramma): self
    {
        if (!$this->voorprogramma->contains($voorprogramma)) {
            $this->voorprogramma->add($voorprogramma);
            $voorprogramma->setVoorprogramma($this);
        }

        return $this;
    }

    public function removeVoorprogramma(artiest $voorprogramma): self
    {
        if ($this->voorprogramma->removeElement($voorprogramma)) {
            // set the owning side to null (unless already changed)
            if ($voorprogramma->getVoorprogramma() === $this) {
                $voorprogramma->setVoorprogramma(null);
            }
        }

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

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getPrijs(): ?int
    {
        return $this->prijs;
    }

    public function setPrijs(int $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }

    public function getTicketUrl(): ?string
    {
        return $this->ticket_url;
    }

    public function setTicketUrl(string $ticket_url): self
    {
        $this->ticket_url = $ticket_url;

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
}
