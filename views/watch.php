<?php
if (!isset($_GET['m'])) {
    header('location: index.php');
    exit;
}
require_once '../includes/utils.php';
$movieId = $_GET['m'];

$movie = getMovie($movieId);

$addToWatch($movieId . '__' . $movie['title']);
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $movie['title'] . ' - ' . date('Y',strtotime($movie['release_date'])) ?></title>
    <?php include_once '../includes/header.php' ?>
</head>

<body>
    <?php include_once '../includes/navbar.php' ?>
    <!-- content -->
    <section class="">
        <div class="video-wrapper bg-secondary bg-opacity-50">
            <div id="video-player-overlay" class="overlay position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                <div class="w-100 h-100 position-relative">
                    <div id="play-video-overlay" class=" play-video-overlay position-absolute w-100 h-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-25 z-3">
                        <button data-ads="https://support-us.moviesx.me/78v/61579754" class="btn outline-none border-0" type="button" id="btn-play">
                            <i class="bx bx-play"></i>
                        </button>
                    </div>
                    <img src="<?= getTmdbImage($movie['backdrop_path']) ?>" class=" object-fit-cover position-absolute w-100 h-100 z-2" alt="">
                </div>
            </div>
            <iframe
                referrerpolicy="origin"
                src=""
                id="video-iframe"
                allow="autoplay; encrypted-media"
                data-videosrc2="https://vidsrc.pro/embed/movie/<?= $movieId ?>"
                data-videosrc1="https://vidsrc.xyz/embed/movie/<?= $movieId ?>"
                class="object-fit-contain w-100 position-absolute"
                style="height: 100%;"
                allowfullscreen
                frameborder="0">
            </iframe>
        </div>
        <div class="container-lg py-4">
            <div id="player-info-alert" class="alert alert-light mb-3 mt-4 fs-6 d-none text-warning-emphasis">
                If current player is not working you can choose a different player from the list below.
            </div>
            <div class="">
                <div class="row">
                    <div class="col-md-3 d-lg-block d-md-block d-none col-lg-3">
                        <img class=" img-fluid rounded-3" src="<?= getTmdbImage($movie['poster_path'], 'w300') ?>" alt="">
                    </div>
                    <div class="col">
                        <h3 class="mb-1 fs-1"><?= $movie['title'] ?></h3>
                        <ul class="nav gap-3">
                            <?php foreach ($movie['genres'] as $genre): ?>
                                <li class="nav-item">
                                    <a href="#" class="fs-5 link-danger px-0 nav-link"><?= $genre['name'] ?></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        <div class="mt-1">
                            <p class=" text-warning">
                                <i class="bx bxs-star fs-3"></i>
                                <span class="fs-3"><?= $movie['vote_average'] ?></span>
                                <span class="text-sm text-secondary">imdb score</span>
                            </p>
                            <p><span class="fw-medium">Release date:</span>: <?= formatDate($movie['release_date']) ?></p>
                            <p><span class="fw-medium">Duration</span>: <?= formatRuntime($movie['runtime']) ?></p>
                        </div>
                        <div class="mt-3">
                            <p class="text-sm my-1 text-secondary">OVERVIEW</p>
                            <p class="my-0 fs-5 text-white-50"><?= $movie['overview'] ?></p>
                        </div>
                        <?php if ($movie['credits']['crew']): ?>
                            <div class="mt-3">
                                <p class="text-secondary">Crew</p>
                                <div class="mt-2 row row-cols-lg-3 row-cols-3">
                                    <?php
                                    $count = 0;
                                    foreach ($movie['credits']['crew'] as $crew):
                                        if ($count >= 5) break; // Stop the loop after 5 elements
                                        $count++;
                                    ?>
                                        <div class="col">
                                            <p class="fw-medium mb-0 overflow-hidden text-truncate"><?= $crew['name'] ?></p>
                                            <p class="text-white-50"><?= $crew['job'] ?></p>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <p class="mb-2">Players</p>
                            <button type="button" data-player="videosrc1" class="btn-set-player btn btn-light col-12">Player 1</button>
                            <button type="button" data-player="videosrc2" class="btn-set-player btn btn-outline-light mt-2 col-12">Player 2</button>
                        </div>
                        <a target="_blank" class="btn btn-danger mt-4 col-12" href="https://greetingsdaydreamlitre.com/kc7gf4zjb3?key=259187d8fb693730b6ee7fb17e8139ad">Stream in HD</a>
                        <a target="_blank" class="btn btn-danger col-12 mt-2" href="https://greetingsdaydreamlitre.com/kc7gf4zjb3?key=259187d8fb693730b6ee7fb17e8139ad">Download in HD</a>
                        <p class="mt-3 mb-0 text-sm text-white-50">
                            <small>Please Support us by clicking the ad below <i class=" text-danger bx bxs-heart"></i></small>
                        </p>
                        <a target="_blank" class="btn btn-danger col-12 mt-2" href="https://greetingsdaydreamlitre.com/kc7gf4zjb3?key=259187d8fb693730b6ee7fb17e8139ad">Ad Content <i class=" bx bx-tab"></i></a>
                    </div>
                </div>
                <?php if ($movie['credits']['cast']): ?>
                    <div class="mt-3">
                        <h4 class="text-white-50">Top Cast</h4>
                        <div class="mt-2 row gx-3 gy-3 align-items-end">
                            <?php
                            $count = 0;
                            foreach ($movie['credits']['cast'] as $cast):
                                if ($count >= 6) break; // Stop the loop after 5 elements
                                $count++;
                            ?>
                                <div class="cast-card col-lg-2 col-4">
                                    <?php if ($cast['profile_path']): ?>
                                        <img class="img-fluid " src="<?= getTmdbImage($cast['profile_path'], 'w200') ?>" alt="">
                                    <?php endif ?>
                                    <div class="">
                                        <div class="text-center mb-2">
                                        </div>
                                        <p class="fw-medium mb-0"><?= $cast['name'] ?></p>
                                        <p class=" text-sm text-white-50 mb-0"><?= $cast['character'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endif ?>
                <div class="mt-4">
                    <h4 class="text-white-50">Related Movies</h4>
                    <?php
                    $movies = getSimilarMovies($movieId);
                    include_once '../includes/movie-list.php';
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    $no_ads = true;
    require_once '../includes/scripts.php';
    include_once '../includes/footer.php';
    ?>
</body>

</html>