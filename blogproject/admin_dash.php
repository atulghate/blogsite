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
        .btn{
            margin: 20px;
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
  <li><a href="#">Contact</a></li> 
</div>
</div>
<center>
    <div class="post">
        <h1>Create New Post</h1>
    </div>
<form action="#" method="post">

<div class="post">  
   <textarea name="title" id="" cols="44" rows="2" placeholder= " Enter blog Title" required></textarea>
   <div><div class="desc">
   <textarea name="short_desc" id="" cols="44" rows="5"  placeholder= " Enter short description" required></textarea>
   </div>
   <div>
       <textarea name="content" id="" cols="44" rows="8" placeholder= " Enter total description" required></textarea>
   </div>
   <div>
       <input type="submit" value="Add Post" name="submit">
   </div>
   <div class="post">
       <hr>
   </div>
</div>
<div class="post">
 <h1>MY POST</h1>
</div>
<?php
include("dbcon.php");
$qry="SELECT * FROM `post` WHERE author_id= $aid";
 $run=mysqli_query($conn,$qry);
  $data = mysqli_fetch_assoc($run);
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
   </div>
   <div class="btn">
   <a href="update.php?id=<?php echo $data['cid']?>"  name="edit">EDIT POST</a>
   <a href="delete.php?id=<?php echo $data['cid']?>"  name="edit">DELETE POST</a>

   </div>
   </div>
   <?php } ?>

</form>
</center>
</body>
</html>
<?php

include("dbcon.php");
if(isset($_POST['submit'])){
    if(isset($_POST['content'])){
    $title = $_POST['title'];
    $desc = $_POST['short_desc'];
    $content = $_POST['content'];

    $qry="INSERT INTO `post`( `author_id`, `title`, `short_desc`, `content`) VALUES (' $aid','$title','$desc','$content')" ;
    $run=mysqli_query($conn,$qry);
    }


}else{
    echo" error while submiting data ";
}


?>