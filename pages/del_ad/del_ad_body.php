<?php
require_once "./../../api/db/connect.php";
$ad = R::getRow('SELECT * FROM ads WHERE id = ?', [$_GET['id']]);
$img = json_decode($ad['img']);
?>

<div class="flex max-w-[400px] gap-5 items-center">
    <div class="w-[60px] h-[60px] rounded-[10px] bg-cover bg-center bg-[url('https://kyrgyz.space/p/autopark/app/api/img/<?= $img[0] ?>')]"></div>
    <div class="flex-1"><?= $ad['search'] ?></div>
    <div onclick="deleteAd('<?= $ad['id'] ?>');" class="btn">Удалить</div>
</div>