<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PatientFixture extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder=$passwordEncoder;

    }

    public function load(ObjectManager $manager)
    {
        $patient = new Patient();
        $patient ->setEmail('patient@patient.com');
        $patient ->setRoles(['ROLE_USER', 'ROLE_PATIENT']);
        $patient ->setFirstName('Jan');
        $patient ->setLastName('Kowalski');

        $patient ->setPassword($this->passwordEncoder->encodePassword($patient, 'patient'));

        $manager->persist($patient);
        $manager->flush();
    }
}
