<?php
/**
 *
 */
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTimeInterface;
use \DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecolteRepository")
 */
class Recolte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @var DateTimeInterface
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(name="date_derniere_maj", type="datetime", nullable=true)
     */
    private $dateDerniereMaj;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Culture", inversedBy="recoltes", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(nullable=false)
     */
    private $culture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

    /**
     * @var DateTimeInterface|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $poids;

    public function __construct()
    {
        $this->id = null;
        $this->actif = false;
        $this->dateCreation = new DateTime();
        $this->dateDerniereMaj = null;
        $this->culture = null;
        $this->commentaire = null;
        $this->date = null;
        $this->poids = null;
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
     * @return string|null
     */
    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    /**
     * @param string|null $commentaire
     *
     * @return $this
     */
    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

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
    public function getDateCreation(): ?DateTimeInterface
    {
        return $this->dateCreation;
    }

    /**
     * @param DateTimeInterface $dateCreation
     *
     * @return $this
     */
    public function setDateCreation(DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDateDerniereMaj(): ?DateTimeInterface
    {
        return $this->dateDerniereMaj;
    }

    /**
     * @param DateTimeInterface|null $dateDerniereMaj
     *
     * @return $this
     */
    public function setDateDerniereMaj(?DateTimeInterface $dateDerniereMaj): self
    {
        $this->dateDerniereMaj = $dateDerniereMaj;

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
