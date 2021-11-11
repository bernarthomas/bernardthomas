<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\ORM\Mapping as ORM;
use \DateTimeInterface;

/**
 * @ORM\Entity(repositoryClass=ActionRepository::class)
 * @ORM\Table(name="`action`")
 */
class Action
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $culture;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date1Prevu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activite1Prevu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu1Prevu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activite1Realise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu1Realise;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date1RealiseLe;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date2Prevu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activite2Prevu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu2Prevu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activite2Realise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu2Realise;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date2RealiseLe;

    /**
     * @ORM\Column(type="datetime")
     */
    private $premiereRecolteLe;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Action
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCulture()
    {
        return $this->culture;
    }

    /**
     * @param mixed $culture
     * @return Action
     */
    public function setCulture($culture)
    {
        $this->culture = $culture;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate1Prevu()
    {
        return $this->date1Prevu;
    }

    /**
     * @param mixed $date1Prevu
     * @return Action
     */
    public function setDate1Prevu($date1Prevu)
    {
        $this->date1Prevu = $date1Prevu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivite1Prevu()
    {
        return $this->activite1Prevu;
    }

    /**
     * @param mixed $activite1Prevu
     * @return Action
     */
    public function setActivite1Prevu($activite1Prevu)
    {
        $this->activite1Prevu = $activite1Prevu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLieu1Prevu()
    {
        return $this->lieu1Prevu;
    }

    /**
     * @param mixed $lieu1Prevu
     * @return Action
     */
    public function setLieu1Prevu($lieu1Prevu)
    {
        $this->lieu1Prevu = $lieu1Prevu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivite1Realise()
    {
        return $this->activite1Realise;
    }

    /**
     * @param mixed $activite1Realise
     * @return Action
     */
    public function setActivite1Realise($activite1Realise)
    {
        $this->activite1Realise = $activite1Realise;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLieu1Realise()
    {
        return $this->lieu1Realise;
    }

    /**
     * @param mixed $lieu1Realise
     * @return Action
     */
    public function setLieu1Realise($lieu1Realise)
    {
        $this->lieu1Realise = $lieu1Realise;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate1RealiseLe()
    {
        return $this->date1RealiseLe;
    }

    /**
     * @param mixed $date1RealiseLe
     * @return Action
     */
    public function setDate1RealiseLe($date1RealiseLe)
    {
        $this->date1RealiseLe = $date1RealiseLe;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate2Prevu()
    {
        return $this->date2Prevu;
    }

    /**
     * @param mixed $date2Prevu
     * @return Action
     */
    public function setDate2Prevu($date2Prevu)
    {
        $this->date2Prevu = $date2Prevu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivite2Prevu()
    {
        return $this->activite2Prevu;
    }

    /**
     * @param mixed $activite2Prevu
     * @return Action
     */
    public function setActivite2Prevu($activite2Prevu)
    {
        $this->activite2Prevu = $activite2Prevu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLieu2Prevu()
    {
        return $this->lieu2Prevu;
    }

    /**
     * @param mixed $lieu2Prevu
     * @return Action
     */
    public function setLieu2Prevu($lieu2Prevu)
    {
        $this->lieu2Prevu = $lieu2Prevu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivite2Realise()
    {
        return $this->activite2Realise;
    }

    /**
     * @param mixed $activite2Realise
     * @return Action
     */
    public function setActivite2Realise($activite2Realise)
    {
        $this->activite2Realise = $activite2Realise;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLieu2Realise()
    {
        return $this->lieu2Realise;
    }

    /**
     * @param mixed $lieu2Realise
     * @return Action
     */
    public function setLieu2Realise($lieu2Realise)
    {
        $this->lieu2Realise = $lieu2Realise;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate2RealiseLe()
    {
        return $this->date2RealiseLe;
    }

    /**
     * @param mixed $date2RealiseLe
     * @return Action
     */
    public function setDate2RealiseLe($date2RealiseLe)
    {
        $this->date2RealiseLe = $date2RealiseLe;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPremiereRecolteLe()
    {
        return $this->premiereRecolteLe;
    }

    /**
     * @param mixed $premiereRecolteLe
     * @return Action
     */
    public function setPremiereRecolteLe($premiereRecolteLe)
    {
        $this->premiereRecolteLe = $premiereRecolteLe;
        return $this;
    }
}
