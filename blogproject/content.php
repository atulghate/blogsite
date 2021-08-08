<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>content</title>
    <link rel="stylesheet" href="style.css">
    <style>
      .content a{
       width: 20px;
       border: 1px red;
       background: yellow;
       text-decoration: none;
       list-style-type: none;
       padding: 4px;
       

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
</div>
<div class="content">
<?php
include("dbcon.php");
  $rid = $_REQUEST['id'];
  
 $qry="SELECT * FROM `post` WHERE cid = $rid";
//  $qry="SELECT * FROM `post` INNER JOIN author_info ON post.author_id = author_info.author_id ";
 $run = mysqli_query($conn,$qry);
 foreach( $run as $f){
   ?> <div class="title">
      <h1> <?php echo $f['title'];?></h1>
      <hr>
  </div>
  <h3><h3>
   <h3><?php echo $f['content'];?>
  <hr>

     Date&time:<b><?php echo $f['datetime'];?></b>
     <hr>
    <div>
      <a href="index.php">back</a>
    </div>

   </div>
  <?php } ?>
        
</div>
</body>
</html>