<?php
session_start();
require("./libs/private/url.php");

$homeurl = get_home_url();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>メールの送信に失敗しました</title>
    </head>
    <body>
    <h1><?php echo "メールの送信に失敗しました"?></h1>
    <button id="backtohomepage">お問い合わせフォーム画面に戻る</button>
    <script type="text/javascript">
    document.getElementById("backtohomepage").onclick = function() {
        location.href = "<?php echo $homeurl;?>";
    }
    </script>
    </body>
</html>