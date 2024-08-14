<?php
require_once '../includes/utils.php';

if ((!isset($_GET['genre']) || !isset($_GET['category'])) && !isset($_GET['title'])) {
    header('location: index.php');
    exit;
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;

if (isset($_GET['genre'])) {
    $genre_id = $_GET['genre'];
    $movies = getMoviesByGenre($genre_id, $page);
} else {
    $category = $_GET['category'];
    $movies = getMovieList($category, $page);
}

$totalPages = 500;
$totalResults = $movies['total_results'];

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popcorn and Movies</title>
    <?php include_once '../includes/header.php' ?>
</head>

<body>
    <?php include_once '../includes/navbar.php' ?>
    <!-- content -->
    <section class="py-3">
        <div class="container-lg">
            <h1 class="fs-3 mt-3 text-danger"><?= $_GET['title'] ?></h1>
            <p><?= number_format($totalResults) ?> movies found.</p>
            <div class="row mt-3 border-box gx-3 gy-3 ">
                <?php foreach ($movies['results'] as $key => $movie) { ?>
                    <?php if (!$movie['poster_path']) continue ?>
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="movie-card">
                            <a href="watch.php?m=<?= $movie['id'] ?>" class="text-light text-decoration-none">
                                <div class="rating bg-warning rounded text-dark fw-bold z-2 shadow">
                                    <i class="bx bxs-star text-white"></i>
                                    <span><?= $movie['vote_average'] ?></span>
                                </div>
                                <img loading="lazy" class="movie-card__img" src="<?= getTmdbImage($movie['poster_path'], 'w300') ?>" alt="<?= $movie['title'] ?> poster">
                                <p class="movie-card__title mt-2"><?= $movie['title'] ?></p>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php
    $title = $_GET['title'];
    $query_params = "?title=$title&" . (isset($_GET['genre']) ? "genre=" . $_GET['genre'] : "category=" . $_GET['category']);
    include_once '../includes/pagination.php';
    ?>
</body>

</html>