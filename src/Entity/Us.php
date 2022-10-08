<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ApiResource]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $uid;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $mailperso;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $mail;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $tel;

    #[ORM\Column(type: 'date')]
    private $datenais;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $genre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nationalite;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $statut;

    #[ORM\Column(type: 'string', length: 400, nullable: true)]
    private $diplomePrepare;

    #[ORM\Column(type: 'string', length: 400, nullable: true)]
    private $derniereDiplome;

    #[ORM\Column(type: 'string', length: 400, nullable: true)]
    private $derniereFiliere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUid(): ?string
    {
        return $this->uid;
    }

    public function setUid(string $uid): self
    {
        $this->uid = $uid;

        return $this;
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

    public function getMailperso(): ?string
    {
        return $this->mailperso;
    }

    public function setMailperso(?string $mailperso): self
    {
        $this->mailperso = $mailperso;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDatenais(): ?\DateTimeInterface
    {
        return $this->datenais;
    }

    public function setDatenais(\DateTimeInterface $datenais): self
    {
        $this->datenais = $datenais;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(?string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(?bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDiplomePrepare(): ?string
    {
        return $this->diplomePrepare;
    }

    public function setDiplomePrepare(?string $diplomePrepare): self
    {
        $this->diplomePrepare = $diplomePrepare;

        return $this;
    }

    public function getDerniereDiplome(): ?string
    {
        return $this->derniereDiplome;
    }

    public function setDerniereDiplome(?string $derniereDiplome): self
    {
        $this->derniereDiplome = $derniereDiplome;

        return $this;
    }

    public function getDerniereFiliere(): ?string
    {
        return $this->derniereFiliere;
    }

    public function setDerniereFiliere(?string $derniereFiliere): self
    {
        $this->derniereFiliere = $derniereFiliere;

        return $this;
    }
}
