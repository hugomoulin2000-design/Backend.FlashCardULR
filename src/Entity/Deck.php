<?php

namespace App\Entity;

use AllowDynamicProperties;
use App\Repository\DeckRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;

#[AllowDynamicProperties]
#[ORM\Entity(repositoryClass: DeckRepository::class)]
class Deck
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['deck:list', 'deck:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['deck:list', 'deck:read'])]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    #[Groups(['deck:list', 'deck:read'])]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $creeLe = null;

    /**
     * @var Collection<int, Flashcard>
     */
    #[ORM\OneToMany(targetEntity: Flashcard::class, mappedBy: 'deck', orphanRemoval: true)]
    private Collection $flashcards;

    #[ORM\ManyToOne(inversedBy: 'decks')]
    private ?User $user = null;




    #[ORM\ManyToMany(targetEntity: Tag::class)]
    #[Groups(['deck:read'])]
    private Collection $tags;


    #[Groups(['deck:read'])]
    public function getUserId(): ?int
    {
        return $this->user?->getId();
    }

    #[ORM\Column(type: 'integer')]
    private int $difficulte = 1;

    public function getDifficulte(): int
    {
        return $this->difficulte;
    }

    public function setDifficulte(int $d): self
    {
        $this->difficulte = $d;
        return $this;
    }


    public function __construct()
    {
        $this->flashcards = new ArrayCollection();
        $this->creeLe = new \DateTimeImmutable();
        $this->tags = new ArrayCollection();
    }

    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }
        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        $this->tags->removeElement($tag);
        return $this;
    }





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getCreeLe(): ?\DateTimeImmutable
    {
        return $this->creeLe;
    }

    public function setCreeLe(\DateTimeImmutable $creeLe): static
    {
        $this->creeLe = $creeLe;
        return $this;
    }

    /**
     * @return Collection<int, Flashcard>
     */
    public function getFlashcards(): Collection
    {
        return $this->flashcards;
    }

    public function addFlashcard(Flashcard $flashcard): static
    {
        if (!$this->flashcards->contains($flashcard)) {
            $this->flashcards->add($flashcard);
            $flashcard->setDeck($this);
        }
        return $this;
    }

    public function removeFlashcard(Flashcard $flashcard): static
    {
        if ($this->flashcards->removeElement($flashcard)) {
            if ($flashcard->getDeck() === $this) {
                $flashcard->setDeck(null);
            }
        }
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;
        return $this;
    }

    public function __toString(): string
    {
        return $this->titre;
    }
}
