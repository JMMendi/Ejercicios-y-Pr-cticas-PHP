<?php

namespace Src\Providers;

use Src\Models\Pelicula;

class PeliculasProvider
{
    public static function getPeliculas(): array
    {
        $peliculas = [];


        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?language=en-US&page=1', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1ZmMyNWE0ZGVmY2YwZjc1ZTQ5NjU5MmI0NzAwZDc5YyIsIm5iZiI6MTcyOTg0MTY5Mi44MjA0MjUsInN1YiI6IjY3MWI0NzhiNWJlOWU4NzU5ZGE3MjQ3NSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.mm9KgwPrHGLcifSu6uHYg4aJC1BmFL9kWC0YIwXIhwM',
                'accept' => 'application/json',
            ],
        ]);

        $datos = json_decode($response->getBody()->getContents());

        $arrayObjetosPeliculas = $datos -> results;
        foreach($arrayObjetosPeliculas as $pelicula) {
            $titulo = $pelicula -> title;
            $sinopsis = $pelicula -> overview;
            $puntuacion = $pelicula -> vote_average;
            $poster = "https://image.tmdb.org/t/p/w500". $pelicula -> poster_path;

            $peliculaFinal = (new Pelicula())
                ->setTitulo($titulo)
                ->setSinopsis($sinopsis)
                ->setPuntuacion($puntuacion)
                ->setPoster($poster);

            $peliculas [] = $peliculaFinal;
        } 



        return $peliculas;
    }


}
