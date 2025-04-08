<?php

if (isset($_GET['q'])) {
    require_once "../db/connect.php";
    switch ($_GET['q']) {
        case 'deleteBody':
            if (isset($_POST['id'])) {
                $path = '../../img/body/';
                $img = R::getCell('SELECT img FROM body WHERE id=?', [$_POST['id']]);
                R::exec('DELETE FROM `body` WHERE `id` = ?', [$_POST['id']]);
                unlink($path . $img);
                echo json_encode(['result' => 'success', 'msg' => 'Удалено'], JSON_UNESCAPED_UNICODE);
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
