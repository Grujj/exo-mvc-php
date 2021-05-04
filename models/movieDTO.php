<?php 
namespace App\models;
class MovieDTO {

    private $id_movie;
    private $title;
    private $poster;
    private $id_critic;

    public function __construct($id_movie, $title, $poster, $id_critic) {
        $this->setIdMovie($id_movie);
        $this->setTitle($title);
        $this->setPoster($poster);
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

    public function setPoster(string $poster) {
        $this->poster = $poster;
    }

    public function getPoster() {
        return $this->poster;
    }

    public function setIdCritic($id_critic) {
        $this->id_critic = $id_critic;
    }
    public function getIdCritic() {
        return $this->id_critic;
    }
    
}