<?php

namespace App\DataFixtures;

use App\Entity\Flashcard;
use App\Entity\Deck;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FlashcardFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $flashcard = new Flashcard();
            $flashcard->setQuestion("Question $i ?");
            $flashcard->setAnswer("Réponse $i");
            $flashcard->setCreeLe(new \DateTimeImmutable());


            // Deck aléatoire
            $deck = $this->getReference('deck-' . rand(1, 3), Deck::class);
            $flashcard->setDeck($deck);

            $manager->persist($flashcard);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            DeckFixtures::class,
        ];
    }
}
