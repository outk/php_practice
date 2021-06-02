<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>php練習</title>
    </head>
    <body>
        <h1><?php echo "お問い合わせフォーム";?></h1>
        <div class="requestform">
            <form action="./mail.php" id="form" method="POST">
                <label for="name">名前: </label><br>
                <input type='text' id='name' name='name'><br>
                <label for="huri">ふりがな: </label><br>
                <input type='text' id='huri' name='huri'><br>
                <label for="email">メールアドレス: </label><br>
                <input type='email' id='email' name='email'><br>
                <label for="tel">電話番号: </label><br>
                <input type='tel' id='tel' name='tel'><br>
                <label for="postal">郵便番号: </label><br>
                <input type='text' id='postal' name='postal'><br>
                <label for="address">住所: </label><br>
                <input type='text' id='address' name='address'><br>
                性別: <br>
                <label>
                    <input class="gender" type='radio' id='gender' name='gender' value="male" onclick="formSwitch()">男性
                </label>
                <label>
                    <input class="gender" type='radio' id='gender' name='gender' value="female" onclick="formSwitch()">女性<br>
                </label>
                <span id="hobby">
                    <label for="hobby">趣味: </label><br>
                    <input form="text" name="hobby"><br>
                </span>
                <span id="skill">
                    <label for="skill">特技: </label><br>
                    <input form="text" name="skill"><br>
                </span>
                <label for="image">画像: </label><br>
                <input type='file' id='image' name='image'><br>
                <label for="content">お問い合わせ内容: </label><br>
                <input type='text' id='content' name='content'><br>
                <input type="submit">
            </form>
        </div>
        <script type="text/javascript" src="./libs/functions.js"></script>
    </body>
</html>