<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registretion</title>
    <link rel="stylesheet" href="regi.css">
</head>
<body>
<div class="button">
   <a href="index.php">Home</a>
   </div>
   <center>
<div class="box">
    <form action="admin_dash.php" method="post">
<table>
     <tr><th><h3>Author Registretion</h3></th></tr>
    <tr>
    
        <th>Enter Full Name</th>
        <td><input type="text" name="fname" id="" required></td>
    </tr>
    <tr>
      <th>Gender</th>
      <td><input type="radio" name="gender" id="" value="male">Male
      <input type="radio" name="gender" id="" value="female">Female
    </td>
    </tr>
    <tr><th> Email</th>
     <td><input type="text" name="email" id="" required></td>
</tr>
<tr>
    <th>Mobile</th>
    <td><input type="text" name="mobile" id="" required></td>
</tr>
<tr><th>Create password</th>
     <td><input type="text" name="password" id=""  required></td>
</tr>
<tr><th><input type="submit" name="submit"></th></tr>
</table>
</form>
</center>

</div>
</body>
</html>
<?php

include("dbcon.php");

if(isset($_POST['submit'])){
  
 $fname =$_POST['fname'];
 $gender =$_POST['gender'];
 $email =$_POST['email'];
 $mobile =$_POST['mobile'];
 $password =$_POST['password'];


 $query= "INSERT INTO `author_info`( `fname`, `gender`, `email`, `mobile`, `password`) VALUES ('$fname','$gender','$email','$mobile','$password')";
 $runn= mysqli_query($conn,$query);
 
  header("location:admin_dash.php");
}else{
  echo " data not inserted";
}

  ?>
 
