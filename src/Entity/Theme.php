<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
 */
class Theme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="theme")
     */
    private $Image;

    /**
     * @ORM\ManyToMany(targetEntity=Smoothie::class, mappedBy="theme")
     */
    private $smoothies;

    public function __construct()
    {
        $this->Image = new ArrayCollection();
        $this->smoothies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImage(): Collection
    {
        return $this->Image;
    }

    public function addImage(Image $image): self
    {
        if (!$this->Image->contains($image)) {
            $this->Image[] = $image;
            $image->setTheme($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->Image->contains($image)) {
            $this->Image->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getTheme() === $this) {
                $image->setTheme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Smoothie[]
     */
    public function getSmoothies(): Collection
    {
        return $this->smoothies;
    }

    public function addSmoothy(Smoothie $smoothy): self
    {
        if (!$this->smoothies->contains($smoothy)) {
            $this->smoothies[] = $smoothy;
            $smoothy->addTheme($this);
        }

        return $this;
    }

    public function removeSmoothy(Smoothie $smoothy): self
    {
        if ($this->smoothies->contains($smoothy)) {
            $this->smoothies->removeElement($smoothy);
            $smoothy->removeTheme($this);
        }

        return $this;
    }
}
