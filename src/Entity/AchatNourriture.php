<?php
/**
 *
 */
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;
use \DateTimeInterface;

/**
 * Class AchatNourriture
 * @ORM\Entity(repositoryClass="App\Repository\AchatNourritureRepository")
 * @package App\Entity
 */
class AchatNourriture
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
     * @var Culture
     * @ORM\ManyToOne(targetEntity="App\Entity\Culture", inversedBy="achatsNourriture")
     * @ORM\JoinColumn(nullable=false)
     */
    private $culture;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

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
     * @var Fournisseur
     * @ORM\ManyToOne(targetEntity="App\Entity\Fournisseur", inversedBy="achatsNourriture")
     */
    private $fournisseur;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $poids;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $prixPaye;

    public function __construct()
    {
        $this->id = null;
        $this->actif = true;
        $this->culture = new Culture();
        $this->date = new DateTime();
        $this->dateCreation = new DateTime();
        $this->dateDerniereMaj = null;
        $this->fournisseur = new Fournisseur();
        $this->poids = 0.00;
        $this->prixPaye = 0.00;
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
     * @return Culture|null
     */
    public function getCulture(): ?Culture
    {
        return $this->culture;
    }

    /**
     * @param Culture|null $culture
     *
     * @return $this
     */
    public function setCulture(?Culture $culture): self
    {
        $this->culture = $culture;

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
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|null $date
     *
     * @return $this
     */
    public function setDate(?DateTimeInterface $date): self
    {
        $this->date = $date;

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
     * @return Fournisseur|null
     */
    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    /**
     * @param Fournisseur|null $fournisseur
     *
     * @return $this
     */
    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrixPaye(): ?float
    {
        return $this->prixPaye;
    }

    /**
     * @param float $prixPaye
     *
     * @return $this
     */
    public function setPrixPaye(float $prixPaye): self
    {
        $this->prixPaye = $prixPaye;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPoids(): ?float
    {
        return $this->poids;
    }

    /**
     * @param float $poids
     *
     * @return $this
     */
    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }
}
