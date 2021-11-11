<?php
/**
 *
 */
namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * Class Activite
 *
 * @ORM\Entity(repositoryClass="App\Repository\ActiviteRepository")
 *
 * @package App\Entity
 */
class Activite
{
    /**
     * @var int|null
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @var DateTime|DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @var DateTimeInterface|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDerniereMaj;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tache", mappedBy="activites")
     */
    private $taches;

    /**
     * Activite constructor.
     */
    public function __construct()
    {
        $this->id = null;
        $this->actif = true;
        $this->dateCreation = new DateTime();
        $this->dateDerniereMaj = null;
        $this->libelle = '';
        $this->taches = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function getActif(): bool
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
     * @return DateTimeInterface
     */
    public function getDateCreation(): DateTimeInterface
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
     * @return string
     */
    public function getLibelle(): string
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
     * @return Collection|Tache[]
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    /**
     * @param Tache $tach
     *
     * @return $this
     */
    public function addTach(Tache $tach): self
    {
        if (!$this->taches->contains($tach)) {
            $this->taches[] = $tach;
            $tach->addActivite($this);
        }

        return $this;
    }

    /**
     * @param Tache $tach
     *
     * @return $this
     */
    public function removeTach(Tache $tach): self
    {
        if ($this->taches->contains($tach)) {
            $this->taches->removeElement($tach);
            $tach->removeActivite($this);
        }

        return $this;
    }
}
