<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToMany(targetEntity: Students::class, inversedBy: 'inscriptions')]
    private $student;

    #[ORM\ManyToMany(targetEntity: Events::class, inversedBy: 'inscriptions')]
    private $event;

    public function __construct()
    {
        $this->student = new ArrayCollection();
        $this->event = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Students>
     */
    public function getStudent(): Collection
    {
        return $this->student;
    }

    public function addStudent(Students $student): self
    {
        if (!$this->student->contains($student)) {
            $this->student[] = $student;
        }

        return $this;
    }

    public function removeStudent(Students $student): self
    {
        $this->student->removeElement($student);

        return $this;
    }

    /**
     * @return Collection<int, Events>
     */
    public function getEvent(): Collection
    {
        return $this->event;
    }

    public function addEvent(Events $event): self
    {
        if (!$this->event->contains($event)) {
            $this->event[] = $event;
        }

        return $this;
    }

    public function removeEvent(Events $event): self
    {
        $this->event->removeElement($event);

        return $this;
    }
}
