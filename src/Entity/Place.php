<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlaceRepository")
 */
class Place
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=200)   
     */
    private $latLng;

    /**
     * @ORM\Column(type="datetime" , nullable=true)
     */
    private $datetimeOpen;

    /**
     * @ORM\Column(type="datetime" , nullable=true )
     */
    private $datetimeClose;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;



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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDatetimeOpen(): ?\DateTimeInterface
    {
        return $this->datetimeOpen;
    }

    public function setDatetimeOpen(?\DateTimeInterface $datetimeOpen): self
    {
        $this->datetimeOpen = $datetimeOpen;

        return $this;
    }

    public function getDatetimeClose(): ?\DateTimeInterface
    {
        return $this->datetimeClose;
    }

    public function setDatetimeClose(?\DateTimeInterface $timeClose): self
    {
        $this->datetimeClose = $timeClose;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(string $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getLatLng(): ?string
    {
        return $this->latLng;
    }

    public function setLatLng(string $latLng): self
    {
        $this->latLng = $latLng;

        return $this;
    }

}
