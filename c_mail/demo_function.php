<?php
function sendEmail($toId, $from, $type, $id): void
{
    $to = 'demo@gmail.com';
    $email = <<<EOF
<!DOCTYPE html >
<html>
    <body>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <div>Test</div>
</body>
</html>';
EOF;

    $subject = "Test mail";
    $fromM = "community@nitragin.com.ar";
    $headers = "From:" . $fromM . "\r\n";
    $headers .= "Reply-To:soporte@nitragin.com.ar\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    mail($to, $subject, $email, $headers);
}