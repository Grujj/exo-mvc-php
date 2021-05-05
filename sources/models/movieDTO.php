<?php 
namespace App\Sources\Models;
class MovieDTO {

    private $id_movie;
    private $title;
    private $poster_src;
    private $poster_alt;
    private $id_critic;

    public function __construct($id_movie, $title, $poster_src, $poster_alt, $id_critic) {
        $this->setIdMovie($id_movie);
        $this->setTitle($title);
        $this->setPosterSrc($poster_src);
        $this->setPosterAlt($poster_alt);
        $this->setIdCritic($id_critic);
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

    public function setIdCritic($id_critic) {
        $this->id_critic = $id_critic;
    }
    public function getIdCritic() {
        return $this->id_critic;
    }
    
}