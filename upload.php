<?php
// В PHP 4.1.0 и более ранних версиях следует использовать $HTTP_POST_FILES
// вместо $_FILES.
$uploaddir = '/var/www/html/mms/files/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
//print_r($_FILES);


if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo $_FILES['userfile']['error'];
}


?>