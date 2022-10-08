<?php

namespace App\Entity;

use App\Repository\RessourcesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RessourcesRepository::class)]
class Ressources
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titleRes;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $DescriptionRes;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private $linkRes;

    #[ORM\ManyToOne(targetEntity: Topic::class, inversedBy: 'ressources')]
    private $topic;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleRes(): ?string
    {
        return $this->titleRes;
    }

    public function setTitleRes(?string $titleRes): self
    {
        $this->titleRes = $titleRes;

        return $this;
    }

    public function getDescriptionRes(): ?string
    {
        return $this->DescriptionRes;
    }

    public function setDescriptionRes(?string $DescriptionRes): self
    {
        $this->DescriptionRes = $DescriptionRes;

        return $this;
    }

    public function getLinkRes(): ?string
    {
        return $this->linkRes;
    }

    public function setLinkRes(?string $linkRes): self
    {
        $this->linkRes = $linkRes;

        return $this;
    }

    public function getTopic(): ?Topic
    {
        return $this->topic;
    }

    public function setTopic(?Topic $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function __toString(): string
    {
      return $this->titleRes;   
    }
}
