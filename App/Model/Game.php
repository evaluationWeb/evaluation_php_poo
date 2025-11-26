<?php

namespace App\Model;

class Game
{
    //Attributs
    private ?int $id;
    private ?string $title;
    private ?string $type;
    private ?\DateTimeInterface $publishAt;
    private ?Console $console;

    //Constructeur
    public function __construct()
    {
        // Constructeur vide
    }

    //Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getPublishAt(): ?\DateTimeInterface
    {
        return $this->publishAt;
    }

    public function setPublishAt(?\DateTimeInterface $publishAt): void
    {
        $this->publishAt = $publishAt;
    }

    public function getConsole(): ?Console
    {
        return $this->console;
    }

    public function setConsole(?Console $console): void
    {
        $this->console = $console;
    }
}
?>
