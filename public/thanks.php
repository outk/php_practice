<?php
session_start();
require("./libs/mail.php");
require("./libs/private/url.php");

$homeurl = get_home_url();

$send_mail_success = sendMail($_POST['email']);
if (!$send_mail_success) {
    http_response_code(301);
    header("Location: {$homeurl}failedsendmail.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>お問い合わせありがとうございました</title>
    </head>
    <body>
    <h1><?php echo "お問い合わせありがとうございました"?></h1>
    <div id="thanks">
    <p>入力されたメールアドレス{<?php echo $_POST['email'];?>}にメールが送信されました．</p>
    </div>
    <p>
    <button id="backtohomepage">お問い合わせフォーム画面に戻る</button>
    </p>
    <script type="text/javascript">
    document.getElementById("backtohomepage").onclick = function() {
        location.href = "<?php echo $homeurl?>";
    }
    </script>
    </body>
</html>