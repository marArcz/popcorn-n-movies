<?php
require_once '../includes/utils.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popcorn and Movies - Watch movies online for free</title>
    <?php require_once '../includes/header.php' ?>
</head>

<body>
    <?php include_once '../includes/navbar.php' ?>
    <section class="hero w-100">
        <div class="backdrop-overlay"></div>
        <img src="../assets/images/hero-bg.jpg" alt="" class="hero__img">
        <div class="hero__content d-flex align-items-center py-lg-5 py-2">
            <div class="container-lg">
                <h1 class="text-title fw-semibold">Pop, Pick, and Play</h1>
                <p class="text-tagline fw-medium text-white-50">Your Free Movie Streaming Haven Awaits!</p>
                <div class="col-md-4 mt-3">
                    <form class="d-flex" action="search.php" role="search">
                        <input name="keyword" required class="form-control form-control-lg me-2" type="search" placeholder="Search for a movie..." aria-label="Search for a movie...">
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-lg py-2 w-100">
            <div class="alert alert-light mb-3 mt-4 fs-5">
                <strong class="">Great news!</strong> You can also now watch a wide selection of <strong>TV Series</strong> on our site including <strong>anime</strong>, <strong>korean dramas</strong>, etc.
                <a href="tv-series.php" class="link-warning">See here!</a>
            </div>
            <?php include '../includes/ad-content.php' ?>
        </div>
    </section>
    <section class="container-lg py-4 w-100">
        <!-- Trending movies -->
        <div class="">
            <?php
            $params = [
                'primary_release_year' => date('Y'),
                'sort_by' => 'popularity.desc',
            ];
            $movies = discoverMovies($params);
            ?>
            <div class="d-flex align-items-center">
                <h3 class="text-danger">Trending 🔥</h3>
                <a href="movies.php?title=Trending Movies&<?= http_build_query($params) ?>" class="ms-auto link-warning">View all</a>
            </div>
            <?php require '../includes/movie-list.php'; ?>
        </div>
        <!-- PH movies -->
        <div class="mt-5 mb-1">
            <?php
            $params = [
                'sort_by' => 'primary_release_date.desc',
                'with_companies' => '149142',
                'primary_release_date.lte' => date('Y-m-d'),

            ];
            $movies = discoverMovies($params);
            ?>
            <div class="d-flex align-items-center">
                <h3 class="text-danger">Vivamax Films</h3>
                <a href="movies.php?title=Vivamax Films&<?= http_build_query($params) ?>" class="ms-auto link-warning">View all</a>
            </div>
            <?php require '../includes/movie-list.php'; ?>
        </div>
        <!-- animes -->
        <div class="mt-5">
            <?php
            $params = [
                'first_air_date.gte' => date('Y') . '-01-01',
                'first_air_date.lte' => date('Y-m-d'),
                'first_air_date_year' => intval(date('Y')),
                'sort_by' => 'popularity.desc',
                'with_genres' => '16',
                'with_origin_country' => 'JP',
            ];
            $tvShows = discoverTvShows($params);
            ?>
            <div class="d-flex align-items-center">
                <h3 class="text-danger">Anime</h3>
                <a href="series.php?title=Anime Collection&<?= http_build_query($params) ?>" class="ms-auto link-warning">View all</a>
            </div>
            <?php require '../includes/tv-series-list.php'; ?>
        </div>
    </section>
    <?php
    require_once '../includes/scripts.php';
    include_once '../includes/footer.php';
    ?>
</body>

</html>