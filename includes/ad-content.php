<div class="py-1">
    <p class="mt-3 text-sm text-light mb-0">
        <i class="bx bxs-heart text-danger"></i> Spare a minute and support us by opening the ad below
    </p>
    <?php
    $ads = [
        'https://www.effectivegatecpm.com/fxw1hhy6?key=0594d4c1f6d123c391a5c809d8cce6d4',
        'https://www.effectivegatecpm.com/kc7gf4zjb3?key=259187d8fb693730b6ee7fb17e8139ad'
    ];
    ?>
    <a target="_blank" id="ad-content" class="ad-content btn btn-danger col-12 mt-2" href="<?= $ads[rand(0, count($ads) - 1)] ?>">
        <!-- <span>Support us</span>
        <i class="bx bx-right-arrow-alt "></i> -->
        <span>Ad Content</span>
        <i class=" bx bx-tab"></i>
    </a>
</div>