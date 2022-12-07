<?php
//print_r($_POST);  //text file name   return Array([filetxtname] => name)

//if(isset($_POST['savetext'])){ 
    
    $filereturn=array(
        "FILENAME"=>$_POST['filetxtname'],// return text file name 
        "FOLDERNAME"=>$_POST['foldername']// return folder name   
    );

    echo json_encode($filereturn); 
                                 
//}


// Fetch API:it will grab the text content of the page, which is what you echo'ed .
?>
