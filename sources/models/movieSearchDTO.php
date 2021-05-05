<?php 
namespace App\Sources\Models;
class MovieSearchDTO {

    private $title;
    private $poster_src;

    public function __construct($title, $poster_src) {
        $this->setTitle($title);
        $this->setPosterSrc($poster_src);
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
    
}