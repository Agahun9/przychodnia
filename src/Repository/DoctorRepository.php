<?php

namespace App\Repository;


use App\Entity\Specialization;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityRepository;

class DoctorRepository extends EntityRepository
{

    public function spec()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM Specialization p ORDER BY p.name ASC'
            )
            ->getResult();
    }
}