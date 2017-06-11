<?php
        session_start();
        header('content-type: image/png');
        $captcha = imagecreatefromjpeg('/image/captcha.jpg');
        $string = md5(microtime() * mktime());
        $text = substr($string, 0, 5);
        $color = imagecolorallocate($captcha, 0, 0, 0);
        $font = '/text-font/segoesc.ttf';
        imagettftext($captcha, 24, rand(-15, 15), rand(15,45), 55, $color, $font, $text);
        imagepng($captcha);
        imagedestroy($image);
        $_SESSION['captcha'] = $text;
        
?>