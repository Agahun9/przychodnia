<?php


namespace App\Entity;

use App\Partial\IdAwareInterface;
use App\Partial\IdAwareTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Patient
 * @package App\Entity
 * @ORM\Entity()
 */
class Patient implements IdAwareInterface
{
    use IdAwareTrait;

    /**
     * @ORM\Column(type="string")
     * @var string
     */

    private $firstName;

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $lastName;


    public function __toString() :string
    {
        return $this->firstName . ' ' . $this->lastName ;
    }



}