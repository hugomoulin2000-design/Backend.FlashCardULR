<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $tagNames = ['Programmation', 'JavaScript', 'Débutant', 'Avancé'];

        foreach ($tagNames as $i => $name) {
            $tag = new Tag();
            $tag->setNom($name);

            $manager->persist($tag);

            $this->setReference('tag-' . $i, $tag);
        }

        $manager->flush();
    }
}
