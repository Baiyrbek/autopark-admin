<?php
function createImg($file, $width, $maxSize, $path, $generatedName)
{
    $msg = '';
    if (!empty($file['tmp_name'])) {
        if (!empty($file['error'])) {
            $msg = 'Произошла ошибка!';
            return (['result' => 'error', 'msg' => $msg]);
        } else {
            if ($file['size'] > $maxSize * 1024 * 1024) {
                $msg = 'Файл слишком большой';
                return (['result' => 'error', 'msg' => $msg]);
            } else {
                switch ($file['type']) {
                    case 'image/jpeg':
                    case 'image/jpg':
                    case 'image/pjpeg':
                        $type = 'jpeg';
                        $check = '1';
                        break;

                    case 'image/png':
                    case 'image/x-png':
                        $type = 'png';
                        $check = '1';
                        break;

                    default:


                        $check = '2';

                        break;
                }
                if ($check !== '2') {
                    $generated = $generatedName . '.jpeg';

                    switch ($type) {
                        case 'jpeg';
                            $img = imagecreatefromjpeg($file['tmp_name']);
                            break;

                        case 'png';
                            $img = imagecreatefrompng($file['tmp_name']);
                            break;
                    }
                    if (!$img) {
                        $img = imagecreatefromstring(file_get_contents($file['tmp_name']));
                    }
                    $i_w = imageSX($img);
                    $i_h = imageSY($img);

                    $width = $width;
                    $k = round($i_w / $width, 3);

                    $n_w = $i_w / $k;
                    $n_h = $i_h / $k;

                    $n_i = imagecreatetruecolor($n_w, $n_h);
                    $res = imagecopyresampled($n_i, $img, 0, 0, 0, 0, $n_w, $n_h, $i_w, $i_h);
                    switch ($type) {
                        case 'jpeg';
                            imagedestroy($img);
                            imagejpeg($n_i, $path . $generated);
                            break;

                        case 'png';
                            imagefill($n_i, 0, 0, imagecolorallocate($n_i, 255, 255, 255));
                            imagealphablending($n_i, TRUE);
                            imagedestroy($img);
                            imagejpeg($n_i, $path . $generated);
                            break;
                    }
                    imagedestroy($n_i);
                    $img = $generated;
                    return (['result' => 'success', 'msg' => 'Успех!', 'img' => $img, 'path' => $path . $generated]);
                } else {
                    $msg = 'Неподходящий тип файла';
                    return (['result' => 'error', 'msg' => $msg]);
                }
            }
        }
    } else {
        return (['result' => 'error', 'msg' => 'Пустой файл!']);
    }
}
