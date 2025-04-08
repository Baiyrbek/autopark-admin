<?php

if (isset($_GET['q'])) {
    require_once "../db/connect.php";
    switch ($_GET['q']) {
        case 'addBrand':
            if (isset($_POST['name'])) {
                $imgName = '';
                if (isset($_FILES['img'])) {
                    require_once "../img_script.php";
                    $imgId = R::getCell('SELECT img_id FROM ids');
                    R::exec('UPDATE ids SET img_id = img_id + 1');

                    $file = $_FILES['img'];
                    $width = 300; //pixel
                    $maxSize = 15; //megabyte
                    $path = '../../img/brands/';
                    $generatedName = $imgId;
                    $createImg = createImg($file, $width, $maxSize, $path, $generatedName);
                    if ($createImg['result'] == 'success') {
                        $imgName = $createImg['img'];
                    } else {
                        echo json_encode(['result' => 'error', 'msg' =>  $createImg['msg']], JSON_UNESCAPED_UNICODE);
                        break;
                    }
                }
                $res = R::exec('INSERT INTO brands (img, name, type) VALUES (?, ?, ?)', [$imgName, $_POST['name'], $_POST['type']]);
                if ($res) {
                    echo json_encode(['result' => 'success', 'msg' => 'Бренд успешно добавлен!'], JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode(['result' => 'error', 'msg' => 'Ошибка!'], JSON_UNESCAPED_UNICODE);
                }
            } else {
                echo json_encode(['result' => 'error', 'msg' => 'Пустое поле *name*'], JSON_UNESCAPED_UNICODE);
            }
            break;

        case 'addModel':
            if (isset($_POST['name']) && isset($_POST['parent'])) {
                $imgName = '';
                if (isset($_FILES['img'])) {
                    require_once "../img_script.php";
                    $imgId = R::getCell('SELECT img_id FROM ids');
                    R::exec('UPDATE ids SET img_id = img_id + 1');

                    $file = $_FILES['img'];
                    $width = 600; //pixel
                    $maxSize = 15; //megabyte
                    $path = '../../img/models/';
                    $generatedName = $imgId;
                    $createImg = createImg($file, $width, $maxSize, $path, $generatedName);
                    if ($createImg['result'] == 'success') {
                        $imgName = $createImg['img'];
                    } else {
                        echo json_encode(['result' => 'error', 'msg' =>  $createImg['msg']], JSON_UNESCAPED_UNICODE);
                        break;
                    }
                }

                $res = R::exec('INSERT INTO models (name, parent, img) VALUES (?, ?, ?)', [$_POST['name'], $_POST['parent'], $imgName]);
                if ($res) {
                    echo json_encode(['result' => 'success', 'msg' => 'Модель успешно добавлена!'], JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode(['result' => 'error', 'msg' => 'Ошибка!'], JSON_UNESCAPED_UNICODE);
                }
            } else {

                echo json_encode(['result' => 'error', 'msg' => 'Пустое поле *name*'], JSON_UNESCAPED_UNICODE);
            }
            break;

        case 'addGeneration':
            if (isset($_POST['name'])) {
                $imgName = '';
                if (isset($_FILES['img'])) {
                    require_once "../img_script.php";
                    $imgId = R::getCell('SELECT img_id FROM ids');
                    R::exec('UPDATE ids SET img_id = img_id + 1');

                    $file = $_FILES['img'];
                    $width = 1200; //pixel
                    $maxSize = 15; //megabyte
                    $path = '../../img/generations/';
                    $generatedName = $imgId;
                    $createImg = createImg($file, $width, $maxSize, $path, $generatedName);
                    if ($createImg['result'] == 'success') {
                        $imgName = $createImg['img'];
                    } else {
                        echo json_encode(['result' => 'error', 'msg' =>  $createImg['msg']], JSON_UNESCAPED_UNICODE);
                        break;
                    }
                }
                $res = R::exec('INSERT INTO generations (img, name, parent) VALUES (?, ?, ?)', [$imgName, $_POST['name'], $_POST['parent']]);
                if ($res) {
                    echo json_encode(['result' => 'success', 'msg' => 'Поколение успешно добавлено!'], JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode(['result' => 'error', 'msg' => 'Ошибка!'], JSON_UNESCAPED_UNICODE);
                }
            } else {
                echo json_encode(['result' => 'error', 'msg' => 'Пустое поле *name*'], JSON_UNESCAPED_UNICODE);
            }
            break;

        case 'addImgModel':
            if (isset($_POST['id'])) {
                $imgName = '';
                if (isset($_FILES['img'])) {
                    require_once "../img_script.php";
                    $imgId = R::getCell('SELECT img_id FROM ids');
                    R::exec('UPDATE ids SET img_id = img_id + 1');

                    $file = $_FILES['img'];
                    $width = 600; //pixel
                    $maxSize = 15; //megabyte
                    $path = '../../img/models/';
                    $generatedName = $imgId;
                    $createImg = createImg($file, $width, $maxSize, $path, $generatedName);
                    if ($createImg['result'] == 'success') {
                        $imgName = $createImg['img'];
                    } else {
                        echo json_encode(['result' => 'error', 'msg' =>  $createImg['msg']], JSON_UNESCAPED_UNICODE);
                        break;
                    }
                }
                $res = R::exec('UPDATE models SET img = ? WHERE id = ?', [$imgName, $_POST['id']]);
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
