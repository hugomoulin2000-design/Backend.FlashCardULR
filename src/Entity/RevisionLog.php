<?php

namespace App\Entity;

use App\Repository\RevisionLogRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: RevisionLogRepository::class)]
class RevisionLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?User $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(onDelete: "CASCADE")]
    private ?Deck $deck = null;

    #[ORM\Column]
    private int $flashcards_count = 0;

    #[ORM\Column]
    private int $duration_seconds = 0;

    #[ORM\Column]
    private \DateTime $created_at;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getUser(): ?User {
        return $this->user;
    }
    public function setUser(?UserInterface $user): self {
        $this->user = $user;
        return $this;
    }

    public function getDeck(): ?Deck {
        return $this->deck;
    }
    public function setDeck(?Deck $deck): self {
        $this->deck = $deck; return $this;
    }

    public function getFlashcardsCount(): int {
        return $this->flashcards_count;
    }
    public function setFlashcardsCount(int $count): self {
        $this->flashcards_count = $count; return $this;
    }

    public function getDurationSeconds(): int {
        return $this->duration_seconds;
    }
    public function setDurationSeconds(int $seconds): self {
        $this->duration_seconds = $seconds; return $this;
    }

    public function getCreatedAt(): \DateTime {
        return $this->created_at;
    }
    public function setCreatedAt(\DateTime $date): self {
        $this->created_at = $date; return $this;
    }
}
