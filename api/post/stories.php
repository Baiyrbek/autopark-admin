<?php

if (isset($_GET['q'])) {
    require_once "../db/connect.php";
    switch ($_GET['q']) {
        case 'addStory':
            $imgName = '';
            if (isset($_FILES['img'])) {
                require_once "../img_script.php";
                $imgId = R::getCell('SELECT img_id FROM ids');
                R::exec('UPDATE ids SET img_id = img_id + 1');

                $file = $_FILES['img'];
                $width = 1200; //pixel
                $maxSize = 15; //megabyte
                $path = '../../img/stories/';
                $generatedName = $imgId;
                $createImg = createImg($file, $width, $maxSize, $path, $generatedName);

                if ($createImg['result'] == 'success') {
                    $imgName = $createImg['img'];
                } else {
                    echo json_encode(['result' => 'error', 'msg' =>  $createImg['msg']], JSON_UNESCAPED_UNICODE);
                    break;
                }
                $width = 100; //pixel
                $path = '../../img/stories_mini/';
                $createImg = createImg($file, $width, $maxSize, $path, $generatedName);

                if (isset($_FILES['preview'])) {
                    $file = $_FILES['preview'];
                    $width = 600; //pixel
                    $path = '../../img/stories_preview/';
                    $createImg = createImg($file, $width, $maxSize, $path, $generatedName);
                }
            }
            $res = R::exec('INSERT INTO stories (img) VALUES (?)', [$imgName]);
            if ($res) {
                echo json_encode(['result' => 'success', 'msg' => 'История успешно добавлена!'], JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(['result' => 'error', 'msg' => 'Ошибка!'], JSON_UNESCAPED_UNICODE);
            }
            break;
        default:
            echo json_encode(['result' => 'error', 'msg' => 'Не найдена команда : ' . $_GET['q']], JSON_UNESCAPED_UNICODE);
            # code...
            break;
    }
} else {
    echo json_encode(['result' => 'error', 'msg' => 'Пустая команда '], JSON_UNESCAPED_UNICODE);
}
