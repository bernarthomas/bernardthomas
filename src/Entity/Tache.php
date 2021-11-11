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
 * Class Tache
 *
 * @ORM\Entity(repositoryClass="App\Repository\TacheRepository")
 *
 * @package App\Entity
 */
class Tache
{
    /**
     * @var int | null
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Activite", inversedBy="taches")
     */
    private $activites;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @var DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @var DateTimeInterface
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
     * @var DateTimeInterface
     *
     * @ORM\Column(type="time")
     */
    private $heureDebut;

    /**
     * @var DateTimeInterface|null
     *
     * @ORM\Column(type="time", nullable=true)
     */
    private $heureFin;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Projet", inversedBy="taches")
     */
    private $projets;

    /**
     * @var TacheType | null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\TacheType", inversedBy="taches")
     */
    private  $type;

    /**
     * Tache constructor.
     */
    public function __construct()
    {
        $this->id = null;
        $this->activites = new ArrayCollection();
        $this->actif = true;
        $this->date = new DateTime();
        $this->dateCreation = new DateTime();
        $this->dateDerniereMaj = null;
        $this->heureDebut = new DateTime();
        $this->heureFin = null;
        $this->libelle = '';
        $this->projets = new ArrayCollection();
        $this->type = null;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Activite[]
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    /**
     * @param Activite $activite
     *
     * @return $this
     */
    public function addActivite(Activite $activite): self
    {
        if (!$this->activites->contains($activite)) {
            $this->activites[] = $activite;
        }

        return $this;
    }

    /**
     * @param Activite $activite
     *
     * @return $this
     */
    public function removeActivite(Activite $activite): self
    {
        if ($this->activites->contains($activite)) {
            $this->activites->removeElement($activite);
        }

        return $this;
    }

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
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface $date
     *
     * @return $this
     */
    public function setDate(DateTimeInterface $date): self
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
     * @return DateTimeInterface|null
     */
    public function getHeureDebut(): ?DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getHeureFin(): ?DateTimeInterface
    {
        return $this->heureFin;
    }

    /**
     * @param DateTimeInterface|null $heureFin
     *
     * @return $this
     */
    public function setHeureFin(?DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

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
     * @return Collection|Projet[]
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->projets->contains($projet)) {
            $this->projets[] = $projet;
        }

        return $this;
    }

    /**
     * @param Projet $projet
     *
     * @return $this
     */
    public function removeProjet(Projet $projet): self
    {
        if ($this->projets->contains($projet)) {
            $this->projets->removeElement($projet);
        }

        return $this;
    }

    /**
     * @return TacheType|null
     */
    public function getType(): ?TacheType
    {
        return $this->type;
    }

    /**
     * @param TacheType|null $type
     *
     * @return $this
     */
    public function setType(?TacheType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
