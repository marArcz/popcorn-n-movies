<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-lg">
        <a class="navbar-brand" href="index.php">
            <img src="../assets/images/logo-lg.png" width="140" class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link"  href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="movies.php?title=Now Playing&category=now_playing">Now Playing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="movies.php?title=Popular&category=popular">Popular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="movies.php?title=Top rated&category=top_rated">Top rated</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="movies.php?title=PH Movies&with_origin_country=PH">PH Movies</a>
                </li>
            </ul>
            <form class="d-flex" action="search.php" role="search">
                <input name="keyword" required class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-danger" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="w-100 bg-body-secondary py-2 ">
    <div class="container-lg">
        <div class="d-flex gap-2">
            <button class="btn btn-dark btn-sm d-block"><</button>
            <ul class="genre-nav flex-1">
                <?php
                $genres = getGenres('movie');
                ?>
                <?php foreach ($genres['genres'] as $genre): ?>
                    <li class="nav-item">
                        <a class="nav-link link-light active" href="movies.php?title=<?= $genre['name']. ' Movies' ?>&with_genres=<?= $genre['id'] ?>"><?= $genre['name'] ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
            <button class="btn btn-dark btn-sm d-block">></button>
        </div>
    </div>
</div>