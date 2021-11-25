<?php
$dsn = 'mysql:host=localhost;dbname=recla_projet';
$username = 'root';
$password = '';
try {
$connection = new PDO($dsn, $username, $password);
} catch(PDOException $e) {

}