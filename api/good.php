<?php include_once "../base.php";

// 尋找要作用的文章
$news=$News->find($_POST['news']);
$type=$_POST['type'];

switch ($type) {
    case 1:
        //收回讚
        $Logs->del(['news'=>$news['id'],'user'=>$_SESSION['login']]);

        // 文章的good欄位--
        $news['good']--;
        $News->save($news);
        break;
    case 2:
        //按讚
        $Logs->save(['news'=>$news['id'],'user'=>$_SESSION['login']]);

        // 文章的good欄位++
        $news['good']++;
        $News->save($news);
        break;
}
?>