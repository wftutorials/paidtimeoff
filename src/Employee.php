<?php

namespace src;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;

#[ORM\Entity]
#[ORM\Table(name: 'employees')]
class Employee
{

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $email;
    #[ORM\Column(type: 'integer')]
    private string $department;
    #[ORM\Column(type: 'integer')]
    private int $sectorId;

    // Join employee to department
    #[ORM\ManyToOne(targetEntity: Department::class, inversedBy: 'employee')]
    #[ORM\JoinColumn(name: 'department', referencedColumnName: 'id')]
    private Department|null $departmentModel = null;

    // Join employee to sector
    #[ORM\ManyToOne(targetEntity: Sector::class)]
    #[ORM\JoinColumn(name: 'sectorId', referencedColumnName: 'id')]
    private Sector|null $sector = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }


    public function getDepartmentModel(): Department|null
    {
        return $this->departmentModel;
    }

    public function setDepartmentModel(Department|null $departmentModel): void
    {
        $this->departmentModel = $departmentModel;
    }

    public function getSectorId(): int
    {
        return $this->sectorId;
    }

    public function setSectorId(int $sectorId): void
    {
        $this->sectorId = $sectorId;
    }

    public function getSector(): Sector|null
    {
        return $this->sector;
    }

    public function setSector(Sector|null $sector): void
    {
        $this->sector = $sector;
    }


}
