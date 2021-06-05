<?php
session_start();
require("./libs/private/url.php");

$homeurl = get_home_url();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>お問い合わせフォーム</title>
        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    </head>
    <body>
        <h1><?php echo "お問い合わせフォーム";?></h1>
        <div class="requestform">
            <form id="form" method="POST" action="./confirm.php" enctype="multipart/form-data">
                <label for="name">名前: </label><br>
                <input type='text' id='name' name='name'><br>
                <p id="name_validity_err"></p>
                <label for="huri">ふりがな: </label><br>
                <input type='text' id='huri' name='huri'><br>
                <p id="huri_validity_err"></p>
                <label for="email">メールアドレス: </label><br>
                <input type='email' id='email' name='email'><br>
                <p id="email_validity_err"></p>
                <label for="phone">電話番号: </label><br>
                <input type='phone' id='phone' name='phone'><br>
                <p id="phone_validity_err"></p>
                <label for="postal">郵便番号: </label><br>
                <input type='text' id='postal' name='postal' onKeyUp="AjaxZip3.zip2addr(this,'','address','address');"><br>
                <p id="postal_validity_err"></p>
                <label for="address">住所: </label><br>
                <input type='text' id='address' name='address'><br>
                <p id="address_validity_err"></p>
                性別: <br>
                <label>
                    <input class="gender" type='radio' id='male' name="gender" value="male" onclick="formSwitch()">男性
                </label>
                <label>
                    <input class="gender" type='radio' id='female' name="gender" value="female" onclick="formSwitch()">女性<br>
                </label>
                <span id="hobby_span">
                    <label for="hobby">趣味: </label><br>
                    <input type="text" id="hobby" name="hobby"><br>
                    <p id="hobby_validity_err"></p>
                </span>
                <span id="skill_span">
                    <label for="skill">特技: </label><br>
                    <input type="text" id="skill" name="skill"><br>
                    <p id="skill_validity_err"></p>
                </span>
                <p id="gender_validity_err"></p>
                <label for="image">画像: </label><br>
                <input type='file' id='image' name='image'><br>
                <label for="content">お問い合わせ内容: </label><br>
                <input type='text' id='content' name='content'><br>
                <input type="submit" id='submit'>
            </form>
        </div>
        <script type="text/javascript">
            var hobbyBox = document.getElementById("hobby_span");
            var skillBox = document.getElementById("skill_span");
            function formSwitch() {
                gender_check = document.getElementsByClassName("gender");
                if (gender_check[0].checked) {
                    hobbyBox.style.display = "block";
                    skillBox.style.display = "none";
                    document.getElementById("male").value = "male";
                } else if (gender_check[1].checked) {
                    hobbyBox.style.display = "none";
                    skillBox.style.display = "block";
                    document.getElementById("female").value = "female";
                } else {
                    hobbyBox.style.display = "none";
                    skillBox.style.display = "none";
                    document.getElementById("male").value = "";
                    document.getElementById("female").value = "";
                }
            }
            $(window).on('load', formSwitch())

            // validation
            $("#submit").on("click", function(e) {
                validate_check = true

                // error initialize
                $("#name_validity_err").text("")
                $("#huri_validity_err").text("")
                $("#email_validity_err").text("")
                $("#phone_validity_err").text("")
                $("#postal_validity_err").text("")
                $("#address_validity_err").text("")
                $("#gender_validity_err").text("")
                $("#hobby_validity_err").text("")
                $("#skill_validity_err").text("")

                // name validation
                if ($("#name").val() == "") {
                    $("#name_validity_err").text("名前が入力されていません")
                    validate_check = false
                }

                // huri validation
                if ($("#huri").val() == "") {
                    $("#huri_validity_err").text("ふりがなが入力されていません")
                    validate_check = false
                }

                // email validation
                if ($("#email").val() == "") {
                    $("#email_validity_err").text("メールアドレスが入力されていません")
                    validate_check = false
                }

                // phone validation
                if ($("#phone").val() == "") {
                    $("#phone_validity_err").text("電話番号が入力されていません")
                    validate_check = false
                } else if (!phone_validate($("#phone").val())) {
                    $("#phone_validity_err").text("電話番号が正しく入力されていません")
                    validate_check = false
                }

                // postal validation
                if ($("#postal").val() == "") {
                    $("#postal_validity_err").text("郵便番号が入力されていません")
                    validate_check = false
                } else if (!postal_validate($("#postal").val())) {
                    $("#postal_validity_err").text("郵便番号が正しく入力されていません")
                    validate_check = false
                }

                // address validation
                if ($("#address").val() == "") {
                    $("#address_validity_err").text("住所が入力されていません")
                    validate_check = false
                }

                // gender validation
                if ($("#male").val() == "" && $("#female").val() == "") {
                    $("#gender_validity_err").text("性別が選択されていません")
                    validate_check = false
                } else if ($("#male").val() == "male") {
                    if ($("#hobby").val() == "") {
                        $("#hobby_validity_err").text("趣味が入力されていません")
                        validate_check = false
                    } else {
                        document.getElementById("skill").value = "";
                    }
                } else if ($("#female").val() == "female") {
                    if ($("#skill").val() == "") {
                        $("#skill_validity_err").text("特技が入力されていません")
                        validate_check = false
                    } else {
                        document.getElementById("hobby").value = "";
                    }
                }

                return validate_check;
            })

            function phone_validate(phone) {
                var phone = document.getElementById('phone').value.replace(/[━.*‐.*―.*－.*\-.*ー.*\-]/gi,'');
                return /^(0[5-9]0[0-9]{8}|0[1-9][1-9][0-9]{7})$/.test(phone);
            }

            function postal_validate(postal) {
                if (postal.length > 8 || postal.length < 7) {
                    console.log(postal);
                    console.log(postal.length);
                    return false;
                } 

                return /^[0-9]{3}(-)?[0-9]{4}$/.test(postal);
            }

        </script>
    </body>
</html>