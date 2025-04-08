<?php require_once "./../api/db/connect.php" ?>
<div class=" pt-[120px] ">
    <div class=" shadow-lg px-5 py-2 text-[20px] rounded-full fixed top-5 left-[100px] z-[99] bg-white">
        Истории
    </div>
    <div class="flex flex-wrap px-6 gap-[40px]">
        <div class="neu  rounded-[10px] p-5 px-8 max-w-[400px] h-max">
            <h3 class="text-center text-xl mb-2 font-semibold">Добавить историю</h3>
            <hr class="my-3" />
            <div class="mb-1">Выберите фото</div>
            <hr class="my-3" />
            <label for="img1" class="w-[120px] h-[120px] bg-[#666] rounded mx-auto block bg-cover bg-center bg-[url(bg.jpg)] neu"> </label>
            <input onchange="showPicture($(this));" class="hidden preview" type="file" name="img1" id="img1" accept="image/*" />
            <hr class="my-3" />
            <hr class="my-3" />
            <label for="img" class="w-[120px] h-[210px] bg-[#666] rounded mx-auto block bg-cover bg-center bg-[url(bg.jpg)] neu"> </label>
            <input onchange="showPicture($(this));" class="hidden img" type="file" name="img" id="img" accept="image/*" />
            <hr class="my-3" />
            <div class="btn" onclick="addStory($(this));">Добавить</div>
        </div>
        <div class="grid w-[350px] grid-cols-2 gap-10 h-max pb-10">
            <?php
            $q = R::getAll('SELECT * FROM stories');
            foreach ($q as $story) {
            ?>
                <div>
                    <div class="neu mb-3 w-full pt-[100%] bg-[#666] rounded-[15px] mx-auto block bg-cover bg-center bg-[url(img/stories_preview/<?= $story['img'] ?>)]"></div>
                    <div ondblclick="deleteStory(<?= $story['id'] ?>);" for="img<?= $story['id'] ?>" class="neu w-full pt-[180%] bg-[#666] rounded-[15px] mx-auto block bg-cover bg-center bg-[url(img/stories/<?= $story['img'] ?>)]"> </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>