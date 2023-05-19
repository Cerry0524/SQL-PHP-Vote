<?php include_once "db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理後台</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <a href="index.php">首頁</a>
        <a href="login.php">登出</a>
        <nav>
            <a href='./backend.php?do=add_vote'>新增投票</a>
            <a href='./backend.php?do=query_vote'>結果查詢</a>
        </nav>
    </header>
    <main>
        <?php

        $do = $_GET['do'] ?? 'topic_list';

        $file = "./back/" . $do . ".php";

        include (file_exists($file))?$file:"./back/topic_list.php";

        ?>
    </main>
    <footer></footer>
</body>

</html>