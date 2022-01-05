<?php include "../base.php"; 

$acc=$_POST['acc'];
$chk=$Users->math('count','*',['acc'=>$acc]);

if($chk>0){
    echo 1;
}else{
    echo 0;
}


?>