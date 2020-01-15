<?php

namespace App\DataFixtures;

use App\Entity\Doctor;
use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DoctorFixture extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder=$passwordEncoder;

    }

    public function load(ObjectManager $manager)
    {
        $doctor = new Doctor();
        $doctor ->setEmail('doctor@doctor.pl');
        $doctor ->setRoles(['ROLE_USER', 'ROLE_DOCTOR']);
        $doctor ->setFirstName('Andrzej');
        $doctor ->setLastName('Nowak');

        $doctor ->setPassword($this->passwordEncoder->encodePassword($doctor, 'pass'));

        $manager->persist($doctor);
        $manager->flush();
    }
}
