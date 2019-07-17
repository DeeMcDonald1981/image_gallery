<?php
ob_start();
define('TITLE', 'image gallery');
@$dbc  = mysqli_connect('localhost','root','thefallen_09','img_gallery');
?>
<?php if(!$dbc):?>
<h1 style="color:red;font-family:Arial, Helvetica, sans-serif; text-transform: uppercase;text-align:center;margin-top: 2rem">could not connect to the database</h1>
<?php die()?>
<?php endif?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title><?php echo TITLE ?></title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header id="header">
   <nav id="navigation">
      <div class="container clearfix">
         <div class="navleft">
            <a href="#"><?php echo TITLE ?></a>
         </div>
         <div class="navbtn">
            <div class="navbar"></div>
            <div class="navbar"></div>
            <div class="navbar"></div>
         </div>
          <div class="navright">
            <a href="index.php">home</a>
            <a href="add_img.php">upload </a>
            <a href="gallery.php"> gallery</a>
            <a href="#">contact</a>
      </div>
      </div>
   </nav>
</header>
