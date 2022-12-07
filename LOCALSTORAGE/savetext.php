<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!empty($_POST['text']))  //local storage from ajax
 {
   
   // Create folder if not exist
	$folderName = $_POST['foldername'];  //folder name from form

   $defaultfolder="content";  //default folder

   if($folderName!==""){

      $dir = realpath(__DIR__ . '/..');  //one level up directory

      $path = $dir . '/' . $folderName;  

      mkdir($path, 0777);       //create directory in $dir  -0777 -every user can Read, Write, and Execute

      mkdir($path.'/'.$defaultfolder, 0777);  //create directory content 
     
      $name= $_POST['filename'];   //text file name from input form

      if($_POST['jsfile']=="1"){
         $filename= $name . "." . "js";
      }
      else{
         $filename= $name . "." . "txt"; // add .txt extension to the file name
      }
   
      

      $createFile= fopen($path.'/'.$defaultfolder.'/'.$filename,"w") or die("Error");  //create/open file to write in the specified directory
      
      $text=$_POST['text']; //content of text file to be written [localstorage]
      
      fwrite($createFile,$text); //write to text file
      
      fclose($createFile); //close file


   }
   

	

 }

?>