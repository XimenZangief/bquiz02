<?php
include_once "../base.php";

$id=$_GET['id'];
$news=$News->find($id);

// newLineTo br 函式
echo nl2br($news['text']);

?>