<?php
 
   $img = $_POST['img'];
   
   if (strpos($img, 'data:image/png;base64') === 0) {
       
      $img = str_replace('data:image/png;base64,', '', $img);
      $img = str_replace(' ', '+', $img);
      $data = base64_decode($img);
      $file = 'upload/img'.date("YmdHis").'.png';
   
      if (file_put_contents($file, $data)) {
         echo "$file";
      } else {
         echo 'The canvas could not be saved.';
      }   
     
   }
 
?>