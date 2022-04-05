<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Reservation::class, cascade={"persist", "remove"})
     */
    private $idReservation;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $idUser;

    /**
     * @ORM\ManyToOne(targetEntity=Reservation::class, inversedBy="factures")
     */
    private $idReservationn;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="factures")
     */
    private $idUsers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdReservation(): ?Reservation
    {
        return $this->idReservation;
    }

    public function setIdReservation(?Reservation $idReservation): self
    {
        $this->idReservation = $idReservation;

        return $this;
    }
    public function __toString()
    {
        return $this->getId();
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

    public function getIdReservationn(): ?Reservation
    {
        return $this->idReservationn;
    }

    public function setIdReservationn(?Reservation $idReservationn): self
    {
        $this->idReservationn = $idReservationn;

        return $this;
    }

    public function getIdUsers(): ?User
    {
        return $this->idUsers;
    }

    public function setIdUsers(?User $idUsers): self
    {
        $this->idUsers = $idUsers;

        return $this;
    }
}
