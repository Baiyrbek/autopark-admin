<?php

if (isset($_GET['q'])) {
    require_once "../db/connect.php";
    switch ($_GET['q']) {
        case 'addBody':
            if (isset($_POST['name'])) {
                $imgName = '';
                if (isset($_FILES['img'])) {
                    require_once "../img_script.php";
                    $imgId = R::getCell('SELECT img_id FROM ids');
                    R::exec('UPDATE ids SET img_id = img_id + 1');

                    $file = $_FILES['img'];
                    $width = 800; //pixel
                    $maxSize = 15; //megabyte
                    $path = '../../img/body/';
                    $generatedName = $imgId;
                    $createImg = createImg($file, $width, $maxSize, $path, $generatedName);
                    if ($createImg['result'] == 'success') {
                        $imgName = $createImg['img'];
                    } else {
                        echo json_encode(['result' => 'error', 'msg' =>  $createImg['msg']], JSON_UNESCAPED_UNICODE);
                        break;
                    }
                }
                $res = R::exec('INSERT INTO body (img, name) VALUES (?, ?)', [$imgName, $_POST['name']]);
                if ($res) {
                    echo json_encode(['result' => 'success', 'msg' => 'Кузов успешно добавлен!'], JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode(['result' => 'error', 'msg' => 'Ошибка!'], JSON_UNESCAPED_UNICODE);
                }
            } else {
                echo json_encode(['result' => 'error', 'msg' => 'Пустое поле *name*'], JSON_UNESCAPED_UNICODE);
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
