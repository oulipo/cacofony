<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(
     *  message = "Le nom est obligatoire"
     * )
     * @Assert\Length(
     *  min = 1,
     *  max = 50,
     *  minMessage = "votre nom est trop court...",
     *  maxMessage = "votre nom est trop long...",
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(
     *  message = "Le prénom est obligatoire"
     * )
     * @Assert\Length(
     *  min = 1,
     *  max = 50,
     *  minMessage = "votre prénom est trop court...",
     *  maxMessage = "votre prénom est trop long...",
     * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(
     *  message = "L'adresse est obligatoire"
     * )
     * @Assert\Length(
     *  max = 100,
     *  maxMessage = "votre adresse est trop longue...",
     * )
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotBlank(
     *  message = "Le code postal est obligatoire"
     * )
     * @Assert\Length(
     *  min = 5,
     *  max = 5,
     *  exactMessage = "Un code postal comporte exactement 5 chiffres"
     * )
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(
     *  message = "La ville est obligatoire"
     * )
     * @Assert\Length(
     *  max = 50,
     *  maxMessage = "votre ville est trop longue...",
     * )
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *  message = "L'email est obligatoire"
     * )
     * @Assert\Email(
     *  message = "L'email '{{ value }}' n'est pas correct..."
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\GreaterThanOrEqual(
     *     value = 18,
     *     message = "Vous devez être majeur.e"
     * )
     */
    private $age;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url(
     *  message = "L'url doit être conforme..."
     * )
     */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
