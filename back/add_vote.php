<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增主題</title>
    <link rel="stylesheet" href="..\css\style.css">
    <script src="../js/jquery-3.7.0.min.js"></script> <!-- 引進jquery -->
</head>
<body>
    <main>
        <h1>新增主題</h1>
        <form action="../api/add_vote.php" method="post">
        <div>
            <label for="subject">主題</label>
            <input type="text" name="subject" id="subject" class="subject-input">
        </div>
        <div class="time-set">
            <div class="time-item">
                <label for="open_time">開始時間</label>
                <input type="datetime-local" name="open_time" id="open_time">
            </div>
            <div class="time-item">
                <label for="close_time">結束時間</label>
                <input type="datetime-local" name="close_time" id="close_time">
            </div>
        </div>
        <div>
            <label for="type">單複選</label>
            <input type="radio" name="type" value="1">單選&nbsp;&nbsp;
            <input type="radio" name="type" value="2">複選
        </div>
        <hr>
        <div class="options">
            <label for="description">項目</label>
            <input type="text" name="description[]" class="description-input">
            <span onclick="addOption()">+</span>
            <!-- jquery建立一個function 增加項目 -->
            <span onclick="removeOption(this)">-</span>
            <!-- jquery建立一個function 減少項目 ()裡面要加上this表示這個div-->
        </div>
            <input type="submit" value="新增">
        </form>
    </main>
    <script>
        function addOption(){
            let opt=`<div class="options">
                        <label for="description">項目</label>
                        <input type="text" name="description[]" class="description-input">
                        <span onclick="addOption()">+</span>
                        <span onclick="removeOption(this)">-</span>
                     </div>`
                    //  jquery可以把字串轉變成相對應的js程式碼，但是要小心此處要用上引號(裡面有段行在舊js是不支援的)
            $(".options").append(opt)
        }
        function removeOption(el){
            // el=elment的縮寫
            let dom=$(el).parent()
            // 宣告parent是指此div的父母層
            $(dom).remove();
            // 宣告父母層刪掉
        }
    </script>
</body>
</html>