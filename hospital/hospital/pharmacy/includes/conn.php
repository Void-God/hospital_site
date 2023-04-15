<?php
$dsn = 'mysql:host=localhost;dbname=capricor_pharmacy';
$conn = new PDO($dsn, 'root', '');
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $session_id=session_id();
      }
    define('root_path', 'localhost/pharmacy/');
    define('APIKEY', 'rzp_test_yAoyKACxm55cDK');
?>