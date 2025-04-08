<?php

if (isset($_GET['q'])) {
    require_once "../db/connect.php";
    switch ($_GET['q']) {
        case 'deleteAd':
            if (isset($_POST['id'])) {
                $path = '../../../app/api/img/';
                $path2 = '../../../app/api/img_mini/';
                $imgs = R::getCell('SELECT img FROM ads WHERE id=?', [$_POST['id']]);
                R::exec('DELETE FROM `ads` WHERE `id` = ?', [$_POST['id']]);
                $loop = 0;
                foreach (json_decode($imgs) as $img) {
                    if ($loop++ == 0) {
                        unlink($path2 . $img);
                    }
                    unlink($path . $img);
                }
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
