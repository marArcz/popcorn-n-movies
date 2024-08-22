<?php
require_once '../includes/utils.php';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
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
    <?php $type = 'anime'; ?>
    <?php include_once '../includes/navbar.php' ?>
    <!-- content -->
    <section class="hero w-100">
        <div class="backdrop-overlay"></div>
        <img src="../assets/images/all-anime.jpg" alt="" class="hero__img">
        <div class="hero__content d-flex align-items-end py-lg-5 py-2">
            <div class="container-lg">
                <h1 class="text-title fw-semibold">Anime Collection</h1>
                <p class="fs-4 fw-medium text-white-50">Watch anime online without limit</p>
                <div class="col-md-4 mt-3">
                    <form class="d-flex" action="search.php" role="search">
                        <input name="keyword" required class="form-control form-control-lg me-2" type="search" placeholder="Search for animes..." aria-label="Search for a movie...">
                        <input type="hidden" name="type" value="anime">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="container-lg py-4">
        <!-- Latest Animes -->
        <div class="">
            <?php
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
            ?>
            <div class="d-flex align-items-center">
                <h3 class="text-danger">Our anime collection</h3>
            </div>
            <?php require '../includes/anime-list.php'; ?>

            <!-- pagination -->
            <?php
            $totalPages = $animes['total_pages'];
            $query_params = '?' . http_build_query($params);
            ?>
            <?php require '../includes/pagination.php' ?>
        </div>
    </section>
</body>

</html>