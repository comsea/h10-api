<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\AdresseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['expertise:read']],
    denormalizationContext: ['groups' => ['expertise:write']],
)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["expertise:read", "expertise:write"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["expertise:read", "expertise:write"])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(["expertise:read", "expertise:write"])]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Groups(["expertise:read", "expertise:write"])]
    private ?string $adress = null;

    #[ORM\Column(length: 255)]
    #[Groups(["expertise:read", "expertise:write"])]
    private ?string $website = null;

    #[ORM\Column(length: 255)]
    #[Groups(["expertise:read", "expertise:write"])]
    private ?string $googlemaps = null;

    #[ORM\Column(length: 255)]
    #[Groups(["expertise:read", "expertise:write"])]
    private ?string $phone = null;

    #[ORM\ManyToOne(inversedBy: 'adresses')]
    #[Groups(["expertise:read", "expertise:write"])]
    private ?Cabinet $cabinet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): static
    {
        $this->website = $website;

        return $this;
    }

    public function getGooglemaps(): ?string
    {
        return $this->googlemaps;
    }

    public function setGooglemaps(string $googlemaps): static
    {
        $this->googlemaps = $googlemaps;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCabinet(): ?Cabinet
    {
        return $this->cabinet;
    }

    public function setCabinet(?Cabinet $cabinet): static
    {
        $this->cabinet = $cabinet;

        return $this;
    }
}
