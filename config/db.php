<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=combat2;charset=utf8', 'root', '');
} catch (Exception $message) {
    echo "il y a un souci <br>" . "<pre>$message</pre>";
}