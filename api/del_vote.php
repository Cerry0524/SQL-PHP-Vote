<?php
include_once "../db.php";//上次裡面資料庫路徑打錯

$pdo->exec("delete from `topics` where `id`='{$_GET['id']}'");
$pdo->exec("delete from `options` where `subject_id`='{$_GET['id']}'");

header("location:../backend.php");//上次忘了打()裡面的location
?>