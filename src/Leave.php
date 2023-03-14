<?php

namespace src;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Entity]
#[ORM\Table(name: 'leaves')]
class Leave
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id;
    #[ORM\Column(type: 'string')]
    private string $startDate;
    #[ORM\Column(type: 'string')]
    private string $endDate;
    #[ORM\Column(type: 'string')]
    private string $reason;
    #[ORM\Column(type: 'string')]
    private string $startTime;
    #[ORM\Column(type: 'string')]
    private string $endTime;
    #[ORM\Column(type: 'integer')]
    private int $employeeId;
    #[ORM\Column(type: 'integer')]
    private int $approved;
    #[ORM\Column(type: 'integer')]
    private int $sectorId;

    #[ORM\ManyToOne(targetEntity: Employee::class)]
    #[JoinColumn(name: 'employeeId', referencedColumnName: 'id')]
    protected Employee|null $employee= null;


    /** @var Collection<int, Comment> An ArrayCollection of Comment objects. */
    #[ORM\OneToMany(mappedBy: 'leave', targetEntity: Comment::class)]
    private Collection $comments;


    #[ORM\ManyToOne(targetEntity: Sector::class)]
    #[JoinColumn(name: 'sectorId', referencedColumnName: 'id')]
    private Sector|null $sector = null;


    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getComments(): array { return $this->comments; }


    // get comments count
    public function getCommentsCount(): int
    {
        return count($this->comments);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getStartTime(): string
    {
        return $this->startTime;
    }

    /**
     * @param string $startTime
     */
    public function setStartTime(string $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * @return string
     */
    public function getEndTime(): string
    {
        return $this->endTime;
    }

    /**
     * @param string $endTime
     */
    public function setEndTime(string $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * @return int
     */
    public function getEmployeeId(): int
    {
        return $this->employeeId;
    }

    /**
     * @param int $employeeId
     */
    public function setEmployeeId(int $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return int
     */
    public function getApproved(): int
    {
        return $this->approved;
    }

    /**
     * @param int $approved
     */
    public function setApproved(int $approved): void
    {
        $this->approved = $approved;
    }

    /**
     * @return Employee|null
     */
    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    /**
     * @param Employee|null $employee
     */
    public function setEmployee(?Employee $employee): void
    {
        $this->employee = $employee;
    }

    public function getDays(): int
    {
        $start = strtotime($this->getStartDate() . " " . $this->getStartTime());
        $end = strtotime($this->getEndDate() . " " . $this->getEndTime());
        $days_between = ceil(abs($end - $start) / 86400);
        return $days_between;
    }


    /**
     * @return int
     */
    public function getSectorId(): int
    {
        return $this->sectorId;
    }


    // get sector
    public function getSector(): Sector|null
    {
        return $this->sector;
    }

    // set sector Id
    public function setSectorId(int $sectorId): void
    {
        $this->sectorId = $sectorId;
    }

    // set sector
    public function setSector(Sector $sector): void
    {
        $this->sector = $sector;
    }


}
