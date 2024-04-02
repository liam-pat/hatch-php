<?php

function set_cookie(): void
{
    if (!headers_sent()) {
        ob_start();
        setcookie('user' . '[id]', $_POST['id'], (new DateTimeImmutable())->add(new DateInterval('P10D'))->getTimestamp());
        // '/', '.localhost', 0, 0)
        setcookie('user' . '[name]', $_POST['forename'], (new DateTimeImmutable())->add(new DateInterval('P10D'))->getTimestamp());
        // '/', '.localhost', 0, 0)
        setcookie('user' . '[admin]', $_POST['admin'], (new DateTimeImmutable())->add(new DateInterval('P10D'))->getTimestamp());
        // '/', '.localhost', 0, 0)
        ob_end_flush();

        var_dump(headers_list());
        exit('header already sent!!');
    }
}