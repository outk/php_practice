<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>php練習</title>
    </head>
    <body>
        <h1><?php echo "phpで表示されています";?></h1>
        <?php
            echo 'Hello php!';
            echo 1 + 7;

            $greeting = 'Good morning!';
            echo $greeting;

            echo "挨拶は{$greeting}です";
            echo '挨拶は{$greeting}です';
        ?>    
    </body>
</html>