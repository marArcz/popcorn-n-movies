<?php
require_once '../includes/utils.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popcorn and Movies</title>
    <?php require_once '../includes/header.php' ?>
</head>

<body>
    <?php include_once '../includes/navbar.php' ?>
    <section class="hero w-100">
        <div class="backdrop-overlay"></div>
        <img src="../assets/images/hero-bg.jpg" alt="" class="hero__img">
        <div class="hero__content d-flex align-items-center py-lg-5 py-2">
            <div class="container-lg">
                <h1 class="text-title fw-semibold">Get your popcorn and choose your movie</h1>
                <p class="text-tagline fw-medium text-white-50">Enjoy free movies online without limit</p>
                <div class="col-md-4 mt-3">
                    <form class="d-flex" action="search.php" role="search">
                        <input name="keyword" required class="form-control form-control-lg me-2" type="search" placeholder="Search for a movie..." aria-label="Search for a movie...">
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                    </form>
                </div>

                <!-- <h1 class="text-title"><?= $movies[0]['title'] ?></h1>
                <p class=" fs-4 text-body-secondary"><?= $movies[0]['overview'] ?></p>
                <a href="watch.php?m=<?= $movies[0]['id'] ?>" class="mt-3 btn btn-dark btn-lg">Watch now</a> -->
            </div>
        </div>
    </section>
    <section>
        <div class="container-lg py-4 w-100">
            <?php include '../includes/ad-content.php' ?>
            <h3 class="text-danger mb-1 mt-4">Trending 🔥</h3>
            <?php
            $movies = discoverMovies([
                'primary_release_year' => date('Y'),
                'sort_by' => 'popularity.desc',
            ]);

            require '../includes/movie-list.php';
            ?>
        </div>
    </section>
    <?php
    require_once '../includes/scripts.php';
    include_once '../includes/footer.php';
    ?>
</body>

</html>