<?php

class Movie
{
    public string $title;
    public string $studio;
    public string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {

        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

}

$allMovies = [
    $a = new Movie('Casino Royale', 'Eon Productions', 'PG13'),
    $b = new Movie('Glass', 'Buena Vista International', 'PG13'),
    $c = new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG'),
    $d = new Movie('Test', 'Test', 'PG')

];

function getPG(array $allMovies):array{
    $onlyPG = [];

    foreach($allMovies as $movie) {
        if($movie->rating == 'PG'){
            $onlyPG[] = $movie;
        }
    }

    return $onlyPG;
}

var_dump(getPG($allMovies));


