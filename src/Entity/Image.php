<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
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
    private $alt;

    /**
     * @ORM\Column(type="blob")
     */
    private $data;

    /**
     * @ORM\Column(type="integer")
     */
    private $width;

    /**
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * @ORM\Column(type="integer")
     */
    private $length;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filetype;

    /**
     * @ORM\ManyToOne(targetEntity=Theme::class, inversedBy="Image")
     */
    private $theme;

    /**
     * @ORM\ManyToOne(targetEntity=Smoothie::class, inversedBy="image")
     */
    private $smoothie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * Set image data as base64
     */
    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getFiletype(): ?string
    {
        return $this->filetype;
    }

    public function setFiletype(string $filetype): self
    {
        $this->filetype = $filetype;

        return $this;
    }

    public function setFileAttributesWithImageFile($imageFile): self
    {
        $imgData = base64_encode(file_get_contents($imageFile));
        $imgLength = filesize($imageFile);

        $imgProps = getimagesize($imageFile);

        $imgWidth = $imgProps[0];
        $imgHeight = $imgProps[1];
        $imgType = $imgProps["mime"];

        $this->setData($imgData);
        $this->setFiletype($imgType);
        $this->setLength($imgLength);
        $this->setWidth($imgWidth);
        $this->setHeight($imgHeight);

        return $this;
    }

    public function getParsedImageSrc(){
        return 'data:' . $this->getFiletype() . ';base64,' . $this->getData();
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getSmoothie(): ?Smoothie
    {
        return $this->smoothie;
    }

    public function setSmoothie(?Smoothie $smoothie): self
    {
        $this->smoothie = $smoothie;

        return $this;
    }

}
