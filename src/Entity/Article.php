<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre_article = null;

    #[ORM\Column(length: 2048, nullable: true)]
    private ?string $description_article = null;

    #[ORM\Column]
    private ?float $rating = null;

    #[ORM\Column(nullable: true)]
    private ?int $game_id = null;

    #[ORM\Column(length: 255)]
    private ?string $game_name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_pub = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $User = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreArticle(): ?string
    {
        return $this->titre_article;
    }

    public function setTitreArticle(string $titre_article): static
    {
        $this->titre_article = $titre_article;

        return $this;
    }

    public function getDescriptionArticle(): ?string
    {
        return $this->description_article;
    }

    public function setDescriptionArticle(?string $description_article): static
    {
        $this->description_article = $description_article;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(float $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getGameId(): ?int
    {
        return $this->game_id;
    }

    public function setGameId(?int $game_id): static
    {
        $this->game_id = $game_id;

        return $this;
    }

    public function getGameName(): ?string
    {
        return $this->game_name;
    }

    public function setGameName(string $game_name): static
    {
        $this->game_name = $game_name;

        return $this;
    }

    public function getDatePub(): ?\DateTimeInterface
    {
        return $this->date_pub;
    }

    public function setDatePub(\DateTimeInterface $date_pub): static
    {
        $this->date_pub = $date_pub;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }
}