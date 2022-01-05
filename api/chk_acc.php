<?php include "../base.php"; 

$acc=$_POST['acc'];
$chk=$Users->math('count','*',['acc'=>$acc]);

if($chk>0){
    echo 1;
    $_SESSION['login']=$acc;
}else{
    echo 0;
}

// 三元運算子寫法
// echo ($chk>0)?1:0;

?>