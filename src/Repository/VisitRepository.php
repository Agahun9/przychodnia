<?php

namespace App\Repository;

use App\Entity\Patient;
use App\Entity\Visit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


class VisitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visit::class);
    }

    public function finy(Patient $patient){
        return $this->findBy([
           'patient' =>$patient
        ]);
    }
}