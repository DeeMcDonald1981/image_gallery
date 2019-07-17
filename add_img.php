
<?php
include('inc/header.php'); 
?>


<section id="uploads">
   <div class="container clearfix">
      <?php
         if($_SERVER['REQUEST_METHOD'] = 'POST'){
            if(isset($_FILES['img'])){
                  $allowed = ['image/pjpeg','image/jpeg','image/JPG','image/X-PNG','image/PNG','image/png','image/x-png'];
                  if(in_array($_FILES['img']['type'], $allowed)){

                     if(move_uploaded_file($_FILES['img']['tmp_name'], "uploads/{$_FILES['img']['name']}")){
                       
                        $img = $_FILES['img']['name'];
                        $cat = $_POST['category'];
                        $q = "insert into pics (img_name, category,upload_date) values ('$img', '$cat', now()) ";
                        if(mysqli_query($dbc, $q)){
                           ?>
                        <p class="success">the file has been uploaded</p>
                           <?php

                           header('refresh:2; gallery.php');
                           exit;
                        }
                     }else{

                        ?>
                        <p class="error">Please upload a JPEG or PNG image</p>
                        <?php
                     }

                  }// end in_array


            if($_FILES['img']['error'] > 0){
               ?>
               <p class="error">the file could not be uploaded because: </p>
               <p class="error">
               <?php
               header('refresh:3;add_img.php');
               switch($_FILES['img']['error']){
                  case 1:
                  print 'The file exceeds the upload_max_filesize setting in php.ini.';
                  break;
               case 2:
                  print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
                  break;
               case 3:
                  print 'The file was only partially uploaded.';
                  break;
               case 4:
                  print 'No file was uploaded.';
                  break;
               case 6:
                  print 'No temporary folder was available.';
                  break;
               case 7:
                  print 'Unable to write to the disk.';
                  break;
               case 8:
                  print 'File upload stopped.';
                  break;
               default:
                  print 'A system error occurred.';
                  break;
                     }
            }// enf  $_FILES error

            
            if(file_exists($_FILES['img']['tmp_name']) && is_file($_FILES['img']['tmp_name'])){
               unlink($_FILES['img']['tmp_name']);
            }
         }// end if(isset)

         }// end $_SERVER
      ?>
      </p>
      <h2> upload images</h2>
      <form action="add_img.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="300000000">
      <input type="file" name="img">
      <label for="">Image Catetory</label>
      <input type="text" name="category">
      <input type="submit" name="submit" value="upload image">
      </form>
   </div>
</section>

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
            <p class="category">category: <?php echo $row['category'] ?></p>
         <img src="uploads/<?php echo $row['img_name'] ?>" alt="">

         </div>
         <?php endwhile ?>
   </div>
</div>
</section>



<?php include('inc/footer.php') ?>