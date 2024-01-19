<?php

namespace App\Entity;

use App\Repository\MusicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusicRepository::class)]
class Music
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $musicName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $musicDateCreation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fileName = null;

    #[ORM\ManyToMany(targetEntity: Author::class, mappedBy: 'music')]
    private Collection $authors;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMusicName(): ?string
    {
        return $this->musicName;
    }

    public function setMusicName(string $musicName): static
    {
        $this->musicName = $musicName;

        return $this;
    }

    public function getMusicDateCreation(): ?\DateTimeInterface
    {
        return $this->musicDateCreation;
    }

    public function setMusicDateCreation(\DateTimeInterface $musicDateCreation): static
    {
        $this->musicDateCreation = $musicDateCreation;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): static
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * @return Collection<int, Author>
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function addAuthor(Author $author): static
    {
        if (!$this->authors->contains($author)) {
            $this->authors->add($author);
            $author->addMusic($this);
        }

        return $this;
    }

    public function removeAuthor(Author $author): static
    {
        if ($this->authors->removeElement($author)) {
            $author->removeMusic($this);
        }

        return $this;
    }
}
