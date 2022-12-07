<?php


    $name= $_POST['filename'];   //text file name from input form
      
    $filename= $name . "." . "txt"; // add .txt extension to the file name

    $folderName = $_POST['foldername'];

    $dir = realpath(__DIR__ . '/..');  //one level up directory
    
    $defaultfolder="content";  //default folder

    $path = $dir . '/' . $folderName; 
  
    $pathtofile = $path.'/'.$defaultfolder.'/'.$filename;
      
    echo file_exists($pathtofile); 
  

    

    //Check if file is present & Returns True or False 
    

    // if (file_exists($pathtofile)) { 
    //     echo "File found in directory path";} 
    // else { 
    //     echo "File NOT found in directory path";
    // }
    

 


?>
