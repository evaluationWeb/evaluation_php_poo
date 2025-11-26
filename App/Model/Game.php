<?php

namespace App\Model;

use DateTime;
use App\Model\Console;
use DateTimeImmutable;

class Game
{
    //Attributs
    private int $id;
    private string $title;
    private string $type;
    private DateTime $publish_at;
    private Console $Console;
    //Constructeur
    public function __construct(
        int $id,
        string $title,
        string $type,
        DateTime $publish_at,
        Console $console
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->publish_at = $publish_at;
        $this->Console = $console;
    }
    //Getters et Setters
    public function getId(): ?int{
        return $this->id;
    }
    public function setId(?int $id): void{
        $this->id = $id;
    }
    public function getTitle(): ?string{
        return $this->title;
    }
    public function setTitle(?string $title): void{
        $this->title = $title;
    }
    public function getType(): ?string{
        return $this->type;
    }
    public function setType(?string $type): void{
        $this->type = $type;
    }
    public function getPublishAt(): ?DateTime {
        return $this->publish_at;
    }
    public function setPublishAt(?DateTime $publish_at): void{
        $this->publish_at = $publish_at;
    }
    public function getConsole(): Console { 
        return $this->Console; }

    public function setConsole(Console $console): void { 
        $this->Console = $console; }
}