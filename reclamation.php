<?php
 $conn= mysqli_connect ("localhost","root","","projet");

 $name=$_POST['name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $message=$_POST['message'];
 $subject=$_POST['subject'];

 $req="INSERT INTO 'reclamation' (name,email,phone,subject,message) values ('$name','$email','$phone','$subject','$message')";
$res=mysqli_query($conn,$req);

$req1="SELECT * from 'reclamation'";
$res1=mysqli_query($conn,$req1);
 if($res) {
    $row=mysqli_fetch_assoc($result);
     while($row) {
         $name=$row['name'];
         $email=$row['email'];
         $phone=$row['phone'];
         $subject=$row['subject'];
         $message=$row['message'];
         echo " <tr>
         <th>'.$name'.</th>
         <td>'.$name.'</td>
         <td>'.$email.'</td>
         <td>'.$phone.'</td>
         <td>'.$subject.'</td>
         <td>'.$message.'</td>
         </tr>";
         
     }
        


 {
     echo "Done";
    }
 else echo "error";

 mysql_close($conn);
 ?>
