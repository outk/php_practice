<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>お問い合わせ内容確認</title>
    </head>
    <body>
    <h1><?php echo "お問い合わせ内容の確認"?></h1>
    <div id="confirm_form">
        <form id="confirm" action="./thanks.php" method="POST">
            <div id="confirm_name">
            名前：<br>
            <?php echo $_POST["name"]?><br>
            </div>
            <div id="confirm_huri">
            ふりがな：<br>
            <?php echo $_POST["huri"]?><br>
            </div>
            <div id="confirm_email">
            メールアドレス：<br>
            <?php echo $_POST["email"]?><br>
            </div>
            <div id="confirm_phone">
            電話番号：<br>
            <?php echo $_POST["phone"]?><br>
            </div>
            <div id="confirm_postal">
            郵便番号：<br>
            <?php echo $_POST["postal"]?><br>
            </div>
            <div id="confirm_address">
            住所：<br>
            <?php echo $_POST["address"]?><br>
            </div>
            <div id="confirm_gender">
            性別：<br>
            <?php echo $_POST["gender"]?><br>
            </div>
            <div id="confirm_hobby">
            趣味：<br>
            <?php echo $_POST["hobby"]?><br>
            </div>
            <div id="confirm_skill">
            特技：<br>
            <?php echo $_POST["skill"]?><br>
            </div>
            <div id="confirm_image">
            画像：<br>
            <?php echo $_POST["image"]?><br>
            </div>
            <div id="confirm_content">
            お問合せ内容：<br>
            <?php echo $_POST["content"]?><br>
            </div>
            <input type="submit" value="確認">
            <?php 
            foreach ($_POST as $key => $value) {
            ?>
                <input type="hidden" name="<?php echo $key;?>" value="<?php echo $value;?>">
            <?php
            }
            ?>
        </form>
        </div>
    </body>
</html>