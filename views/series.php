<?php
require_once '../includes/utils.php';

if (!isset($_GET['title'])) {
    header('location: index.php');
    exit;
}
$params = $_GET;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$tvShows = discoverTvShows($params);

$totalPages = $tvShows['total_pages'];
$totalResults = $tvShows['total_results'];


?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popcorn and Movies - Watch TV Shows online for free</title>
    <?php include_once '../includes/header.php' ?>
</head>

<body>
    <?php include_once '../includes/navbar.php' ?>
    <!-- content -->
    <section class="py-3">
        <div class="container-lg">
            <h1 class="fs-3 mt-3 text-danger"><?= $_GET['title'] ?></h1>
            <div class="mt-2">
                <?php
                require '../includes/tv-series-list.php';
                ?>
            </div>
        </div>
    </section>
    <?php
    $title = $_GET['title'];
    $query_params = '?' . http_build_query($params);
    include_once '../includes/pagination.php';
    require_once '../includes/scripts.php';
    include_once '../includes/footer.php';
    ?>
</body>

</html>