<?php

namespace App\Entity;

use App\Repository\EspaceDeCoworkingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Mime\MimeTypes;

/**
 * @ORM\Entity(repositoryClass=EspaceDeCoworkingRepository::class)
 * @Vich\Uploadable()

 */
class EspaceDeCoworking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="espace_image", fileNameProperty="filename")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank;
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank;
     */
    private $titre;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank;
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank;
     * @Assert\Regex(pattern="#^[1-999]( )?(bis)?#", message="Le numéro de route semble incorrect");
     * @Assert\Regex(pattern="#rue|boulevard|avenue|impasse|allée|place|voie|allee|chemin#i",message="Le type de voie/rue semble incorrect");
     * @Assert\Regex(pattern="#[0-9]{5}#",message="Il semble y avoir un probleme avec le code postal");
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank;
     */
    private $descriptif;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $imprimante;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $parking;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cafe;

    /**
     * @ORM\Column(type="string", length=6)
     * @Assert\Regex(pattern="#([0-1]?[0-9]|2[0-3])h[0-5][0-9]#");
     * @Assert\NotBlank;
     */
    private $heureOuverture;

    /**
     * @ORM\Column(type="string", length=6)
     * @Assert\Regex(pattern="#([0-1]?[0-9]|2[0-3])h[0-5][0-9]#");
     * @Assert\NotBlank;
     */
    private $heureFermeture;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank;
     */
    private $nombrePlace;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombrePlaceLibre;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank;
     */
    private $lat;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank;
     */
    private $longitude;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="idEspace")
     */
    private $reservations;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="espaceDeCoworkings")
     */
    private $idUser;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getImprimante(): ?bool
    {
        return $this->imprimante;
    }

    public function setImprimante(bool $imprimante): self
    {
        $this->imprimante = $imprimante;

        return $this;
    }

    public function getParking(): ?bool
    {
        return $this->parking;
    }

    public function setParking(bool $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function getCafe(): ?bool
    {
        return $this->cafe;
    }

    public function setCafe(bool $cafe): self
    {
        $this->cafe = $cafe;

        return $this;
    }

    public function getHeureOuverture(): ?string
    {
        return $this->heureOuverture;
    }

    public function setHeureOuverture(string $heureOuverture): self
    {
        $this->heureOuverture = $heureOuverture;

        return $this;
    }

    public function getHeureFermeture(): ?string
    {
        return $this->heureFermeture;
    }

    public function setHeureFermeture(string $heureFermeture): self
    {
        $this->heureFermeture = $heureFermeture;

        return $this;
    }

    public function getNombrePlace(): ?int
    {
        return $this->nombrePlace;
    }

    public function setNombrePlace(int $nombrePlace): self
    {
        $this->nombrePlace = $nombrePlace;

        return $this;
    }

    public function getNombrePlaceLibre(): ?int
    {
        return $this->nombrePlaceLibre;
    }

    public function setNombrePlaceLibre(int $nombrePlaceLibre): self
    {
        $this->nombrePlaceLibre = $nombrePlaceLibre;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getTest(): ?bool
    {
        return $this->Test;
    }

    public function setTest(?bool $Test): self
    {
        $this->Test = $Test;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setIdEspace($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getIdEspace() === $this) {
                $reservation->setIdEspace(null);
            }
        }

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
    public function __toString()
    {
        return $this->getTitre();
    }

    /**
     * @return null|string
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param null|string $filename
     * @return EspaceDeCoworking 
     */
    public function setFilename(?string $filename): EspaceDeCoworking
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return null|File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    /**
     * @param null|File $imageFile
     * @return EspaceDeCoworking
     */
    public function setImageFile(?File $imageFile): EspaceDeCoworking
    {
        $this->imageFile = $imageFile;
        return $this;
    }

}
