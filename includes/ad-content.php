<div class="py-1">
    <p class="mt-3 text-sm text-light mb-0">
        Spare a minute and support us by clicking the ad below <i class="bx bxs-heart text-danger"></i>
    </p>
    <?php
    $ads = [
        'https://fbwatch.moviesx.me/lcHPYyaZY/61579754',
        'https://shrtq.com/support-us/61579754',
        'https://cutpu.com/support-us/61579754',
        'https://urlef.com/support-us/61579754',
        'https://watch.moviesx.me/support-us/61579754',
        'https://support-us.moviesx.me/OOrj/61579754',
        'https://paypou.com/download-movie/61579754'
    ];
    ?>
    <a target="_blank" id="ad-content" class="ad-content btn btn-danger col-12 mt-2" href="<?= $ads[rand(0, count($ads) - 1)] ?>">
        <!-- <span>Support us</span>
        <i class="bx bx-right-arrow-alt "></i> -->
        <span>Ad Content</span>
        <i class=" bx bx-tab"></i>
    </a>
</div>