<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Protected Page</title>
</head>
<body>
<form action="action.php" method="post">
    <input type="submit" value="push">
    <input type="hidden" name="_token" value="<?php echo bin2hex(openssl_random_pseudo_bytes(16)) ?>">
</form>
</body>
</html>