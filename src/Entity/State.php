<?php

namespace App\Entity;

use App\Repository\StateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StateRepository::class)]
class State
{

    const ETAT_CREE = 'Créée';
    const ETAT_OUVERT = 'Ouverte';
    const ETAT_CLOTURE = 'Clôturée';
    const ETAT_EN_COURS = 'Activité en cours';
    const ETAT_PASSE = 'Activité passée';
    const ETAT_ANNULE = 'Activité annulée';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'state', targetEntity: GoOut::class, orphanRemoval: true)]
    private Collection $goOuts;

    public function __construct()
    {
        $this->goOuts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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
            $goOut->setState($this);
        }

        return $this;
    }

    public function removeGoOut(GoOut $goOut): self
    {
        if ($this->goOuts->removeElement($goOut)) {
            // set the owning side to null (unless already changed)
            if ($goOut->getState() === $this) {
                $goOut->setState(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->libelle;
    }
}
