<?php if ($totalPages > 1): ?>
    <div class="container-lg py-2 text-center">
        <nav aria-label="">
            <ul data-bs-theme="red" class="pagination justify-content-lg-end justify-content-center">
                <?php
                $index = 1;
                ?>
                <li class="page-item"><a class="page-link link-light <?= $page == 1 ? 'disabled' : '' ?>" href="<?= $query_params ?>&page=1">
                        <<
                            </a>
                </li>
                <li class="page-item"><a class="page-link link-light <?= $page == 1 ? 'disabled' : '' ?>" href="<?= $query_params ?>&page=<?= $page - 1 ?>">Prev</a></li>
                <?php
                $displayed = 0;
                $prevs = $page > 1 ? 1 : 0;
                $prevs = $page == $totalPages ? 2 : $prevs;
                $nextPages = 2 - $prevs;
                $prevIndex = $page - $prevs;
                $nextIndex = $page + $nextPages;
                ?>
                <?php while ($prevIndex <= $nextIndex && $prevIndex <= $totalPages): ?>
                    <li class="page-item"><a class="page-link link-light <?= $prevIndex == $page ? 'active' : '' ?>" href="<?= $query_params ?>&page=<?= $prevIndex ?>"><?= $prevIndex++ ?></a></li>
                <?php endwhile ?>
                <li class="page-item"><a class="page-link link-light <?= $page == $totalPages ? 'disabled' : '' ?>" href="<?= $query_params ?>&page=<?= $page + 1 ?>">Next</a></li>
                <li class="page-item"><a class="page-link link-light <?= $page == $totalPages ? 'disabled' : '' ?>" href="<?= $query_params ?>&page=<?= $totalPages ?>">>></a></li>
            </ul>
        </nav>
    </div>
<?php endif ?>