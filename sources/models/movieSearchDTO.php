<?php 
namespace App\Sources\Models;
class MovieSearchDTO {

    private $title;
    private $poster;

    public function __construct($title, $poster) {
        $this->setTitle($title);
        $this->setPoster($poster);
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
    
}