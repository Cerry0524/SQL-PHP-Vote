<h1>投票</h1>

<?php

$topic=$pdo->query("select * from `topics` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
if($topic['login']==1){
    if(!isset($_SESSION['login'])){
        $_SESSION['postion']="/index.php?do=vote&id={$_GET['id']}";//這裡要放絕對路徑，因為會員原本網頁位置無法判斷
        header("location:index.php?do=login&msg=1");
    };
}



$options=$pdo->query("select * from `options` where `subject_id`='{$_GET['id']}'")->fetchAll(PDO::FETCH_ASSOC);

?>


<H2><?=$topic['subject'];?></H2>
<form action="./api/vote.php" method="post">

    <ul>
        <?php
foreach ($options as $idx => $opt) {
    echo "<li>";
    if($topic['type']==1){
        echo "<input type='radio' name='desc' value='{$opt['id']}'>";
    }else if($topic['type']==2){
        echo "<input type='checkbox' name='desc[]' value='{$opt['id']}'>";
    }
   
    
    echo "<span>".($idx+1)."</span>";
    echo "<span>{$opt['description']}</span>";
    echo "</li>";
}

?>

</ul>

<div>
    <input type="hidden" name="subject_id" value="<?=$_GET['id'];?>">
    <input type="submit" value="投票">
    <input type="submit" value="取消">
</div>

</form>