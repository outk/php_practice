<?php
    function sendMail($email){
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
    
        $title = 'phpメール送信テスト';
        $message = 'お問い合わせありがとうございました。';
        $headers = "From: 運営";
    
        if(mb_send_mail($email, $title, $message, $headers))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
?>