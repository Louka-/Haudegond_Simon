<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; 

/**
 * @ORM\Entity(repositoryClass=JoueurRepository::class)
 */
class Joueur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut être vide.")
     * @Assert\Length(
     *      min= 6,
     *      minMessage = "Au minimum {{ limit }} caractères"
     * )
     * @ORM\Column(type="string", length=45)
     */
    private $nom;

    /**
     *
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut être vide.")
     * @ORM\Column(type="string", length=45)
     */
    private $pays;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut être vide.")
     * @Assert\Length(
     *      min= 10,
     *      minMessage = "Au minimum {{ limit }} caractères"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $presentation;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="joueurs")
     */
    private $relation;

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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getRelation(): ?Equipe
    {
        return $this->relation;
    }

    public function setRelation(?Equipe $relation): self
    {
        $this->relation = $relation;

        return $this;
    }
}
