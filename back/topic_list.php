<ul class="topic-list">
    <li class="list-row">
        <div class="list-item-title">主題</div>
        <div class="list-item-title">狀態</div>
        <div class="list-item-title">期間</div>
        <div class="list-item-title">投票數</div>
        <div class="list-item-title">操作</div>
    </li>
    <?php
    $sql = "SELECT `topics`.*,
                                sum(`options`.`total`) as '總計'
                        From `topics`,`options` 
                        where `topics`.`id`=`options`.`subject_id` 
                        group by `topics`.`id`";
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
    ?>
        <li class="list-row">
            <div class="list-item"><?= $row['subject']; ?></div>
            <div class="list-item">
                <?php
                $now=strtotime('now');
                $open=strtotime($row['open_time']);
                $close=strtotime($row['open_time']);

                if($now<$open){
                    echo "<div class='await'>未開始</div>";
                }elseif($now >= $open && $now <= $close){
                    echo "<div class='in-process'>進行中</div>";
                }else{
                    echo "<div class='finish'>已結束</div>";
                };

                ?>
            </div>
            <div class="list-item">
                <div><?= $row['open_time'];?></div>
                至
                <div><?= $row['close_time'];?></div>
            </div>
            <div class="list-item"><?=$row['總計']?></div>
            <div class="list-item">
                <button onclick="location.href='./backend.php?do=edit_vote&id=<?= $row['id']; ?>'">編輯</button>
                <button onclick="location.href='./back/del_vote.php?id=<?= $row['id']; ?>'">刪除</button>
                <button onclick="location.href='./back/open.php?id=<?= $row['id']; ?>'">上線Right Now</button>
                <button onclick="location.href='./back/close.php?id=<?= $row['id']; ?>'">結束Right Now</button>
                <button onclick="location.href='./backend.php?do=result&id=<?= $row['id']; ?>'">觀看結果</button>
            </div>
        </li>
    <?php
    }
    ?>
</ul>