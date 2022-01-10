<!-- 從front/news.php複製過來修改 -->
<fieldset>
    <legend>最新文章管理</legend>
    <form action="api/news_admin.php" method="post">
        <table>
            <tr>
                <td width="10%">標題</td>
                <td width="75%">內容</td>
                <td width="10%">顯示</td>
                <td width="10%">刪除</td>
            </tr>
            <?php
            $total = $News->math("count", "*");
            $div = 5;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            //前台需sh=1，後台不需要
            $rows = $News->all(" limit $start,$div");
            foreach ($rows as $key => $row) {
                $chk=($row['sh']==1)?"checked":"";
            ?>
                <tr>
                    <td><?=$start+1+$key;?></td>
                    <td><?= $row['title']; ?></td>
                    <td>
                    <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"<?=$chk;?>>
                    </td>
                    <td>
                    <input type="checkbox" name="del[]" value="<?$row['id'];?>">
                    <input type="hidden" name="id[]" value="<?$row['id'];?>">
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <?php
            if (($now - 1) > 0) {
                $prev = $now - 1;
                //這是後台>_^，下面記得改
                echo "<a href='back.php?do=news&p=$prev'> ";
                echo " < ";
                echo " </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $font = ($now == $i) ? '24px' : '16px';
                echo "<a href='back.php?do=news&p=$i' style='font-size:$font'> ";
                echo $i;
                echo " </a>";
            }
            if (($now + 1) <= $pages) {
                $next = $now + 1;
                echo "<a href='back.php?do=news&p=$next'> ";
                echo " > ";
                echo " </a>";
            }
            ?>
        </div>
        </fieldset>
        <div class="ct"><button type="submit">確定修改</button></div>
    </form>
<script>
    $(".switch").on("click", function() {
        $(this).parent().find(".short,.full").toggle()
    })

    $(".g").on("click", function() {
        let type = $(this).data('type');
        let news = $(this).data('news');

        $.post("api/good.php", {
            type,
            news
        }, () => {
            // 偷吃步
            // location.reload()
            switch (type) {
                case 1:
                    //收回讚
                    $(this).text("讚");
                    $(this).data("type", 2);
                    // 將文字轉換成數字並-1
                    count=$(this).siblings("span").text()*1;
                    $(this).siblings("span").text(count-1);
                    break;
                case 2:
                    // 給讚
                    $(this).text("收回讚");
                    $(this).data("type", 1);
                    // 將文字轉換成數字並+1
                    count=$(this).siblings("span").text()*1;
                    $(this).siblings("span").text(count+1);
                    break;
            }
        })
    })
</script>