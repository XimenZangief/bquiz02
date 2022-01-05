<?php include "../base.php"; 

$email=$_POST['email'];

$user=$Users->find(['email'=>$email]);
if(empty($user)){
    echo "查無此資料";
}else{
    echo "您的密碼為:".$user['pwd'];
}

?>