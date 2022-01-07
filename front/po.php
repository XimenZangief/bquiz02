<div>目前位置：首頁 > 分類網誌 ><span id="navTag">健康新知</span></div>
<!-- 縮寫換行emmet可以使用[]添加屬性 -->
<div style="display:flex">
    <fieldset style="width:20%">
        <legend>分類項目</legend>
        <a>
            <p class="tag" data-type="1">健康新知</p>
        </a>
        <a>
            <p class="tag" data-type="2">菸害防治</p>
        </a>
        <a>
            <p class="tag" data-type="3">癌症防治</p>
        </a>
        <a>
            <p class="tag" data-type="4">慢性病防治</p>
        </a>
    </fieldset>

    <fieldset style="width:70%">
        <legend>文章列表</legend>
        <div id="newslist"></div>
        <div id="news" style="display:none"></div>
    </fieldset>
</div>

<script>
    getlist(1);
    $(".tag").on("click", function() {
        // 取得文字
        let navtag = $(this).text();
        // 放入navTag的文字
        $("#navTag").text(navtag);
        let type = $(this).data('type');
        getlist(type);
    })

    function getlist(type) {
        $.get("api/get_list.php", {
            type
        }, (list) => {
            $("#newslist").html(list);
            $("#newslist").show();
            $("#news").hide();
        })
    }

    function getnews(id) {
        $.get("api/get_news.php", {
            id
        }, (news) => {
            // console.log(news);
            $("#news").html(news);
            $("#news").show();
            $("#newslist").hide();
        })
    }
</script>