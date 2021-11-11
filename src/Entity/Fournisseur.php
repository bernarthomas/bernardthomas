<?php
/**
 *
 */
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use \DateTimeInterface;
use \DateTime;

/**
 * Class Fournisseur
 *
 * @ORM\Entity(repositoryClass="App\Repository\FournisseurRepository")
 *
 * @package App\Entity
 */
class Fournisseur
{
    /**
     * @var int|null
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @var DateTimeInterface
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDerniereMaj;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AchatNourriture", mappedBy="fournisseur")
     */
    private $achatsNourriture;

    /**
     * Fournisseur constructor.
     */
    public function __construct()
    {
        $this->id = null;
        $this->actif = true;
        $this->dateCreation = new DateTime();
        $this->dateDerniereMaj = null;
        $this->libelle = '';
        $this->achatsNourriture = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return bool|null
     */
    public function getActif(): ?bool
    {
        return $this->actif;
    }

    /**
     * @param bool $actif
     *
     * @return $this
     */
    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    /**
     * @param DateTimeInterface $dateCreation
     *
     * @return $this
     */
    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateDerniereMaj(): ?\DateTimeInterface
    {
        return $this->dateDerniereMaj;
    }

    /**
     * @param DateTimeInterface|null $dateDerniereMaj
     *
     * @return $this
     */
    public function setDateDerniereMaj(?\DateTimeInterface $dateDerniereMaj): self
    {
        $this->dateDerniereMaj = $dateDerniereMaj;

        return $this;
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
     * @return Collection|AchatNourriture[]
     */
    public function getAchatsNourriture(): Collection
    {
        return $this->achatsNourriture;
    }

    public function addAchatsNourriture(AchatNourriture $achatsNourriture): self
    {
        if (!$this->achatsNourriture->contains($achatsNourriture)) {
            $this->achatsNourriture[] = $achatsNourriture;
            $achatsNourriture->setFournisseur($this);
        }

        return $this;
    }

    public function removeAchatsNourriture(AchatNourriture $achatsNourriture): self
    {
        if ($this->achatsNourriture->contains($achatsNourriture)) {
            $this->achatsNourriture->removeElement($achatsNourriture);
            // set the owning side to null (unless already changed)
            if ($achatsNourriture->getFournisseur() === $this) {
                $achatsNourriture->setFournisseur(null);
            }
        }

        return $this;
    }
}
