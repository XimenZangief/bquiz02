<?php include "../base.php"; 

$acc=$_POST['acc'];
$pwd=$_POST['pwd'];

$chk=$Users->math('count','*',['acc'=>$acc,'pwd'=>$pwd]);

if($chk>0){
    echo 1;
}else{
    echo 0;
}

?>