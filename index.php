<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autopark Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1fd78dc055.js" crossorigin="anonymous"></script>
</head>
<style>
    .btn {
        background-color: black;
        padding: 8px 6px;
        text-align: center;
        border-radius: 6px;
        cursor: pointer;
        outline: 1px solid #fff;
        color: white;
    }

    .btn:hover {
        opacity: 0.8;
    }

    .menu__item {
        padding: 5px 4px;
        border-bottom: 1px solid #fff;
        cursor: pointer;
    }

    .menu__item:hover {
        background: #fff4;
    }

    .menu__item.active {
        color: yellow;
    }

    .neu {
        background: linear-gradient(145deg, #cacaca, #f0f0f0);
        box-shadow: 20px 20px 60px #bebebe,
            -20px -20px 60px #ffffff;
    }

    .neu2 {
        background: #e0e0e0;
        box-shadow: inset 20px 20px 60px #bebebe,
            inset -20px -20px 60px #ffffff;
    }
</style>

<body>
    <div onclick="$(this).next().toggle(400);" class="w-[60px] h-[60px] shadow-lg flex items-center justify-center text-[28px] rounded-full fixed top-5 left-5 cursor-pointer z-[99] bg-white">
        <i class="fa-solid fa-bars"></i>
    </div>
    <div class="fixed w-full h-screen bg-[#0009] top-0 left-0 hidden z-[100] menu" onclick="$(this).toggle(500);">
        <div class="bg-black w-[300px] h-full overflow-y-auto text-white px-3 pt-3" onclick="event.stopPropagation()">
            <div class="menu__item active" page="brands.php">Бренды</div>
            <div class="menu__item" page="body_type.php">Типы кузова</div>
            <div class="menu__item" page="stories.php">Истории</div>
            <div class="menu__item" page="cat_banners.php">Баннеры в категориях</div>
            <div class="menu__item" page="del_ad.php">Удалить объявление</div>
        </div>
    </div>
    <div id="body"></div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src='./js/pages.js?v=106'></script>
<script src='./js/pages/brands.js?v=106'></script>
<script src='./js/pages/body.js?v=106'></script>
<script src='./js/pages/stories.js?v=106'></script>
<script src='./js/pages/cat_banners.js?v=106'></script>
<script src='./js/functions.js?v=106'></script>

</html>