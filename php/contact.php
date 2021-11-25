<?php
require 'db.php';
$message = '';
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['subject']) && isset($_POST['message']) 
&& isset($_POST['type']) ) 
{
  $name =$_POST['name'] ;
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $type =$_POST['type'];
  $subject=$_POST['subject'];
  echo "$type";
  $message=$_POST['message'];
  $sql = "INSERT INTO contact (name, email,phone,subject,message) VALUES (:name, :email, :phone , :subject , :message)";
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name,':email' => $email,':phone' => $phone,':subject' => $subject,':message' => $message])) 
  {
    $message = 'data inserted successfully';
    $reclaId = $connection->lastInsertId();
    $sqlMo = "INSERT INTO motif (type, reclaId) VALUES (:type , :reclaId)";
    $statementT = $connection->prepare($sqlMo);
    if ($statementT->execute([':type' => $type ,':reclaId' => $reclaId]))
    {
      echo"Done";
    }
    else echo "error";

  
   

  }
}
 ?>
