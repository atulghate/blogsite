<?php
session_start();
  ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indexpage</title>
    <link rel="stylesheet" href="style.css">
    <style>
      .content a{
       width: 20px;
       border: 1px red;
       background: yellow;
       text-decoration: none;
       list-style-type: none;
       padding: 4px;
       margin:top 30px;
       color:black;


     }

    </style>
</head>
<body>
   <div class="navigation">
    
    <div class="left">
    <h2>iBlog</h2>
   <a href="index.php">Home</a>
    </div>
 <div class="right">
 <ul>
  <li><a href="login.php">LogIn</a></li>
  <li><a href="registretion.php">Registration </a></li>
  <?php
 if(isset($_SESSION['pass'])){
 ?> <li><a href="admin_dash.php">Admin</a></li>
 <li><a href="logout.php">Logout</a></li>
 <?php
}?>

</ul>
 </div>
 <?php
 include("dbcon.php");
//  $qry="SELECT * FROM `post`";
  // $qry= "SELECT * FROM `post` ORDER BY cid DESC ";
  $qry="SELECT * FROM `post` INNER JOIN author_info ON post.author_id = author_info.author_id ORDER BY cid DESC ";
 $run=mysqli_query($conn,$qry);

  while($data = mysqli_fetch_assoc($run)){
 ?>
   </div>
   <div class="content">
  <div class="title">
      <h1> <?php echo $data['title'];?></h1>
      <hr>
  </div>
   <div class="desc">
  <h3><h3>
   <h3><?php echo $data['short_desc'];?>
  <hr>
     Date&time:<b><?php echo $data['datetime'];?></b>
     <hr>
     Author Name:<b><?php echo $data['fname'];?></b>
   </div>
   <div >
   <a href="content.php?id=<?php echo $data['cid']?>"  name="edit">READ MORE</a>

   </div>
   </div>
   <?php } ?>
   <div class="footer">

   </div>
</body>
</html>