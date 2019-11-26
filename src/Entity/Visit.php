<?php
namespace App\Entity;
use App\Partial\IdAwareInterface;
use App\Partial\IdAwareTrait;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Visit
 * @package App\Entity
 * @ORM\Entity()
 */
class Visit implements IdAwareInterface
{
    use IdAwareTrait;
    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $startDate;
    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $endDate;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Doctor")
     * @var Doctor
     */
    private $doctor;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient")
     * @var Patient
     */
    private $patient;
    /**
     * @return \DateTime
     */
    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }
    /**
     * @param \DateTime $startDate
     */
    public function setStartDate(\DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }
    /**
     * @return \DateTime
     */
    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }
    /**
     * @param \DateTime $endDate
     */
    public function setEndDate(\DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }
    /**
     * @return Doctor
     */
    public function getDoctor(): ?Doctor
    {
        return $this->doctor;
    }
    /**
     * @param Doctor $doctor
     */
    public function setDoctor(Doctor $doctor): void
    {
        $this->doctor = $doctor;
    }
    /**
     * @return Patient
     */
    public function getPatient(): ?Patient
    {
        return $this->patient;
    }
    /**
     * @param Patient $patient
     */
    public function setPatient(Patient $patient): void
    {
        $this->patient = $patient;
    }
    public function __toString()
    {
        return $this->startDate->format('Y-m-d h:i') . ' '
            . $this->endDate->format('Y-m-d h:i') . ' '
            . $this->patient->__toString();
    }
}