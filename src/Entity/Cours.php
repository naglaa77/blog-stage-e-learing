<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titleC;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $descriptionC;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $slugC;

    #[ORM\Column(type: 'string', length: 400, nullable: true)]
    private $imageC;

    #[ORM\Column(type: 'text', nullable: true)]
    private $aboutC;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $publishedC;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $createdatC;

    #[ORM\Column(type: 'string', length: 600, nullable: true)]
    private $link1C;

    #[ORM\Column(type: 'string', length: 600, nullable: true)]
    private $link2C;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private $modules1;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private $modules2;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private $modules3;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private $modules4;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $durationC;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $costC;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $levelC;

    #[ORM\ManyToOne(targetEntity: Type::class, inversedBy: 'cours')]
    private $type;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $CertificateC;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $ModulesN;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleC(): ?string
    {
        return $this->titleC;
    }

    public function setTitleC(?string $titleC): self
    {
        $this->titleC = $titleC;

        return $this;
    }

    public function getDescriptionC(): ?string
    {
        return $this->descriptionC;
    }

    public function setDescriptionC(?string $descriptionC): self
    {
        $this->descriptionC = $descriptionC;

        return $this;
    }

    public function getSlugC(): ?string
    {
        return $this->slugC;
    }

    public function setSlugC(?string $slugC): self
    {
        $this->slugC = $slugC;

        return $this;
    }

    public function getImageC(): ?string
    {
        return $this->imageC;
    }

    public function setImageC(?string $imageC): self
    {
        $this->imageC = $imageC;

        return $this;
    }

    public function getAboutC(): ?string
    {
        return $this->aboutC;
    }

    public function setAboutC(?string $aboutC): self
    {
        $this->aboutC = $aboutC;

        return $this;
    }

    public function getPublishedC(): ?bool
    {
        return $this->publishedC;
    }

    public function setPublishedC(?bool $publishedC): self
    {
        $this->publishedC = $publishedC;

        return $this;
    }

    public function getCreatedatC(): ?\DateTimeInterface
    {
        return $this->createdatC;
    }

    public function setCreatedatC(?\DateTimeInterface $createdatC): self
    {
        $this->createdatC = $createdatC;

        return $this;
    }

    public function getLink1C(): ?string
    {
        return $this->link1C;
    }

    public function setLink1C(?string $link1C): self
    {
        $this->link1C = $link1C;

        return $this;
    }

    public function getLink2C(): ?string
    {
        return $this->link2C;
    }

    public function setLink2C(?string $link2C): self
    {
        $this->link2C = $link2C;

        return $this;
    }

    public function getModules1(): ?string
    {
        return $this->modules1;
    }

    public function setModules1(?string $modules1): self
    {
        $this->modules1 = $modules1;

        return $this;
    }

    public function getModules2(): ?string
    {
        return $this->modules2;
    }

    public function setModules2(?string $modules2): self
    {
        $this->modules2 = $modules2;

        return $this;
    }

    public function getModules3(): ?string
    {
        return $this->modules3;
    }

    public function setModules3(?string $modules3): self
    {
        $this->modules3 = $modules3;

        return $this;
    }

    public function getModules4(): ?string
    {
        return $this->modules4;
    }

    public function setModules4(?string $modules4): self
    {
        $this->modules4 = $modules4;

        return $this;
    }

    public function getDurationC(): ?string
    {
        return $this->durationC;
    }

    public function setDurationC(?string $durationC): self
    {
        $this->durationC = $durationC;

        return $this;
    }

    public function getCostC(): ?string
    {
        return $this->costC;
    }

    public function setCostC(?string $costC): self
    {
        $this->costC = $costC;

        return $this;
    }

    public function getLevelC(): ?string
    {
        return $this->levelC;
    }

    public function setLevelC(?string $levelC): self
    {
        $this->levelC = $levelC;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }
    public function __toString(): string
    {
      return $this->titleC;   
    }

    public function getCertificateC(): ?string
    {
        return $this->CertificateC;
    }

    public function setCertificateC(?string $CertificateC): self
    {
        $this->CertificateC = $CertificateC;

        return $this;
    }

    public function getModulesN(): ?int
    {
        return $this->ModulesN;
    }

    public function setModulesN(?int $ModulesN): self
    {
        $this->ModulesN = $ModulesN;

        return $this;
    }
}
