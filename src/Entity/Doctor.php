<?php


namespace App\Entity;

use App\Partial\IdAwareInterface;
use App\Partial\IdAwareTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Doctor
 * @package App\Entity
 * @ORM\Entity()
 */

class Doctor implements IdAwareInterface
{
   use IdAwareTrait;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $lastName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Specialization")
     * @var Specialization
     */

    private $specialization;

    /**
     * @return Specialization
     */
    public function getSpecialization(): ?Specialization
    {
        return $this->specialization;
    }

    /**
     * @param Specialization $specialization
     */
    public function setSpecialization(Specialization $specialization): void
    {
        $this->specialization = $specialization;
    }

    /**
     * @param string $firstName
     */


    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }


    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }
    public function __toString() :string
    {
        return $this->firstName . ' ' . $this->lastName ;
    }



}