<?php
/**
 *
 */
namespace App\Entity;

use App\Repository\SuiviCultureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuiviCultureRepository::class)
 */
class SuiviCulture extends Generique
{
    /**
     * @ORM\Column(type="boolean")
     */
    private $echec;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\OneToMany(targetEntity=Element::class, mappedBy="suiviCulture")
     */
    private $elements;

    public function __construct()
    {
        $this->elements = new ArrayCollection();
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
     * @return Collection|Element[]
     */
    public function getElements(): Collection
    {
        return $this->elements;
    }

    public function addElement(Element $element): self
    {
        if (!$this->elements->contains($element)) {
            $this->elements[] = $element;
            $element->setSuiviCulture($this);
        }

        return $this;
    }

    public function removeElement(Element $element): self
    {
        if ($this->elements->contains($element)) {
            $this->elements->removeElement($element);
            // set the owning side to null (unless already changed)
            if ($element->getSuiviCulture() === $this) {
                $element->setSuiviCulture(null);
            }
        }

        return $this;
    }
}
