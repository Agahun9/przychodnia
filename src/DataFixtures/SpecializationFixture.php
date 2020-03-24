<?php

namespace App\DataFixtures;

use App\Entity\Specialization;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SpecializationFixture extends Fixture
{
    public const REF_GINEKOLOG = 'ginekolog';

    public function load(ObjectManager $manager)
    {
        $specialization = new Specialization();
        $specialization->setName('Ginekolog');
        $manager->persist($specialization);
        $this->addReference(self::REF_GINEKOLOG, $specialization);
        $manager->flush();
    }
}
