<?php
require_once '../includes/utils.php';

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
    <section>
        <div class="container-lg">
            <div class=" mt-3">
                <h4 class="mb-3 text-warning">
                    <span>Movie Search</span>
                    <i class="bx bx-search ms-1 fs-5"></i>
                </h4>
                <form class="d-flex" action="search.php" role="search">
                    <input name="keyword" required value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>" class="form-control form-control-lg me-2" type="search" placeholder="Search for a movie..." aria-label="Search for a movie...">
                    <!-- <button class="btn btn-outline-danger" type="submit">Search</button> -->
                </form>
            </div>

            <div class="mt-4">
                <?php if (isset($_GET['keyword'])): ?>
                    <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $movies = findMovie($_GET['keyword'], $page);
                    $totalResults = $movies['total_results'];
                    $totalPages = $movies['total_pages'];
                    ?>
                    <p class="fs-5 mb-1 text-white-50">Results for <span class="text-danger-emphasis">"<?= $_GET['keyword'] ?>":</span></p>
                    <p class="text-white-50"><?= number_format($totalResults) ?> movies found.</p>
                    <div class="row mt-3 border-box gx-3 gy-3 ">
                        <?php foreach ($movies['results'] as $key => $movie): ?>
                            <?php if (!$movie['poster_path']) continue ?>
                            <div class="col-lg-2 col-md-4">
                                <div class="movie-card">
                                    <div class="rating bg-warning rounded text-dark fw-bold z-2 shadow">
                                        <i class="bx bxs-star text-white"></i>
                                        <span><?= $movie['vote_average'] ?></span>
                                    </div>
                                    <a href="watch.php?m=<?= $movie['id'] ?>" class="text-light text-decoration-none">
                                        <img loading="lazy" class="movie-card__img" src="<?= getTmdbImage($movie['poster_path'] ? $movie['poster_path'] : '', 'w300') ?>" alt="<?= $movie['title'] ?> poster">
                                        <p class="movie-card__title mt-2"><?= $movie['title'] ?></p>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>
    <?php
    $query_params = "?keyword=" . $_GET['keyword'];
    include_once '../includes/pagination.php';
    ?>

    <?php
    require_once '../includes/scripts.php';
    include_once '../includes/footer.php';
    ?>
</body>

</html>