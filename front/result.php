<?php
// 透過傳過來的id抓到問卷主題
$subject = $Ques->find($_GET['id']);
?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text']; ?></legend>
    <h3><?= $subject['text']; ?></h3>

        <?php
        // $options = $Ques->all(['parent' => $subject['id']]);
        // 同理，但網址有傳id所以直接抓id
        $options = $Ques->all(['parent' => $_GET['id']]);
        foreach ($options as $key => $opt) {
            // 事先確認專題比例分母是否為0，是則改成1(避免分母為0)，否則不改動
            $div=($subject['count']==0)?1:$subject['count'];
            $rate=round($opt['count']/$div,2);

        ?>
            <div style="display:flex; margin:15px 0;">
                <div style="width: 40%;"><?=($key+1).".".$opt['text'];?></div>
            </div>
            <div style="height: 25px; background:grey; width:<?=40*$rate;?>"></div>
            <div><?=$opt['count'];?>(<?=$rate*100;?>%)</div>
        <?php } ?>
        <div class="ct"><input type="button" onclick="location.href='?do=que'" value="返回"></div>
</fieldset>