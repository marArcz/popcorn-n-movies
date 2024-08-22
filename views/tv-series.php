<?php
require_once '../includes/utils.php';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popcorn and Movies - TV Series</title>
    <?php include_once '../includes/header.php' ?>
</head>

<body>
    <?php $type = 'series'; ?>
    <?php include_once '../includes/navbar.php' ?>
    <!-- content -->
    <section class="hero w-100">
        <div class="backdrop-overlay"></div>
        <img src="../assets/images/hero-bg.jpg" alt="" class="hero__img">
        <div class="hero__content d-flex align-items-center py-lg-5 py-2">
            <div class="container-lg">
                <h1 class="text-title fw-semibold">TV Series</h1>
                <p class="fs-4 fw-medium text-white-50">Enjoy a wide selection of anime, Korean dramas, and various television series</p>
                <div class="col-md-4 mt-3">
                    <form class="d-flex" action="search.php" role="search">
                        <input name="keyword" required class="form-control form-control-lg me-2" type="search" placeholder="Search for TV series..." aria-label="Search for TV series">
                        <input type="hidden" name="type" value="series">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="container-lg py-4">
        <?php include '../includes/ad-content.php' ?>
        <!-- Latest Animes -->
        <div class="mt-4">
            <?php
            $params = [
                'first_air_date.gte' => date('Y') . '-01-01',
                'first_air_date.lte' => date('Y-m-d'),
                'first_air_date_year' => intval(date('Y')),
                'sort_by' => 'popularity.desc',
                'with_genres' => '16',
                'with_origin_country' => 'JP',
                'page' => $page
            ];
            $tvShows = discoverTvShows($params);
            ?>
            <div class="d-flex align-items-center">
                <h3 class="text-danger">Anime Collection</h3>
                <a href="series.php?title=Anime Collection&<?= http_build_query($params) ?>" class="ms-auto link-warning">View all</a>
            </div>
            <?php require '../includes/tv-series-list.php'; ?>

            <div class="mt-4">
                <?php
                $params = [
                    'first_air_date.gte' => date('Y') . '-01-01',
                    'first_air_date.lte' => date('Y-m-d'),
                    'first_air_date_year' => intval(date('Y')),
                    'sort_by' => 'popularity.desc',
                    'with_origin_country' => 'KR',
                    'page' => $page
                ];
                $tvShows = discoverTvShows($params);
                ?>
                <div class="d-flex align-items-center">
                    <h3 class="text-danger">Kdramas</h3>
                    <a href="series.php?title=Kdramas&<?= http_build_query($params) ?>" class="ms-auto link-warning">View all</a>
                </div>
                <?php require '../includes/tv-series-list.php'; ?>

            </div>

        </div>
    </section>
</body>

</html>