<?php require_once "./../../api/db/connect.php";
?>

<div class=" flex gap-4 items-center">
    <div>
        <label for="img__model<?= $_GET['parent'] ?>" class="w-[60px] h-[60px] bg-[#666] rounded mx-auto block bg-cover bg-center bg-[url(bg.jpg)] neu"> </label>
        <input onchange="showPicture($(this));" class="hidden img" type="file" name="img__model<?= $_GET['parent'] ?>" id="img__model<?= $_GET['parent'] ?>" accept="image/*" />
    </div>
    <input class="block text-black w-full rounded px-3 py-1" type="text" placeholder="Модель" />
    <div onclick="addModel($(this))" parent="<?= $_GET['parent'] ?>" class="btn">Добавить</div>
</div>
<?php
$q = R::getAll('SELECT * FROM models WHERE parent = ? ORDER BY name', [$_GET['parent']]);
foreach ($q as $model) {
?>
    <div class="model">
        <hr class="my-2 border-[grey]" />
        <div class="flex gap-4 items-center">
            <div>
                <label for="img__model<?= $model['id'] ?>" class="w-[60px] h-[60px] bg-[#666] rounded mx-auto block bg-cover bg-center bg-[url(img/models/<?= $model['img'] ?>)] neu"> </label>
                <input onchange="showPicture($(this));checkPicture($(this));" img="<?= $model['img'] ?>" model="<?= $model['id'] ?>" parent="<?= $_GET['parent'] ?>" class=" hidden" type="file" name="img__model<?= $model['id'] ?>" id="img__model<?= $model['id'] ?>" accept="image/*" />
            </div>
            <div class="flex-1"><?= $model['name'] ?></div>
            <div onclick="toggleGeneration($(this));" parent="<?= $model['id'] ?>" class="font-semibold text-right hover:text-[#999] cursor-pointer">Поколения <i class="fa-solid fa-chevron-down"></i></div>
            <div onclick="deleteModel(<?= $model['id'] ?>, $(this));" parent="<?= $model['parent'] ?>" class="btn text-[24px] text-white bg-black rounded-[8px] w-[48px] h-[48px] flex justify-center items-center"><i class="fa-solid fa-trash"></i></div>
        </div>
        <div class="generations p-5 bg-white rounded-[10px] mt-3 hidden">

        </div>
    </div>
<?php } ?>