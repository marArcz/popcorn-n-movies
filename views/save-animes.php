<?php
require '../includes/utils.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$params = [
    'air_date.gte' => date('Y') . '-01-01',
    'air_date.lte' => date('Y-m-d'),
    'first_air_date_year' => intval(date('Y')),
    'sort_by' => 'popularity.desc',
    'with_genres' => '16',
    'with_type' => '4',
    'page' => $page
];
$animes = discoverTvShows($params);

var_dump($animes);
