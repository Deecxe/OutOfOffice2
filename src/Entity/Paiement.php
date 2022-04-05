<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementRepository::class)
 */
class Paiement
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $NumeroCarte;

    /**
     * @ORM\Column(type="date")
     */
    private $DateExpi;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $CVV;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getNumeroCarte(): ?string
    {
        return $this->NumeroCarte;
    }

    public function setNumeroCarte(string $NumeroCarte): self
    {
        $this->NumeroCarte = $NumeroCarte;

        return $this;
    }

    public function getDateExpi(): ?\DateTimeInterface
    {
        return $this->DateExpi;
    }

    public function setDateExpi(\DateTimeInterface $DateExpi): self
    {
        $this->DateExpi = $DateExpi;

        return $this;
    }

    public function getCVV(): ?string
    {
        return $this->CVV;
    }

    public function setCVV(string $CVV): self
    {
        $this->CVV = $CVV;

        return $this;
    }
}
