<?php

use function PHPSTORM_META\type;

include_once '../config/database.php';



function CheckFileFormat(string $name): bool {
    $enableFormats = ['png', 'jpeg', 'jpg', 'jfif', 'webw'];
    $format = explode('.', $name)[1];
    if (!in_array($format, $enableFormats)) {
        return false;
    } else {
        return true;
    }
}

function UploadFile(string $nameFile, string $tmp) {
    if (CheckFileFormat($nameFile)){
        move_uploaded_file($tmp, "../image/{$nameFile}");
    } else {
        http_response_code(400);
        return throw new Error("Некорректныый формат файла");
    }
}

function SaveDataToDatabaseFromPostRequest()
{
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'POST') {
        $data = json_decode($_POST['json'], true);
        if (!isset($data['title']) || !isset($data['user_id'])) {
            http_response_code(400);
            return throw new Error('Некоторые параметры не найдены');
        }

        if (gettype($data['title']) != "string" || gettype($data['user_id']) != "integer") {
            http_response_code(400);
            return throw new Error('Данные переданы некорректно');
        }

        if (strlen($data['title']) > 200) {
            http_response_code(400);
            return throw new Error('Длина описания поста или заголовка превышает допустимую');
        }


        if (isset($_FILES['image'])) {
            if (!file_exists('../image/')) {
                mkdir('../image/');
            }
            $nameFile_1 = trim(mb_strtolower($_FILES['image']['name'][0]));
            $nameFile_2 = isset($_FILES['image']['name'][1]) ? trim(mb_strtolower($_FILES['image']['name'][1])) : null;
            $nameFile_3 = isset($_FILES['image']['name'][2]) ? trim(mb_strtolower($_FILES['image']['name'][2])) : null;
            $tmpName_1 = $_FILES['image']['tmp_name'][0];
            $tmpName_2 = $nameFile_2 ?  $_FILES['image']['tmp_name'][1] : null;
            $tmpName_3 = $nameFile_3 ?  $_FILES['image']['tmp_name'][2] : null;
            UploadFile($nameFile_1, $tmpName_1);
            if($nameFile_2) UploadFile($nameFile_2, $tmpName_2);
            if($nameFile_3) UploadFile($nameFile_3, $tmpName_3);
        } else {
            http_response_code(400);
            return throw new Error('Где картинка?');
        }

        $connection = connectDataBase();
        savePostToDataBase($connection, [
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'img_1' => "../image/{$nameFile_1}",
            'img_2' => "../image/{$nameFile_2}",
            'img_3' => "../image/{$nameFile_3}",
        ]);
        return $connection->lastInsertId();
    }
}
SaveDataToDatabaseFromPostRequest();
?>
