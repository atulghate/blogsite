<?php
session_start();
if(isset($_SESSION['pass'])){
  $aid= $_SESSION['aid'];
}else{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .post{
            margin-top:30px;
            padding: 5px;
        }
        input[type="submit"]{
         background-color: rgb(54, 10, 95);
          color: aliceblue;   
          padding: 4px;
          justify-content: center;
          border-radius: 20px;
          font-weight: bold;
          margin-left: 10px;
          margin: top 10px;
        }
        .btn a{
            margin: top 20%;
         font-size: 15px;
         text-decoration: none;
         list-style-type: none;
         display: inline;
         padding: 5px;
        color: black;
        width:15%;
        cursor: pointer;
        border:2px solid ;
        background:lightgreen;
        }
    </style>
</head>
<body>
<div class="navigation">
    
    <div class="left">
    <h2>iBlog</h2>
    <h2>wellcome :</h2>
    <h2> <?php echo $_SESSION['pass'];?></h2>

    </div>
 <div class="right">
 <ul>
     <li><a href="index.php">Home</a></li>
  <li><a href="logout.php">Logout</a></li>
  <li><a href="admin_dash.php">Back</a></li> 
</div>
</div>
<center>
<div class="post">
        <h1>Edit Your Post</h1>
    </div>
<form action="#" method="post">

<div class="post"> 
    <?php 
include("dbcon.php");
  $rid = $_REQUEST['id'];
  
 $qry="SELECT * FROM `post` WHERE cid = $rid";
//  $qry="SELECT * FROM `post` INNER JOIN author_info ON post.author_id = author_info.author_id ";
 $run = mysqli_query($conn,$qry);
 foreach( $run as $f){
     ?>
   <textarea name="title" id="" cols="44" rows="2" placeholder= " Enter blog Title"><?php echo $f['title'];?></textarea>
   <div><div class="desc">
   <textarea name="short_desc" id="" cols="44" rows="5"  placeholder= " Enter short description"><?php echo $f['short_desc'];?></textarea>
   </div>
   <div>
       <textarea name="content" id="" cols="44" rows="8" placeholder= " Enter total description"><?php echo $f['content'];?></textarea>
   </div>
   <div>
       <input type="submit" value="Update Post" name="submit">
   </div>
   <div class="post">
       <hr>
   </div>
   <?php } ?>
</div>
</center>
</body>
</html>
<?php

 

if(isset($_POST['submit'])){

    $rid = $_REQUEST['id'];
    $title = $_POST['title'];
 $desc = $_POST['short_desc'];
 $content = $_POST['content'];

 $qry ="UPDATE `post` SET `title`='$title',`short_desc`='$desc',`content`='$content' WHERE cid = $rid ";
 $run= mysqli_query($conn,$qry);
 
  header('location:admin_dash.php');
  ?>
 <script>alert('Your post sucsessfully updated');</script> 
<?php
}

?>