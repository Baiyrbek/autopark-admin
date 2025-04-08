<?php require_once "./../api/db/connect.php" ?>
<div class="pt-[100px]">
    <div class=" shadow-lg px-5 py-2 text-[20px] rounded-full fixed top-5 left-[100px] z-[99] bg-white">
        Удалить объявление
    </div>
    <div class=" px-6">
        <input type="number" onkeyup="$('.del__body').load('pages/del_ad/del_ad_body.php?id='+$(this).val())" placeholder="ID" class="bg-[#eee] px-4 py-2" />
    </div>
    <div class=" p-6 del__body">

    </div>
</div>