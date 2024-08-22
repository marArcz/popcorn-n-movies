<?php
require_once '../includes/utils.php';

$type = isset($_GET['type']) ? $_GET['type'] : 'movies';

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
                    <span> Search</span>
                    <i class="bx bx-search ms-1 fs-5"></i>
                </h4>
                <form class="d-flex" action="search.php" role="search">
                    <input name="keyword" required value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>" class="form-control form-control-lg me-2" type="search" placeholder="Search for a movie..." aria-label="Search for a movie...">
                    <!-- <button class="btn btn-outline-danger" type="submit">Search</button> -->
                </form>
            </div>
            <div class="mt-4">
                <p class="fs-5 text-center mb-1 text-white-50">Results for <span class="text-danger-emphasis">"<?= $_GET['keyword'] ?>":</span></p>
                <ul class="nav nav-underline justify-content-center mt-2 mb-4">
                    <li class="nav-item">
                        <a class="nav-link fs-5 link-warning <?= $type === 'movies'?'active':'' ?>" aria-current="page" href="?keyword=<?= $_GET['keyword'] ?>&type=movies">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 link-warning <?= $type === 'series'?'active':'' ?>" href="?keyword=<?= $_GET['keyword'] ?>&type=series">TV Series</a>
                    </li>
                </ul>
                <?php if (isset($_GET['keyword'])): ?>
                    <?php if ($type === 'series'): ?>
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $animes = findTvShow($_GET['keyword'], $page);
                        $totalResults = $animes['total_results'];
                        $totalPages = $animes['total_pages'];
                        ?>
                        <p class="mb-1"><?= $totalResults ?> TV Series found.</p>
                        <?php require '../includes/anime-list.php' ?>
                    <?php else: ?>
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $movies = findMovie($_GET['keyword'], $page);
                        $totalResults = $movies['total_results'];
                        $totalPages = $movies['total_pages'];
                        ?>
                        <p class="mb-1"><?= $totalResults ?> movies found.</p>
                        <?php require '../includes/movie-list.php' ?>
                    <?php endif ?>
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