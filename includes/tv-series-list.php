<div class="row mt-1 border-box gx-3 gy-3 ">
    <?php foreach ($tvShows['results'] as $key => $tvShow): ?>
        <?php if (!$tvShow['poster_path']) continue ?>
        <div class="col-lg-2 col-6 col-sm-4 col-md-4">
            <div class="movie-card">
                <a title="<?= $tvShow['name'] ?>" href="watch-series.php?m=<?= $tvShow['id'] ?>" class="text-light text-decoration-none">
                    <div class="position-relative">
                        <img height="300" loading="lazy" class="movie-card__img" src="<?= getTmdbImage($tvShow['poster_path'], 'w300') ?>" alt="<?= $tvShow['name'] ?> poster">
                        <div class="movie-card__overlay position-absolute w-100 h-100">
                            <div class="movie-card__play-btn">
                                <i class="bx bx-play"></i>
                            </div>
                        </div>
                    </div>
                    <div class="rating bg-warning rounded text-dark fw-bold z-2 shadow">
                        <i class="bx bxs-star text-white"></i>
                        <span><?= $tvShow['vote_average'] ?></span>
                    </div>
                    <p class="text-sm mt-2 mb-0 text-white-50">
                        <?=  $tvShow['first_air_date']? date('Y', strtotime($tvShow['first_air_date'])):'' ?>
                    </p>
                    <p class="movie-card__title mt-1 fs-6 "><?= $tvShow['name'] ?></p>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>