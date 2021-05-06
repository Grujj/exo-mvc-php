<?php 
namespace App\Sources\Models;
class MovieSearchDTO {

    private $title;
    private $poster_src;
    private $poster_alt;
    private $critic;
    private $description;

    public function __construct($title, $poster_src, $poster_alt, $critic, $description) {
        $this->setTitle($title);
        $this->setPosterSrc($poster_src);
        $this->setPosterAlt($poster_alt);
        $this->setCritic($critic);
        $this->setDescription($description);
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setPosterSrc(string $poster_src) {
        $this->poster_src = $poster_src;
    }

    public function getPosterSrc() {
        return $this->poster_src;
    }

    public function setPosterAlt(string $poster_alt) {
        $this->poster_alt = $poster_alt;
    }

    public function getPosterAlt() {
        return $this->poster_alt;
    }

    public function setCritic(string $critic) {
        $this->critic = $critic;
    }

    public function getCritic() {
        return $this->critic;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }
    
}