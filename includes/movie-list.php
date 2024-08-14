<div class="row mt-3 border-box gx-3 gy-3 ">
    <?php foreach ($movies['results'] as $key => $movie): ?>
        <?php if (!$movie['poster_path']) continue ?>
        <div class="col-lg-2 col-6 col-md-4">
            <div class="movie-card">
                <a href="watch.php?m=<?= $movie['id'] ?>" class="text-light text-decoration-none">
                    <img class="movie-card__img" src="<?= getTmdbImage($movie['poster_path'] ? $movie['poster_path'] : '', 'w200') ?>" alt="<?= $movie['title'] ?> poster">
                    <p class="movie-card__title mt-2"><?= $movie['title'] ?></p>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>