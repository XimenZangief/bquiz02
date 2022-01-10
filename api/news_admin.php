<?php include_once "../base.php";

foreach($_POST['id'] as $id){
    // 如果$_POST['del']有值(因為checkbox沒勾選會沒值)且有在$_POST['id']陣列中
    // 刪除$id，否則視為修改sh
    // 意思即為刪除被勾選的狀態執行刪除，否則視為修改顯示
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $News->del($id);
    }else{
        $news=$News->find($id);
        $news['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $News->save($news);

        // 相同功能，但94炫砲
        // $sh=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        // $News->save(['id'=>$id,'sh'=>$sh]);
    }
}

/* 頁面只有五筆，但一次撈出所有資料造成資源浪費*/
// foreach($_POST['del'] as $id){
//     $News->del($id);
// }
// $news=$News->all();
// foreach($news as $n){
//     // $n['sh']=(isset($_POST['sh']) && in_array($n['id'],$_POST['sh']))?1:0;
//     if(isset($_POST['sh']) && in_array($n['id'],$_POST['sh'])){
//         $n['sh']=1;
//     }else{
//         $n['sh']=0;
//     }
//     $News->save($news);
// }

to("../back.php?do=news");

?>