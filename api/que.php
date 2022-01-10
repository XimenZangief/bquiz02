<?php
include_once "../base.php";

$subject=$_POST['subject'];

// 實務上通常不允許空白標題
// if($subject!=""){
    $Ques->save(['text'=>$subject,'parent'=>0,'count'=>0]);
    // 直接取id最大值以辨識創建者
    $parent_id=$Ques->math("max","id");
    // 實務用，直接透過專題名稱以辨識創建者id
    // $parent_id=$Ques->find(['text'=>$subject])['id'];
// }else{
//     echo "標題不可空白";
// }

foreach($_POST['options'] as $opt){
    $Ques->save(['text'=>$opt,'parent'=>$parent_id,'count'=>0]);
}

to("../back.php?do=que.php");
