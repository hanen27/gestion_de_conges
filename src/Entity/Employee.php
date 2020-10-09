<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avatar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $solde_conges;

    /**
     * @ORM\Column(type="json")
     */
    private $Roles = [];

    /**
     * @ORM\OneToMany(targetEntity=Demande::class, mappedBy="id_employee")
     */
    private $id_demande;

    public function __construct()
    {
        $this->id_demande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

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

    public function getSoldeConges(): ?string
    {
        return $this->solde_conges;
    }

    public function setSoldeConges(string $solde_conges): self
    {
        $this->solde_conges = $solde_conges;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->Roles;
    }

    public function setRoles(array $Roles): self
    {
        $this->Roles = $Roles;

        return $this;
    }

    /**
     * @return Collection|Demande[]
     */
    public function getIdDemande(): Collection
    {
        return $this->id_demande;
    }

    public function addIdDemande(Demande $idDemande): self
    {
        if (!$this->id_demande->contains($idDemande)) {
            $this->id_demande[] = $idDemande;
            $idDemande->setIdEmployee($this);
        }

        return $this;
    }

    public function removeIdDemande(Demande $idDemande): self
    {
        if ($this->id_demande->contains($idDemande)) {
            $this->id_demande->removeElement($idDemande);
            // set the owning side to null (unless already changed)
            if ($idDemande->getIdEmployee() === $this) {
                $idDemande->setIdEmployee(null);
            }
        }

        return $this;
    }
}
