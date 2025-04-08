<?php

if (isset($_GET['q'])) {
    require_once "../db/connect.php";
    switch ($_GET['q']) {
        case 'deleteStory':
            if (isset($_POST['id'])) {
                $path = '../../img/stories/';
                $img = R::getCell('SELECT img FROM stories WHERE id=?', [$_POST['id']]);
                unlink($path . $img);
                $path = '../../img/stories_mini/';
                unlink($path . $img);
                $path = '../../img/stories_preview/';
                unlink($path . $img);
                R::exec('DELETE FROM `stories` WHERE `id` = ?', [$_POST['id']]);
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
