<div class="py-1">
    <p class="mt-3 text-sm text-light mb-0">
        <i class="bx bxs-heart text-danger"></i> Spare a minute and support us by clicking the ad below
    </p>
    <?php
    $ads = [
        'https://greetingsdaydreamlitre.com/kc7gf4zjb3?key=259187d8fb693730b6ee7fb17e8139ad',
        'https://support-us.moviesx.me/78v/61579754',
    ];
    ?>
    <a target="_blank" id="ad-content" class="ad-content btn btn-danger col-12 mt-2" href="<?= $ads[rand(0, count($ads) - 1)] ?>">
        <!-- <span>Support us</span>
        <i class="bx bx-right-arrow-alt "></i> -->
        <span>Ad Content</span>
        <i class=" bx bx-tab"></i>
    </a>
</div>