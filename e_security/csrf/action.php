<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // the backend also needs to verify the value
    if (!isset($_POST['_token'])) {
        die('Invalid token');
    }
}
echo 'passed';