<?php
/**
 *
 */
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTimeInterface;

/**
 * Class Billet
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\BilletRepository")
 */
class Billet
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
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(name="date_derniere_maj", type="datetime", nullable=true)
     */
    private $dateDerniereMaj;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $template;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $uri;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $decorateur;

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

    /**
     * @return string|null
     */
    public function getTemplate(): ?string
    {
        return $this->template;
    }

    /**
     * @param string $template
     *
     * @return $this
     */
    public function setTemplate(string $template): self
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUri(): ?string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     *
     * @return $this
     */
    public function setUri(string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDecorateur(): ?string
    {
        return $this->decorateur;
    }

    /**
     * @param string|null $decorateur
     *
     * @return $this
     */
    public function setDecorateur(?string $decorateur): self
    {
        $this->decorateur = $decorateur;

        return $this;
    }
}
