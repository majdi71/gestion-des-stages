<?php

namespace App\Entity;

use App\Repository\ListeStageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeStageRepository::class)
 */
class ListeStage
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
    private $specialite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre_de_stage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_de_stage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_du_socite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_socite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_de_stage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_socite;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getTitre_De_Stage(): ?string
    {
        return $this->titre_de_stage;
    }

    public function setTitre_De_Stage(string $titre_de_stage): self
    {
        $this->titre_de_stage = $titre_de_stage;

        return $this;
    }

    public function getType_De_Stage(): ?string
    {
        return $this->type_de_stage;
    }

    public function setType_De_Stage(string $type_de_stage): self
    {
        $this->type_de_stage = $type_de_stage;

        return $this;
    }

    public function getNom_Du_Socite(): ?string
    {
        return $this->nom_du_socite;
    }

    public function setNom_Du_Socite(string $nom_du_socite): self
    {
        $this->nom_du_socite = $nom_du_socite;

        return $this;
    }

    public function getAdresse_Socite(): ?string
    {
        return $this->adresse_socite;
    }

    public function setAdresse_Socite(string $adresse_socite): self
    {
        $this->adresse_socite = $adresse_socite;

        return $this;
    }

    public function getDescription_De_Stage(): ?string
    {
        return $this->description_de_stage;
    }

    public function setDescription_De_Stage(string $description_de_stage): self
    {
        $this->description_de_stage = $description_de_stage;

        return $this;
    }

    public function getImage_Socite(): ?string
    {
        return $this->image_socite;
    }

    public function setImage_Socite(string $image_socite): self
    {
        $this->image_socite = $image_socite;

        return $this;
    }
}
