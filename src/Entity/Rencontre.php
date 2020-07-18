<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Artist;
use App\Entity\User;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource(
 *      subresourceOperations={
 *          "api_users_rencontres_get_subresource"={
 *              "method"="GET",
 *              "normalization_context"={"groups"={"get-rencontre", "get-rencontre-other"}}
 *          }
 *      },
 *     collectionOperations={
 *          "get" = {
 *             "normalization_context" = {
 *                 "groups" = {"get-rencontre", "get-rencontre-other"}
 *             }
 *          }, 
 *          "post"= {
 *             "denormalization_context" = {
 *                 "groups" = {"post-rencontre"}
 *             }
 *         }
 *     },
 *     itemOperations={
 *           "get" = {
 *              "normalization_context" = {
 *                  "groups" = {"get-rencontre", "get-rencontre-other"}
 *                }
 *            }
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\RencontreRepository")
 */
class Rencontre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *  @Groups({"get-rencontre"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artist", inversedBy="rencontres")
     * @ORM\JoinColumn(name="artist_id", referencedColumnName="id")
     * @Groups({"get-rencontre-other","post-rencontre"})
     * @Assert\NotBlank(groups = {"post-rencontre"})
     */
    private $artist;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="rencontres")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     * @Groups({"get-rencontre-other"})
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"get-rencontre"})
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get-rencontre"})
     */
    private $latLng;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }
}
