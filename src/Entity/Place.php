<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 150)]
    private ?string $rue = null;

    #[ORM\Column]
    private ?float $latitude = null;

    #[ORM\Column]
    private ?float $longitude = null;

    #[ORM\ManyToOne(inversedBy: 'places')]
    private ?City $city = null;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: GoOut::class)]
    private Collection $goOuts;

    public function __construct()
    {
        $this->goOuts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection<int, GoOut>
     */
    public function getGoOuts(): Collection
    {
        return $this->goOuts;
    }

    public function addGoOut(GoOut $goOut): self
    {
        if (!$this->goOuts->contains($goOut)) {
            $this->goOuts->add($goOut);
            $goOut->setPlace($this);
        }

        return $this;
    }

    public function removeGoOut(GoOut $goOut): self
    {
        if ($this->goOuts->removeElement($goOut)) {
            // set the owning side to null (unless already changed)
            if ($goOut->getPlace() === $this) {
                $goOut->setPlace(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
    
}
