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
    <title>Popcorn and Movies</title>
    <?php include_once '../includes/header.php' ?>
</head>

<body>
    <?php include_once '../includes/navbar.php' ?>
    <!-- content -->
    <section class="">
        <div class="video-wrapper bg-secondary bg-opacity-50">
            <iframe
                src="https://vidsrc.xyz/embed/movie/<?= $movieId ?>"
                class="object-fit-contain w-100 position-absolute"
                style="height: 100%;"
                allowfullscreen
                frameborder="0">
            </iframe>
        </div>
        <div class="container-lg py-4">
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
                        <a target="_blank" class="btn btn-danger col-12" href="https://paypou.com/YmdBZRrv/61579754">Stream in HD</a>
                        <a target="_blank" class="btn btn-danger col-12 mt-2" href="https://paypou.com/YmdBZRrv/61579754">Download in HD</a>
                        <p class="mt-3 mb-0 text-sm text-white-50">
                            <small>Please Support us by clicking the ad below <i class=" text-danger bx bxs-heart"></i></small>
                        </p>
                        <a target="_blank" class="btn btn-danger col-12 mt-2" href="https://paypou.com/YmdBZRrv/61579754">Ad Content <i class=" bx bx-tab"></i></a>
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
    require_once '../includes/scripts.php';
    include_once '../includes/footer.php';
    ?>
</body>

</html>