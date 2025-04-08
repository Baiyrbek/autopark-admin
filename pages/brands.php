<?php require_once "./../api/db/connect.php" ?>
<div class=" pt-[120px] ">
    <div class=" shadow-lg px-5 py-2 text-[20px] rounded-full fixed top-5 left-[100px] z-[99] bg-white">
        Бренды
    </div>
    <div class="flex flex-wrap px-6 gap-[40px]">
        <div class="neu  rounded-[10px] p-5 px-8 max-w-[400px] h-max">
            <h3 class="text-center text-xl mb-2 font-semibold">Добавить бренд</h3>
            <div class="mb-1">Название бренда</div>
            <input class="block text-black w-full rounded px-3 py-1 name" type="text" name="name" id="name" />
            <hr class="my-3" />
            <select name="type" class="type mb-3 block p-2">
                <option value="0">Легковые</option>
                <option value="1">Спецтехника</option>
                <option value="2">Мото</option>
            </select>
            <hr class="my-3" />
            <div class="mb-1">Выберите фото</div>
            <label for="img" class="w-[120px] h-[120px] bg-[#666] rounded mx-auto block bg-cover bg-center bg-[url(bg.jpg)] neu"> </label>
            <input onchange="showPicture($(this));" class="hidden img" type="file" name="img" id="img" accept="image/*" />
            <hr class="my-3" />
            <div class="btn" onclick="addBrand($(this));">Добавить</div>
        </div>
        <div>
            <select onchange="$('.brend').hide();$('.brand'+$(this).val()).show(800);" class="mb-3 block p-2">
                <option value="0">Легковые</option>
                <option value="1">Спецтехника</option>
                <option value="2">Мото</option>
            </select>
            <?php
            $q = R::getAll('SELECT * FROM brands');
            foreach ($q as $brand) {
            ?>

                <div class=" brend brand<?= $brand['type'] ?> neu2 rounded-[10px] p-5  mb-4">
                    <div class="flex gap-4 items-center">
                        <div>
                            <label for="img<?= $brand['id'] ?>" class="w-[80px] h-[80px] bg-[#666] rounded mx-auto block bg-cover bg-center bg-[url(img/brands/<?= $brand['img'] ?>)] neu"> </label>
                            <input onchange="showPicture($(this));" class="hidden" type="file" name="img<?= $brand['id'] ?>" id="img<?= $brand['id'] ?>" accept="image/*" />
                        </div>
                        <div>
                            <input class="block text-black w-full rounded px-3 py-1" type="text" name="name<?= $brand['id'] ?>" id="name<?= $brand['id'] ?>" value="<?= $brand['name'] ?>" />
                            <div onclick="toggleModel($(this));" parent="<?= $brand['id'] ?>" class="mt-1 font-semibold text-right hover:text-[#999] cursor-pointer">Модели <i class="fa-solid fa-chevron-down"></i></div>
                        </div>
                        <div onclick="alert('Недоступно')" class="btn text-[24px] text-white bg-black rounded-[8px] w-[48px] h-[48px] flex justify-center items-center"><i class="fa-solid fa-floppy-disk"></i></div>
                        <div onclick="deleteBrand('<?= $brand['id'] ?>');" class="btn text-[24px] text-white bg-black rounded-[8px] w-[48px] h-[48px] flex justify-center items-center"><i class="fa-solid fa-trash"></i></div>
                    </div>
                    <div class="models pt-6 hidden">
                        <div class="body ">
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</div>