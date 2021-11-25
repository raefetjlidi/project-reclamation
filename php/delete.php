<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM contact WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location:http://localhost/atelierphp/web/php/index.php");
}