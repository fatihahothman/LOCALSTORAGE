<?php
//fetch files from folder 'content'
//show in modal
if(!empty($_POST['action']))
 {
  $dir = $_POST["action"];

  $file_data = scandir($dir);
  
  $output = '
  <table class="table table-hover table-bordered table-striped">
   <tr>
    <th>File Name</th>
    <th style="text-align:center;">Action</th>
   </tr>
  ';
  
  foreach($file_data as $file)
  {
   if($file === '.' or $file === '..')
   {
    continue;
   }
   else
   {
    $path = $dir . '/' . $file;
    $output .= '
    <tr>
     <td class="col-8" data-file_name = "'.$file.'" ><i class="far fa-file-alt" style="font-size:20px;color: #5E55E2;"></i>&nbsp;&nbsp;'.$file.'</td>
     <td style="text-align:center;"><button  name="browsetext" class="col-2 btn btn-primary uploadOn browsetext" style="width:40px;" data-name="'.$file.'" id="'.$path.'"><i class="fa fa-upload" name="loadtext" aria-hidden="true"></i></button></td>
    </tr>
    
    ';
    // echo "<script>console.log('File: " . $file . "' );</script>";

   }
  }
  
  $output .='</table>';
  echo $output;
 }
 
?>