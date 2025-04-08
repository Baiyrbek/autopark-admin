<?php require_once "./../api/db/connect.php" ?>
<div class="pt-[100px]">
    <div class=" shadow-lg px-5 py-2 text-[20px] rounded-full fixed top-5 left-[100px] z-[99] bg-white">
        Баннеры в категориях
    </div>
    <div class=" px-6">
        <?php

        $q = R::getAll('SELECT * FROM catbanners');
        foreach ($q as $banner) {
        ?>
            <div class="mb-6">
                <div class="mb-2"><?= $banner['name'] ?></div>
                <label for="img<?= $banner['id'] ?>" class="neu block bg-cover bg-center w-[300px] h-[69px] rounded-[10px] bg-[url(img/catbanners/<?= $banner['img'] ?>)]"></label>
                <input onchange="showPicture($(this));addCatBanner($(this), <?= $banner['id'] ?>);" class="hidden img" type="file" name="img<?= $banner['id'] ?>" id="img<?= $banner['id'] ?>" accept="image/*" />
            </div>
        <?php
        }
        ?>
    </div>
</div>