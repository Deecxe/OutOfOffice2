<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $cout;

    /**
     * @ORM\Column(type="string", length=13)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $heureDebut;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $heureFin;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nombrePlaceReservees;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="idEspace")
     */
    private $idUser;

    /**
     * @ORM\ManyToOne(targetEntity=EspaceDeCoworking::class, inversedBy="reservations")
     */
    private $idEspace;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCout(): ?float
    {
        return $this->cout;
    }

    public function setCout(float $cout): self
    {
        $this->cout = $cout;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeureDebut(): ?string
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(string $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?string
    {
        return $this->heureFin;
    }

    public function setHeureFin(string $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getNombrePlaceReservees(): ?int
    {
        return $this->nombrePlaceReservees;
    }

    public function setNombrePlaceReservees(int $nombrePlaceReservees): self
    {
        $this->nombrePlaceReservees = $nombrePlaceReservees;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdEspace(): ?EspaceDeCoworking
    {
        return $this->idEspace;
    }

    public function setIdEspace(?EspaceDeCoworking $idEspace): self
    {
        $this->idEspace = $idEspace;

        return $this;
    }
    public function __toString()
    {
        return $this->getId();
    }
}
