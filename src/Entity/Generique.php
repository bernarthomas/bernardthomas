<?php
/**
 * Classe étendue par les autres entites
 */
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTimeInterface;

/**
 * @ORM\MappedSuperclass
 */
class Generique
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $actif;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $dateDerniereMaj;

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
}
