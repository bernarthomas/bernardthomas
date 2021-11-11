<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use \DateTimeInterface;
use \DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CultureRepository")
 */
class Culture extends Generique
{
    /**
     * @var string|null
     * @ORM\Column(type="string", length=30)
     */
    private $libelle;

    /**
     * @var ArrayCollection|Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Recolte", mappedBy="culture")
     */
    private $recoltes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AchatNourriture", mappedBy="culture")
     */
    private $achatsNourriture;

    /**
     * Culture constructor.
     */
    public function __construct()
    {
        $this->id = null;
        $this->actif = null;
        $this->dateCreation = new DateTime();
        $this->dateDerniereMaj = null;
        $this->libelle = null;
        $this->recoltes = new ArrayCollection();
        $this->achatsNourriture = new ArrayCollection();
    }

    /**
     * @return string|null
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     *
     * @return $this
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Recolte[]
     */
    public function getRecoltes(): Collection
    {
        return $this->recoltes;
    }

    /**
     * @param Recolte $recolte
     *
     * @return $this
     */
    public function addRecolte(Recolte $recolte): self
    {
        if (!$this->recoltes->contains($recolte)) {
            $this->recoltes[] = $recolte;
            $recolte->setCulture($this);
        }

        return $this;
    }

    /**
     * @param Recolte $recolte
     *
     * @return $this
     */
    public function removeRecolte(Recolte $recolte): self
    {
        if ($this->recoltes->contains($recolte)) {
            $this->recoltes->removeElement($recolte);
            // set the owning side to null (unless already changed)
            if ($recolte->getCulture() === $this) {
                $recolte->setCulture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AchatNourriture[]
     */
    public function getAchatsNourriture(): Collection
    {
        return $this->achatsNourriture;
    }

    /**
     * @param AchatNourriture $achatsNourriture
     *
     * @return $this
     */
    public function addAchatsNourriture(AchatNourriture $achatsNourriture): self
    {
        if (!$this->achatsNourriture->contains($achatsNourriture)) {
            $this->achatsNourriture[] = $achatsNourriture;
            $achatsNourriture->setCulture($this);
        }

        return $this;
    }

    /**
     * @param AchatNourriture $achatsNourriture
     *
     * @return $this
     */
    public function removeAchatsNourriture(AchatNourriture $achatsNourriture): self
    {
        if ($this->achatsNourriture->contains($achatsNourriture)) {
            $this->achatsNourriture->removeElement($achatsNourriture);
            // set the owning side to null (unless already changed)
            if ($achatsNourriture->getCulture() === $this) {
                $achatsNourriture->setCulture(null);
            }
        }

        return $this;
    }
}
