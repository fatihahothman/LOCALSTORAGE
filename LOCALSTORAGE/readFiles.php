<?php
//read text from text file and return to ajax
if(!empty($_POST['path']))
 {
    $file = new SplFileObject($_POST['path']);

	while(!$file->eof())
	  {
		echo $file->fgets();
	  }

	$file = null;

 }
 
?>