<?php

namespace App\Entity;

class Game 
{
    // Attributs
    private ?int $id = null;
    private ?string $title = null;
    private ?string $type = null;
    private ?string $publishAt = null;
    private ?Console $console = null;

    // Constructeur
    public function __construct(?int $id = null, ?string $title = null, ?string $type = null, ?string $publishAt = null, ?Console $console = null) {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->publishAt = $publishAt;
        $this->console = $console;
    }

    // Getters et Setters
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): ?string {
        return $this->title; // Corrigé ici aussi (c'était $title sans $this->)
    }

    public function setTitle(string $title): self {
        $this->title = $title;
        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    public function setType(string $type): self {
        $this->type = $type;
        return $this;
    }

    public function getPublishAt(): ?string {
        return $this->publishAt;
    }

    public function setPublishAt(string $publishAt): self {
        $this->publishAt = $publishAt;
        return $this;
    }

    public function getConsole(): ?Console {
        return $this->console;
    }

    public function setConsole(?Console $console): self {
        $this->console = $console;
        return $this;
    }
}