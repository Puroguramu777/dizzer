<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MusicRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use DateTimeImmutable;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


#[ORM\Entity(repositoryClass: MusicRepository::class)]
#[Vich\Uploadable]
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

    #[ORM\Column(type: "string",length: 255, nullable: true)]
    private ?string $fileName = null;

    #[ORM\ManyToMany(targetEntity: Author::class, mappedBy: 'music')]
    private Collection $authors;

    #[Vich\UploadableField(mapping: "musics", fileNameProperty: "filename")]
    private ? File $imageFile=null;


    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updateAtt = null;

    public function getImageFile() : ?File
     {
        return $this->imageFile;
     }

     public function setImageFile(?File $imageFile): Music
     {
        $this->imageFile = $imageFile;
        if( $imageFile !== null){
            $this->updateAtt = new \DateTime("now");
        }
        return $this;
     }

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

    public function setFileName(?string $fileName): Music
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

    public function getUpdateAtt(): ?\DateTimeInterface
    {
        return $this->updateAtt;
    }

    public function setUpdateAtt(?\DateTimeInterface $updateAtt): static
    {
        $this->updateAtt = $updateAtt;

        return $this;
    }
}
