<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource(
 *     itemOperations = {
 *         "get" = {
 *             "access_control" = "is_granted('IS_AUTHENTICATED_FULLY')",
 *             "normalization_context" = {
 *                 "groups" = {"get"}
 *             }
 *         },
 *         "put" = {
 *             "access_control" = "is_granted('IS_AUTHENTICATED_FULLY') and object == user",
 *             "denormalization_context" = {
 *                 "groups" = {"put"}
 *             }
 *         }
 *     },
 *     collectionOperations = {
 *         "post" = {
 *             "denormalization_context" = {
 *                 "groups" = {"post"}
 *             }
 *         },
 *         "get" = { 
 *             "normalization_context" = {
 *                 "groups" = {"get"}
 *             }
 *          }
 *     }     
 * )
 * 
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{


    const ROLE_SUPERADMIN = "ROLE_SUPERADMIN";
    const ROLE_ADMIN = "ROLE_ADMIN";
    const ROLE_USER = "ROLE_USER";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"get","put","post"})
     * @Assert\NotBlank
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"get","post","put"})
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post", "put"})
     * @Assert\NotBlank
     */
    private $password;


    /**
     * @Assert\EqualTo(propertyPath="password", message="votre password de confirmation n'est pas valid")
     */
    private $confirmPassword;

   
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="author")
     * @Groups({"get"})
     * @ApiSubresource
     */
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rencontre", mappedBy="user")
     */
    private $rencontres;

    /**
     * @ORM\Column(type="array")
     * @Groups({"get"})
     */
    private $roles = [];

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->rencontres = new ArrayCollection();
        $this->roles = [SELF::ROLE_USER];
    }

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function getConfirmPassword(): ?string
    {
        return $this->confirmPassword;
    }

    public function setConfirmPassword(string $password): self
    {
        $this->confirmPassword = $password;

        return $this;
    }

    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return $this->roles;
    }
    
    public function eraseCredentials()
    {
    }

    public function __toString()
    {
        return $this->username;
    }

    /**
     * @return Collection|Post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setAuthor($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->posts->contains($post)) {
            $this->posts->removeElement($post);
            // set the owning side to null (unless already changed)
            if ($post->getAuthor() === $this) {
                $post->setAuthor(null);
            }
        }

        return $this;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

      /**
     * @return Collection|Event[]
     */
    public function getRencontres(): Collection
    {
        return $this->rencontres;
    }

    public function addRencontre(Rencontre $rencontre): self
    {
        if (!$this->rencontres->contains($rencontre)) {
            $this->rencontres[] = $rencontre;
            $rencontre->setUser($this);
        }

        return $this;
    }

    public function removeRencontre(Rencontre $rencontre): self
    {
        if ($this->rencontres->contains($rencontre)) {
            $this->rencontres->removeElement($rencontre);
            // set the owning side to null (unless already changed)
            if ($rencontre->getUser() === $this) {
                $rencontre->setUser(null);
            }
        }

        return $this;
    }

}
