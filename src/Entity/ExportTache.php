<?php
/**
 *
 */
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class ExportTache
 *
 * @ORM\Entity(repositoryClass="App\Repository\ExportTacheRepository")
 *
 * @package App\Entity
 */
class ExportTache
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
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $affectation;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $charge;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $fin;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $projets;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $taches;

    /**
     * ExportTache constructor.
     */
    public function __construct()
    {
        $this->id = null;
        $this->actif = true;
        $this->affectation = '';
        $this->charge = 0;
        $this->code = '';
        $this->fin = '';
        $this->projets = '';
        $this->taches = '';
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
     * @return string
     */
    public function getAffectation(): string
    {
        return $this->affectation;
    }

    /**
     * @param string $affectation
     *
     * @return $this
     */
    public function setAffectation(string $affectation): self
    {
        $this->affectation = $affectation;

        return $this;
    }

    /**
     * @return float
     */
    public function getCharge(): float
    {
        return $this->charge;
    }

    /**
     * @param float $charge
     *
     * @return $this
     */
    public function setCharge(float $charge): self
    {
        $this->charge = $charge;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getFin(): string
    {
        return $this->fin;
    }

    /**
     * @param string $fin
     *
     * @return $this
     */
    public function setFin(string $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * @return string
     */
    public function getProjets(): string
    {
        return $this->projets;
    }

    /**
     * @param string $projets
     *
     * @return $this
     */
    public function setProjets(string $projets): self
    {
        $this->projets = $projets;

        return $this;
    }


    /**
     * @return string
     */
    public function getTaches(): string
    {
        return $this->taches;
    }

    /**
     * @param string taches
     *
     * @return $this
     */
    public function setTaches(string $taches): self
    {
        $this->taches = $taches;

        return $this;
    }

}
