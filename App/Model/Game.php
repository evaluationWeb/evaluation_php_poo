<?php

namespace App\Model;

class Game
{
    //Attributs
    private int $id;
    private string $title;
    private string $type;
    private \DateTimeImmutable $publish_at;
    private int $console_id;

    //Constructeur
    public function __construct() {}

    //Getters et Setters
    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getType(): string
    {
        return $this->type;
    }
    public function getPublishAt(): \DateTimeImmutable
    {
        return $this->publish_at;
    }
    public function getConsoleId(): int
    {
        return $this->console_id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function setType(string $type): void
    {
        $this->type = $type;
    }
    public function setPublishAt(\DateTimeImmutable $publish_at): void
    {
        $this->publish_at = $publish_at;
    }
    public function setConsoleId(int $console_id): void
    {
        $this->console_id = $console_id;
    }
}
