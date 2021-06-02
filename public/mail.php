<?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $to = $_POST['email'];
    $title = 'phpメール送信テスト';
    $message = 'お問い合わせありがとうございました。';
    $headers = "From: あなた";

    echo $to;
    echo $title;
    echo $message;
    echo $headers;

    if(mb_send_mail($to, $title, $message, $headers))
    {
        echo "メール送信成功です";
    }
    else
    {
        echo "メール送信失敗です";
    }
?>