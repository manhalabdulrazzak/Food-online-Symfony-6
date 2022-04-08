<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    /**
     * @param SluggerInterface $slugger
     */
    public function __construct(private sluggerInterface $slugger ){}

    public function load(ObjectManager $manager): void
    {
        $parent = new Categories();
        $parent ->setName('burger');
        $parent ->setSlug($this->slugger->slug($parent->getName()));
        $manager->persist($parent);

        $category = new Categories();
        $category ->setName('burger2');
        $category ->setSlug($this->slugger->slug($category->getName()));
        $manager->persist($category);


        $manager->flush();
    }
}
