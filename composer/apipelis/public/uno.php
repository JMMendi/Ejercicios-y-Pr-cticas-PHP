<?php

require __DIR__."/../vendor/autoload.php";


$client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?language=en-US&page=1', [
  'headers' => [
    'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1ZmMyNWE0ZGVmY2YwZjc1ZTQ5NjU5MmI0NzAwZDc5YyIsIm5iZiI6MTcyOTg0MTY5Mi44MjA0MjUsInN1YiI6IjY3MWI0NzhiNWJlOWU4NzU5ZGE3MjQ3NSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.mm9KgwPrHGLcifSu6uHYg4aJC1BmFL9kWC0YIwXIhwM',
    'accept' => 'application/json',
  ],
]);

$datos = json_decode($response->getBody()->getContents());

var_dump($datos->results);