<?php
if (!isset($_GET['m'])) {
    header('location: index.php');
    exit;
}
require_once '../includes/utils.php';
$seriesId = $_GET['m'];
$series = getSeries($seriesId);

$seasonNo = isset($_GET['s']) ? $_GET['s'] : 1;

$season = getSeason($seriesId, $seasonNo);
$episodeNo = isset($_GET['ep']) ? $_GET['ep'] : $season['episodes'][0]['episode_number'];

$addToWatch($seriesId . '__' . $series['name']);
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
        <div id="video-player" class="video-wrapper bg-secondary bg-opacity-50 position-relative">
            <div id="video-player-overlay" class="overlay position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                <div class="w-100 h-100 position-relative">
                    <div id="play-video-overlay" class=" play-video-overlay position-absolute w-100 h-100 d-flex justify-content-center align-items-center bg-dark bg-opacity-25 z-3">
                        <button data-ads="https://paypou.com/popcornandmovies-recommend/61579754" class="btn outline-none border-0" type="button" id="btn-play">
                            <i class="bx bx-play"></i>
                        </button>
                    </div>
                    <img src="<?= getTmdbImage($series['backdrop_path']) ?>" class=" object-fit-cover position-absolute w-100 h-100 z-2" alt="">
                </div>
            </div>
            <iframe
                id="video-iframe"
                referrerpolicy="origin"
                src=""
                data-videosrc="https://vidsrc.xyz/embed/tv?tmdb=<?= $seriesId ?>&autoplay=1&season=<?= $seasonNo ?>&episode=<?= $episodeNo ?>&ds_lang=en"
                class="object-fit-contain w-100 position-absolute"
                style="height: 100%;"
                allowfullscreen
                frameborder="0">
            </iframe>
        </div>
        <div class="container-lg py-4">
            <div class="">
                <!-- season list -->
                <div class="d-flex w-100 overflow-x-auto gap-2 py-3">
                    <?php foreach ($series['seasons'] as $seasonItem): ?>
                        <?php
                        ?>
                        <a title="Season <?= $seasonItem['season_number'] ?> | <?= $seasonItem['name'] ?>" href="?m=<?= $seriesId ?>&s=<?= $seasonItem['season_number'] ?>" class="season-btn btn border <?= $seasonItem['season_number'] == $seasonNo ? 'border-danger text-danger' : 'text-light border-light' ?> text-decoration-none">
                            <h6 class="mb-0 text-truncate">Season <?= $seasonItem['season_number'] ?> | <?= $seasonItem['name'] ?></h6>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-3 d-lg-block d-md-block d-none col-lg-3">
                        <img class=" img-fluid rounded-3" src="<?= getTmdbImage($season['poster_path']?$season['poster_path']:$series['poster_path'], 'w300') ?>" alt="">
                    </div>
                    <div class="col">
                        <h3 class="mb-1 fs-1"><?= $series['name'] ?></h3>
                        <h5 class="mb-1 fs-5"><?= $season['name'] ?></h5>
                        <ul class="nav gap-3">
                            <?php foreach ($series['genres'] as $genre): ?>
                                <li class="nav-item">
                                    <a href="#" class="fs-5 link-danger px-0 nav-link"><?= $genre['name'] ?></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        <div class="mt-1">
                            <p class=" text-warning">
                                <i class="bx bxs-star fs-3"></i>
                                <span class="fs-3"><?= $series['vote_average'] ?></span>
                                <span class="text-sm text-secondary">imdb score</span>
                            </p>
                            <p><span class="fw-medium">Release date:</span>: <?= formatDate($series['first_air_date']) ?></p>
                            <p><span class="fw-medium">Number of episodes</span>: <?= count($season['episodes']) ?></p>
                        </div>
                        <div class="mt-3">
                            <p class="text-sm my-1 text-secondary">OVERVIEW</p>
                            <p class="my-0 fs-5 text-white-50"><?= $series['overview'] ?></p>
                        </div>
                        <div class="mt-3">
                            <p class="text-warning-emphasis fw-medium">AVAILABLE EPISODES</p>
                            <!-- episode list -->
                            <div class="d-flex flex-wrap episode-nav gap-2">
                                <?php foreach ($season['episodes'] as $index => $episode): ?>
                                    <?php if ($episode['episode_number'] > $series['last_episode_to_air']['episode_number']) break; // Stop the loop up to the latest episode aired 
                                    ?>
                                    <?php $_GET['ep'] = $episode['episode_number'] ?>
                                    <a href="?m=<?= $seriesId ?>&s=<?= $seasonNo ?>&ep=<?= $episode['episode_number'] ?>" class="mb-0 episode-btn btn btn-sm fw-bold btn-<?= $episodeNo == $episode['episode_number'] ? 'light' : 'outline-light' ?>"><?= $episode['episode_number'] ?></a>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <?php if ($series['credits']['crew']): ?>
                            <div class="mt-3">
                                <p class="text-secondary">Crew</p>
                                <div class="mt-2 row row-cols-lg-3 row-cols-3">
                                    <?php
                                    $count = 0;
                                    foreach ($series['credits']['crew'] as $crew):
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
                        <a target="_blank" class="btn btn-danger col-12" href="https://paypou.com/watch-in-hd/61579754">Stream in HD</a>
                        <a target="_blank" class="btn btn-danger col-12 mt-2" href="https://urlef.com/download-movie/61579754">Download in HD</a>
                        <p class="mt-3 mb-0 text-sm text-white-50">
                            <small>Please Support us by clicking the ad below <i class=" text-danger bx bxs-heart"></i></small>
                        </p>
                        <a target="_blank" class="btn btn-danger col-12 mt-2" href="https://urlef.com/support/61579754">Ad Content <i class=" bx bx-tab"></i></a>
                    </div>
                </div>
                <?php if ($series['credits']['cast']): ?>
                    <div class="mt-3">
                        <h4 class="text-white-50">Top Cast</h4>
                        <div class="mt-2 row gx-3 gy-3 align-items-end">
                            <?php
                            $count = 0;
                            foreach ($series['credits']['cast'] as $cast):
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
            </div>
        </div>
    </section>
    <?php
    require_once '../includes/scripts.php';
    include_once '../includes/footer.php';
    ?>
</body>

</html>