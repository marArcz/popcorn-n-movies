<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface;

require_once('../vendor/autoload.php');

const TMDB_API_KEY = "065e1eefaa9a910ce75bf38ae0cad5ae";
const TMDB_ACCESS_TOKEN = "Bearer " . "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwNjVlMWVlZmFhOWE5MTBjZTc1YmYzOGFlMGNhZDVhZSIsIm5iZiI6MTcyMjk1MzU2Ni4yNDcyOCwic3ViIjoiNjZiMjI5ZjY1NTA0NmNmMjM5ZWI5MmI5Iiwic2NvcGVzIjpbImFwaV9yZWFkIl0sInZlcnNpb24iOjF9.GCRrmN6R4aIjxY5FwaQxi9NiemMCuqcUv0fnDLrpa5Q";

function makeRequest(string $url, string $method = 'GET'): ResponseInterface
{
    $client = new \GuzzleHttp\Client();
    $response = $client->request($method, "https://api.themoviedb.org/3" . $url, [
        'headers' => [
            'Authorization' => TMDB_ACCESS_TOKEN,
            'accept' => 'application/json',
        ],
    ]);

    return $response;
}

function getTmdbImage(string $path, string $size = 'original')
{
    return "https://image.tmdb.org/t/p/$size/$path";
}

function getMovieList(string $category, int $page = 1): array
{
    $response = makeRequest("/movie/$category?language=en-US&page=$page");

    return json_decode((string)$response->getBody(), true);
}

function getMoviesByGenre(int $genre, int $page = 1): array
{
    $response = makeRequest("/discover/movie?include_adult=false&include_video=false&sort_by=popularity.desc&with_genres=$genre&page=$page");

    return json_decode((string)$response->getBody(), true);
}

function findMovie(string $query, int $page = 1): array
{
    $response = makeRequest("/search/movie?query=$query&include_adult=false&language=en-US&page=$page");
    return json_decode((string)$response->getBody(), true);
}

function getMovie(string $id): array
{

    $response = makeRequest("/movie/$id?append_to_response=credits");

    return json_decode((string)$response->getBody(), true);
}

function getGenres(string $type = 'movie'): array
{
    $response = makeRequest("/genre/$type/list");

    return json_decode((string)$response->getBody(), true);
}
function getSimilarMovies(string $id)
{
    $response = makeRequest("/movie/$id/similar");
    return json_decode((string)$response->getBody(), true);
}

function formatRuntime(int $minutes): string
{
    if ($minutes <= 0) {
        return "0m";
    }

    $hours = floor($minutes / 60);
    $mins = $minutes % 60;

    $runtime = "";

    if ($hours > 0) {
        $runtime .= "{$hours}h";
    }

    if ($mins > 0) {
        if (strlen($runtime) > 0) {
            $runtime .= " ";
        }
        $runtime .= "{$mins}m";
    }

    return $runtime;
}

function formatDate($dateString)
{
    // Parse the date string into a DateTime object
    $date = new DateTime($dateString);

    // Array of month names
    $monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];

    // Extract year, month, and day
    $year = $date->format('Y');
    $month = $monthNames[(int)$date->format('n') - 1]; // Get the month name from the array
    $day = $date->format('j'); // Get the day of the month

    // Format as "Month Day, Year"
    return "{$month} {$day}, {$year}";
}
