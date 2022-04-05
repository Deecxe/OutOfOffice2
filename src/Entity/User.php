<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secteurActivite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $estGerant;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="idUser")
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity=EspaceDeCoworking::class, mappedBy="idUser")
     */
    private $espaceDeCoworkings;

    /**
     * @ORM\OneToMany(targetEntity=Facture::class, mappedBy="idUsers")
     */
    private $factures;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->espaceDeCoworkings = new ArrayCollection();
        $this->factures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMetier(): ?string
    {
        return $this->metier;
    }

    public function setMetier(string $metier): self
    {
        $this->metier = $metier;

        return $this;
    }

    public function getSecteurActivite(): ?string
    {
        return $this->secteurActivite;
    }

    public function setSecteurActivite(string $secteurActivite): self
    {
        $this->secteurActivite = $secteurActivite;

        return $this;
    }

    public function getEstGerant(): ?bool
    {
        return $this->estGerant;
    }

    public function setEstGerant(?bool $estGerant): self
    {
        $this->estGerant = $estGerant;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getIdReservations(): Collection
    {
        return $this->reservations;
    }

    public function addIdReservations(Reservation $reservations): self
    {
        if (!$this->reservations->contains($reservations)) {
            $this->reservations[] = $reservations;
            $reservations->setIdUser($this);
        }

        return $this;
    }

    public function removeIdReservations(Reservation $reservations): self
    {
        if ($this->reservations->removeElement($reservations)) {
            // set the owning side to null (unless already changed)
            if ($reservations->getIdUser() === $this) {
                $reservations->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EspaceDeCoworking>
     */
    public function getEspaceDeCoworkings(): Collection
    {
        return $this->espaceDeCoworkings;
    }

    public function addEspaceDeCoworking(EspaceDeCoworking $espaceDeCoworking): self
    {
        if (!$this->espaceDeCoworkings->contains($espaceDeCoworking)) {
            $this->espaceDeCoworkings[] = $espaceDeCoworking;
            $espaceDeCoworking->setIdUser($this);
        }

        return $this;
    }

    public function removeEspaceDeCoworking(EspaceDeCoworking $espaceDeCoworking): self
    {
        if ($this->espaceDeCoworkings->removeElement($espaceDeCoworking)) {
            // set the owning side to null (unless already changed)
            if ($espaceDeCoworking->getIdUser() === $this) {
                $espaceDeCoworking->setIdUser(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getUsername();
    }

    /**
     * @return Collection<int, Facture>
     */
    public function getFactures(): Collection
    {
        return $this->factures;
    }

    public function addFacture(Facture $facture): self
    {
        if (!$this->factures->contains($facture)) {
            $this->factures[] = $facture;
            $facture->setIdUsers($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): self
    {
        if ($this->factures->removeElement($facture)) {
            // set the owning side to null (unless already changed)
            if ($facture->getIdUsers() === $this) {
                $facture->setIdUsers(null);
            }
        }

        return $this;
    }
}
