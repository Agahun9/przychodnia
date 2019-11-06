<?php


namespace App\Entity;

use App\Partial\IdAwareInterface;
use App\Partial\IdAwareTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Specialization
 * @package App\Entity
 * @ORM\Entity()
 */
class Specialization implements IdAwareInterface
{

   use IdAwareTrait;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
   private $name;

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __toString() :string
    {
        return $this->name;
    }

}