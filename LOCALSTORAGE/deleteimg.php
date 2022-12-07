<?php  
  
 if(!empty($_POST["file"]))  //if image exist
 {  
     $img=$_POST["file"];

     $img="images/". $img;  //specify folder name
     
     unlink($img);   //unlink image from directory (images) ->delete image 
      
 }  
 ?>  