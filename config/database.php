<?php
function getDBConnection() {
    $host = 'localhost';
    $dbname = 'db_mvc';
    $username = 'root';
    $password = '';

    $db = new mysqli($host, $username, $password, $dbname);
    
    if ($db->connect_error) {
        die('Gagal Terhubung ke Database'. $db->connect_error);
    }
    
    return $db;
}
?>