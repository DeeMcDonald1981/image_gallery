
<?php
include('inc/header.php'); 
?>



<section id="images">
   <div class="container clearfix">
      <div class="img_gallery">

         <h2> image gallery</h2>
         <?php
         $q = "select * from pics";
         $r = mysqli_query($dbc, $q);
         ?>
         <?php while($row = mysqli_fetch_array(($r))):?>
         <div class="img_box">
            <img src="uploads/<?php echo $row['img_name'] ?>" alt="">
            
         </div>
            <?php endwhile ?>
      </div>
   </div>
</section>




<?php include('inc/footer.php') ?>