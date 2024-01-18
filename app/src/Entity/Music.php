<?php

namespace App\Entity;

use App\Repository\MusicRepository;
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

    #[ORM\ManyToOne(inversedBy: 'music')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Author $author = null;

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

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): static
    {
        $this->author = $author;

        return $this;
    }
}
