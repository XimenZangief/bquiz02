<?php
// 透過傳過來的id抓到問卷主題
$subject = $Ques->find($_GET['id']);
?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text']; ?></legend>
    <h3><?= $subject['text']; ?></h3>
    <form action="/api/vote.php" method='post'>
        <?php
        // $options = $Ques->all(['parent' => $subject['id']]);
        // 同理，但網址有傳id所以直接抓id
        $options = $Ques->all(['parent' => $_GET['id']]);
        foreach ($options as $key => $opt) {
        ?>
            <p>
                <input type="radio" name="opt" value="<?= $opt['id']; ?>">
                <?= $opt['text']; ?>
            </p>
        <?php } ?>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>