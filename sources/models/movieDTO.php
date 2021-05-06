<?php 
namespace App\Sources\Models;
class MovieDTO {

    private $id_movie;
    private $title;
    private $poster_src;
    private $poster_alt;
    private $critic;
    private $description;

    public function __construct($id_movie, $title, $poster_src, $poster_alt, $critic, $description) {
        $this->setIdMovie($id_movie);
        $this->setTitle($title);
        $this->setPosterSrc($poster_src);
        $this->setPosterAlt($poster_alt);
        $this->setCritic($critic);
        $this->setDescription($description);
    }

    public function setIdMovie(int $id_movie) {
        $this->id_movie = $id_movie;
    }

    public function getIdMovie() {
        return $this->id_movie;
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setPosterSrc($poster_src) {
        $this->poster_src = $poster_src;
    }

    public function getPosterSrc() {
        return $this->poster_src;
    }

    public function setPosterAlt($poster_alt) {
        $this->poster_alt = $poster_alt;
    }

    public function getPosterAlt() {
        return $this->poster_alt;
    }

    public function setCritic($critic) {
        $this->critic = $critic;
    }
    
    public function getCritic() {
        return $this->critic;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }
    
}