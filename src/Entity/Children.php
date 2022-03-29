<?php

namespace App\Entity;

use App\Repository\ChildrenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChildrenRepository::class)]
class Children
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $firstname;

    #[ORM\Column(type: 'string', length: 100)]
    private $lastname;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $age;

    #[ORM\OneToOne(inversedBy: 'children', targetEntity: Classroom::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $class;

    #[ORM\Column(type: 'boolean')]
    private $isExterne;

    #[ORM\ManyToMany(targetEntity: Teacher::class, inversedBy: 'childrens')]
    private $teacher;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'childrens')]
    private $parents;

    public function __construct()
    {
        $this->teacher = new ArrayCollection();
        $this->parents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getClass(): ?Classroom
    {
        return $this->class;
    }

    public function setClass(Classroom $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getIsExterne(): ?bool
    {
        return $this->isExterne;
    }

    public function setIsExterne(bool $isExterne): self
    {
        $this->isExterne = $isExterne;

        return $this;
    }

    /**
     * @return Collection<int, Teacher>
     */
    public function getTeacher(): Collection
    {
        return $this->teacher;
    }

    public function addTeacher(Teacher $teacher): self
    {
        if (!$this->teacher->contains($teacher)) {
            $this->teacher[] = $teacher;
        }

        return $this;
    }

    public function removeTeacher(Teacher $teacher): self
    {
        $this->teacher->removeElement($teacher);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getParents(): Collection
    {
        return $this->parents;
    }

    public function addParent(User $parent): self
    {
        if (!$this->parents->contains($parent)) {
            $this->parents[] = $parent;
        }

        return $this;
    }

    public function removeParent(User $parent): self
    {
        $this->parents->removeElement($parent);

        return $this;
    }
}
