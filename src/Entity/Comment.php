<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $authorCom;

    #[ORM\Column(type: 'text')]
    private $ContentCom;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $createdatCom;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'comments')]
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthorCom(): ?string
    {
        return $this->authorCom;
    }

    public function setAuthorCom(string $authorCom): self
    {
        $this->authorCom = $authorCom;

        return $this;
    }

    public function getContentCom(): ?string
    {
        return $this->ContentCom;
    }

    public function setContentCom(string $ContentCom): self
    {
        $this->ContentCom = $ContentCom;

        return $this;
    }

    public function getCreatedatCom(): ?\DateTimeInterface
    {
        return $this->createdatCom;
    }

    public function setCreatedatCom(?\DateTimeInterface $createdatCom): self
    {
        $this->createdatCom = $createdatCom;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function __toString(): string
    {
      return $this->ContentCom;   
    }
}
