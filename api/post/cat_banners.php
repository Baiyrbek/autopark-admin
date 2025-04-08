<?php

if (isset($_GET['q'])) {
    require_once "../db/connect.php";
    switch ($_GET['q']) {

        case 'addCatBanner':
            if (isset($_POST['id'])) {
                $imgName = '';
                if (isset($_FILES['img'])) {
                    require_once "../img_script.php";

                    $path = '../../img/catbanners/';
                    $img = R::getCell('SELECT img FROM catbanners WHERE id=?', [$_POST['id']]);
                    unlink($path . $img);
                    $imgId = R::getCell('SELECT img_id FROM ids');
                    R::exec('UPDATE ids SET img_id = img_id + 1');

                    $file = $_FILES['img'];
                    $width = 2200; //pixel
                    $maxSize = 15; //megabyte
                    $path = '../../img/catbanners/';
                    $generatedName = $imgId;
                    $createImg = createImg($file, $width, $maxSize, $path, $generatedName);
                    if ($createImg['result'] == 'success') {
                        $imgName = $createImg['img'];
                    } else {
                        echo json_encode(['result' => 'error', 'msg' =>  $createImg['msg']], JSON_UNESCAPED_UNICODE);
                        break;
                    }
                }
                $res = R::exec('UPDATE catbanners SET img = ? WHERE id = ?', [$imgName, $_POST['id']]);
                if ($res) {
                    echo json_encode(['result' => 'success', 'msg' => 'Фото успешно добавлено!'], JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode(['result' => 'error', 'msg' => 'Ошибка!'], JSON_UNESCAPED_UNICODE);
                }
            } else {
                echo json_encode(['result' => 'error', 'msg' => 'Пустое поле *id*'], JSON_UNESCAPED_UNICODE);
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
