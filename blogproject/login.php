<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="regi.css">
    <style>
        
    </style>
</head>
<body>
    <div class="button">
   <a href="index.php">Home</a>
   </div>
    <center>
<div class="logbox">
    <form action="#" method="post">
<table>
     <tr><th><h3>Author LogIn</h3></th></tr>

     
    <tr><th>  Enter Email</th>
     <td><input type="email" name="email" id=""></td>
</tr>

<tr><th>Enter Password</th>
     <td><input type="text" name="password" id=""></td>
</tr>
<tr><th><input type="submit" value="submit" name="login"></th></tr>
</table>
</form>
</center>

</div>
</body>
</html>
<?php
  include("dbcon.php");
  if(isset($_POST['login'])){
  $email= $_POST['email'];
  $pass=$_POST['password'];
  $qry= "SELECT * FROM `author_info` WHERE `email`='$email'  AND `password`='$pass' ";
  $run= mysqli_query($conn,$qry);
  $row=mysqli_num_rows($run);
  if($row < 1){
    
      ?>
     <script>alert('please enter correct password and username');</script> 
  <?php
  }else{
    
    $data = mysqli_fetch_assoc($run);
      $_SESSION['pass']= $data['fname'];
      $_SESSION['aid']=$data['author_id'];
      header("location:admin_dash.php");
      
  }
}
  ?>
        