<?php require_once "./../api/db/connect.php" ?>
<div class="pt-[100px]">
    <div class=" shadow-lg px-5 py-2 text-[20px] rounded-full fixed top-5 left-[100px] z-[99] bg-white">
        Типы кузова
    </div>
    <div class="flex flex-wrap px-6 gap-[40px]">
        <div class="neu  rounded-[10px] p-5 px-8 max-w-[400px] h-max">
            <h3 class="text-center text-xl mb-2 font-semibold">Добавить кузов</h3>
            <div class="mb-1">Название</div>
            <input class="block text-black w-full rounded px-3 py-1 name" type="text" name="name" id="name" />
            <hr class="my-3" />
            <div class="mb-1">Выберите фото</div>
            <label for="img" class="w-[120px] h-[120px] bg-[#666] rounded mx-auto block bg-cover bg-center bg-[url(bg.jpg)] neu"> </label>
            <input onchange="showPicture($(this));" class="hidden img" type="file" name="img" id="img" accept="image/*" />
            <hr class="my-3" />
            <div class="btn" onclick="addBody($(this));">Добавить</div>
        </div>
        <div>
            <?php
        
            $q = R::getAll('SELECT * FROM body');
            foreach ($q as $body) {
            ?>
                <div class=" body neu2 rounded-[10px] p-5  mb-4">
                    <div class="flex items-center gap-5">
                        <div>
                            <label for="img<?= $body['id'] ?>" class="w-[80px] h-[80px] bg-[#666] rounded mx-auto block bg-cover bg-center bg-[url(img/body/<?= $body['img'] ?>)] neu"> </label>
                            <input onchange="showPicture($(this));" class="hidden" type="file" name="img<?= $body['id'] ?>" id="img<?= $body['id'] ?>" accept="image/*" />
                        </div>
                        <div class="w-[100px]">
                            <?= $body['name'] ?>
                        </div>
                        <div onclick="deleteBody('<?= $body['id'] ?>');" class="btn text-[24px] text-white bg-black rounded-[8px] w-[48px] h-[48px] flex justify-center items-center"><i class="fa-solid fa-trash"></i></div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</div>