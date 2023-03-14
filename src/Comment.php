<?php

namespace src;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Entity]
class Comment
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id;
    #[ORM\Column(type: 'string')]
    private string $comment;
    #[ORM\Column(type: 'integer')]
    private int $leaveId;

    #[ManyToOne(targetEntity: Leave::class, inversedBy: 'comments')]
    #[JoinColumn(name: 'leaveId', referencedColumnName: 'id')]
    private Leave|null $leave = null;

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
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return int
     */
    public function getLeaveId(): int
    {
        return $this->leaveId;
    }

    /**
     * @param int $leaveId
     */
    public function setLeaveId(int $leaveId): void
    {
        $this->leaveId = $leaveId;
    }




}
