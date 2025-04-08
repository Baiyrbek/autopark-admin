<?php

if (isset($_GET['q'])) {
    require_once "../db/connect.php";
    switch ($_GET['q']) {
        case 'createImg':
            if (isset($_POST['name'])) {
                $imgName = '';
                if (isset($_FILES['img'])) {
                    require_once "../img_script.php";
                    $imgId = R::getCell('SELECT img_id FROM ids');
                    R::exec('UPDATE ids SET img_id = img_id + 1');

                    $file = $_FILES['img'];
                    $width = 1000; //pixel
                    $maxSize = 15; //megabyte
                    $path = '../../img/brands/';
                    $generatedName = $imgId;
                    $createImg = createImg($file, $width, $maxSize, $path, $generatedName);
                    if ($createImg['result'] == 'success') {
                        $imgName = $createImg['img'];
                    } else {
                        echo json_encode(['result' => 'error', 'msg' =>  $createImg['msg']]);
                        break;
                    }
                }
                $res = R::exec('INSERT INTO catalog (img, name) VALUES (?, ?)', [$imgName, $_POST['name']]);
                if ($res) {
                    echo json_encode(['result' => 'success', 'msg' => 'Категория успешно добавлена!']);
                } else {
                    echo json_encode(['result' => 'error', 'msg' => 'Ошибка!']);
                }
            } else {
                echo json_encode(['result' => 'error', 'msg' => 'Пустое поле *name*']);
            }
            break;

        default:
            echo json_encode(['result' => 'error', 'msg' => 'Не найдена команда : ' . $_GET['q']]);
            # code...
            break;
    }
} else {

    echo json_encode(['result' => 'error', 'msg' => 'Пустая команда ']);
}
