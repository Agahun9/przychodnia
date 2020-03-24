<?php

namespace App\DataFixtures;

use App\Entity\Doctor;
use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DoctorFixture extends Fixture implements DependentFixtureInterface
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder=$passwordEncoder;

    }

    public function load(ObjectManager $manager)
    {
        $doctor1 = new Doctor();
        $doctor1->setRoles(['ROLE_USER', 'ROLE_DOCTOR']);
        $doctor1->setEmail('doctor@doctor.com');
        $doctor1->setPassword($this->passwordEncoder->encodePassword($doctor1, 'doctor'));
        $doctor1->setFirstName('Justyna');
        $doctor1->setLastName('Wrona');
        $doctor1->setSpecialization($this->getReference(SpecializationFixture::REF_GINEKOLOG));
        $manager->persist($doctor1);
        $manager->flush();
    }
    public function getDependencies()
    {
        return [SpecializationFixture::class];
    }
}
