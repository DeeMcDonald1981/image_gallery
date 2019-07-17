
<?php
include('inc/header.php'); 
include('inc/hero.php'); 
?>


<section id="images">
   <div class="container clearfix">
      <div class="img_gallery">

         <h2> recent images</h2>
         <?php
         $q = "select * from pics order by upload_date desc limit 4";
         $r = mysqli_query($dbc, $q);
         ?>
         <?php while($row = mysqli_fetch_array(($r))):?>
      <div class="img_box">
      <p class="upload">added: <?php echo date('F j, Y g:i:a', strtotime($row['upload_date'])) ?></p>
         <img src="uploads/<?php echo $row['img_name'] ?>" alt="">
         
      </div>
      <?php endwhile ?>
      </div>
   </div>
</section>

<?php include('inc/footer.php') ?>