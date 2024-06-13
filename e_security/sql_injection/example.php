<?php

$db = new PDO('mysql:host=127.0.0.1;dbname=example_php', 'root', '');

// a table will be deleted
$value = $_POST['email'] = "';DROP TABLE post; --";
$user = $db->query("SELECT * From users WHERE email = '{$value}'");

// avoid from sql injection
$user = $db->prepare("SELECT * From users WHERE email = :email");
$user->execute(array(':email' => $value,));
