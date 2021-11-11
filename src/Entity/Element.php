<?php
/**
 *
 */
namespace App\Entity;

use App\Repository\ElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use \DateTimeInterface;

/**
 * @ORM\Entity(repositoryClass=ElementRepository::class)
 */
class Element extends Generique
{
    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $echec;

    /**
     * @ORM\ManyToOne(targetEntity=SuiviCulture::class, inversedBy="elements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $suiviCulture;

    /**
     * @ORM\ManyToOne(targetEntity=Zone::class, inversedBy="elements")
     */
    private $zone;

    /**
     * @ORM\ManyToOne(targetEntity=Legende::class, inversedBy="elements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $legende;

    /**
     * @ORM\ManyToOne(targetEntity=Variete::class, inversedBy="elements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $variete;

    /**
     * @ORM\ManyToMany(targetEntity=Legende::class, inversedBy="elements")
     */
    private $legendes;

    public function __construct()
    {
        $this->legendes = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
     * @return $this
     */
    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return SuiviCulture|null
     */
    public function getSuiviCulture(): ?SuiviCulture
    {
        return $this->suiviCulture;
    }

    /**
     * @param SuiviCulture|null $suiviCulture
     *
     * @return $this
     */
    public function setSuiviCulture(?SuiviCulture $suiviCulture): self
    {
        $this->suiviCulture = $suiviCulture;

        return $this;
    }

    /**
     * @return Zone|null
     */
    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    /**
     * @param Zone|null $zone
     *
     * @return $this
     */
    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * @return Legende|null
     */
    public function getLegende(): ?Legende
    {
        return $this->legende;
    }

    /**
     * @param Legende|null $legende
     *
     * @return $this
     */
    public function setLegende(?Legende $legende): self
    {
        $this->legende = $legende;

        return $this;
    }

    /**
     * @return Variete|null
     */
    public function getVariete(): ?Variete
    {
        return $this->variete;
    }

    /**
     * @param Variete|null $variete
     *
     * @return $this
     */
    public function setVariete(?Variete $variete): self
    {
        $this->variete = $variete;

        return $this;
    }

    /**
     * @return Collection|Legende[]
     */
    public function getLegendes(): Collection
    {
        return $this->legendes;
    }

    public function addLegende(Legende $legende): self
    {
        if (!$this->legendes->contains($legende)) {
            $this->legendes[] = $legende;
        }

        return $this;
    }

    public function removeLegende(Legende $legende): self
    {
        if ($this->legendes->contains($legende)) {
            $this->legendes->removeElement($legende);
        }

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEchec(): ?bool
    {
        return $this->echec;
    }

    /**
     * @param bool $echec
     *
     * @return $this
     */
    public function setEchec(bool $echec): self
    {
        $this->echec = $echec;

        return $this;
    }
}
