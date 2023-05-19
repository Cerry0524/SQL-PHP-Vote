<?php
include_once "../db.php";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";




$sql_chk_subject = "select count(*) from `topics` where subject='{$_POST['subject']}'";
//比對主題是否曾經被po出來過，mysql指令
$chk = $pdo->query($sql_chk_subject)->fetchColumn();

if ($chk>0) {
    echo "主題被用掉了";
    echo "<a href='add_vote.php'>返回主題頁面</a>";
} else {

    $sql = "INSERT INTO `topics`( `subject`, `open_time`, `close_time`, `type`) 
             VALUES ('{$_POST['subject']}','{$_POST['open_time']}','{$_POST['close_time']}','{$_POST['type']}')";
    //建立sql->value值用post取出
    $pdo->exec($sql);
    // 寫入選項
    $sql_subject_id = "select `id` from `topics` where `subject`='{$_POST['subject']}'";
    // echo $sql_subject_id;
    $subject_id = $pdo->query($sql_subject_id)->fetchColumn();
    // echo $subject_id;執行sql語句，並返回該筆資料中指定欄位的資料，$n為欄位的索引值(0,1,2…)

    foreach ($_POST['description'] as $desc) {
        $sql_option = "INSERT INTO `options`(`description`, `subject_id`)
                  VALUES ('$desc','$subject_id')";
        $pdo->exec($sql_option);
        // echo  $desc;
    }
}






header("location:../backend.php");
