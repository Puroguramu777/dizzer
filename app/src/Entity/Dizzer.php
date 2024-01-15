<?php

namespace App\Entity;

use App\Repository\DizzerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DizzerRepository::class)]
class Dizzer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $songName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSongName(): ?string
    {
        return $this->songName;
    }

    public function setSongName(string $songName): static
    {
        $this->songName = $songName;

        return $this;
    }
}
