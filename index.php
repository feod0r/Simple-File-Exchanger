<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Загрузка скина на сервер</title>


</head>
<body>
<h1>Загрузка файла:</h1>
<form action="upload.php" id="form" target="upload" method="POST" enctype="multipart/form-data">
   <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
    Отправить этот файл: 
    <input name="userfile" type="file" />
    <button class="full-link">Отправить</button>
</form>

<br><h1>Статус загрузки:</h1>
<iframe id="upload" name="upload" style="display: block; border: none"></iframe>
<h1>Список файлов: </h1>
<?php
$dir  = '/var/www/html/mms/files/';
$rdir  = '/var/www/html/mms/removed/';

$files = scandir($dir,1);

if ($_GET["del"] != "") {

	$delfile = $dir . $files[$_GET["del"]];
	$rfile = $rdir . $files[$_GET["del"]];
	copy ($delfile ,$rfile);
	unlink($delfile);

}
$files = scandir($dir,1);
$i = 0;
foreach ($files as $file):

    echo "<a href=\"http://romecraft.ru/mms/files/$file\">" . $file ."</a>	<a href=\"?del=$i\">Удалить</a><br>";
	$i++;
endforeach;
?>
</body>
</html>
