<!-- 標題文字標籤(讓文字壓在上框線上) -->
<fieldset>
    <legend>會員註冊</legend>
    <div style='color:red;'>*請設定您要註冊的帳號及密碼（最長12個字元）</div>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pwd" id="pwd"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pwd2" id="pwd2"></td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="reset()">清除</button>
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>

<script>
    function reset() {
        $("#acc,#pwd,#pwd2,#email").val("");
    }

    function reg() {
        let user = {
            acc: $("#acc").val(),
            pwd: $("#pwd").val(),
            pwd2: $("#pwd2").val(),
            email: $("#email").val()
        }
        
        // if (user.acc == '' || user.pwd=='' || user.pwd2=='' || user.email=='') {
        if(Object.values(user).indexOf('')>=0){
            alert("不可空白");
        } else {
            if (user.pwd != user.pwd2) {
                alert("密碼錯誤");
            } else {
                $.post("api/chk_acc.php", {acc: user.acc}, (chk) => {
                        if (parseInt(chk) == 1) {
                            alert('帳號重複');
                        } else {
                            delete user.pwd2;
                            $.post("api/reg.php", user, (res) => {
                                // 因為註冊不需要pwd2，故刪除pwd2的資料
                                alert("註冊完成，歡迎加入");
                                location.href="index.php?do=login";
                            })
                        }
                    })
                }
        }
    }
</script>