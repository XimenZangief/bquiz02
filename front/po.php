

<div>目前位置：首頁 > 分類網誌 ><span id="navTag"></span></div>
<!-- 縮寫換行emmet可以使用[]添加屬性 -->
<div style="display:flex">
    <fieldset style="width:20%">
        <legend>
            分類項目
            <a><p class="tag" id="t1">健康新知</p></a>
            <a><p class="tag" id="t2">菸害防治</p></a>
            <a><p class="tag" id="t3">癌症防治</p></a>
            <a><p class="tag" id="t4">慢性病防治</p></a>
        </legend>
    </fieldset>
    
    <fieldset style="width:70%">
        <legend>
            文章列表
            
        </legend>
    </fieldset>
</div>

<script>
    $(".tag").on("click",function(){
        // 取得文字
        let navtag=$(this).text();
        // 放入navTag的文字
        $("#navTag").text(navTag);
    })
</script>