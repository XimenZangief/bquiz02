<script src="../js/jquery-1.9.1.min.js"></script>
<style>
  .tag {
    border: 1px solid black;
    padding: 5px 10px;
    margin-left: -1px;
  }

  .tag:hover {
    background-color: #eee;
  }

  .post {
    border: 1px solid black;
    display: none;
    margin-top: -1px;
  }

  .active {
    background: white;
    border-bottom-color: white;
  }
</style>

<div style="display:flex;margin-left:1px">
<!-- ctrl+shift+P =>鍵入wrap =>emmet:使用縮寫換行  輸入div.tag* -->
  <div class="tag active" id="t1">健康新知</div>
  <div class="tag" id="t2">菸害防治</div>
  <div class="tag" id="t3">癌症防治</div>
  <div class="tag" id="t4">慢性病防治</div>
</div>

<div class="post" id="p1">1</div>
<div class="post" id="p2">2</div>
<div class="post" id="p3">3</div>
<div class="post" id="p4">4</div>

<script>
  // 不使用id的選擇法，擇一
  // $(".post").first().show();
  // $(".post").eq(0).show();
  // 使用id的選擇法
  $("#p1").show();
  // 需要使用到$(this)的情況才使用function(){}
  // 沒有的話可以用匿名函式()=>{}取代之
  $(".tag").on("click", function() {
    //先隱藏全部的.post再顯示#id達到頁籤效果
    $(".tag").removeClass("active");
    $(this).addClass("active");
    $(".post").hide();

    
    //使用id的做法
    // 專有名詞而已，鏈式呼叫
    // 取得「按下的當下區塊」.tag的#id並將值的t替換成p，ex:t1=>p1
    let id = $(this).attr('id').replace("t", "p");
    $("#" + id).show();
    console.log(id);

    // 或是選擇直接獲取DOM的index值，可用在eq()上
    // let idx=$(this).index();
    // $(this).eq(idx).show();

    


    
  })
</script>