<div id="title">
    <!-- <?=dd($_SESSION['view']);?> -->
    <?= date("m 月 d 號 l"); ?> |
    今日瀏覽: <?= $Views->find(['date' => date("Y-m-d")])['total']; ?> |
    累積瀏覽: <?= $Views->math('sum', 'total'); ?>
    <a href="index.php" style='float:right;'>回首頁</a>
</div>
<div id="title2">
    <a href="index.php" title="健康促進網-回首頁">
        <img src="../icon/02B01.jpg" alt="">
    </a>
</div>