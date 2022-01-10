<?php include_once "../base.php";

$opt=$Ques->find($_POST['opt']);
$opt['count']++;
$subject=$Ques->find($opt['parent']);
$subject['count']++;
$Ques->save($opt);
$Ques->save($subject);

// 題目要求返回投票結果
to("../index.php?do=result");

?>