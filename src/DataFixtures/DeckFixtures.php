<?php

namespace App\DataFixtures;

use App\Entity\Deck;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DeckFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $deck = new Deck();
            $deck->setTitre("Deck $i");
            $deck->setDescription("Description du deck $i");
            $deck->setCreeLe(new \DateTimeImmutable());

            // Associer 2 tags existants
            $deck->addTag($this->getReference('tag-0', Tag::class));
            $deck->addTag($this->getReference('tag-1', Tag::class));

            $manager->persist($deck);

            $this->setReference('deck-' . $i, $deck);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            TagFixtures::class
        ];
    }
}
