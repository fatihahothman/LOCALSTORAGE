<?php 
//  print_r($_FILES);
if(isset($_POST['submitbutton'])){ 
    
    //uploading image //files
    if(!empty($_FILES)){  //if upload image

        if($_FILES['img']['name']!="") {
            $upload_dir = "images/";  //folder directory images
            $max_size = 5000000;//1MB   max size of image file
            $type = $_FILES['img']["type"];  //img file type
            $name = $_FILES['img']["name"]; //img file name
            $tmp_name =$_FILES['img']["tmp_name"];  //set temporary name
            $fileExtension = explode(".", "$name");//image.png
            $fileExtension = end($fileExtension);
            // for a unique name-random number
            $n1 = rand(1, 10000);
            $n2 = date("ymd");
            $n3 = time();
            $newName = $n1 . $n2 . $n3 . "." . $fileExtension;
            $filePath = $upload_dir . $newName;   //filename   "images/57492206081654692732.jpeg"
            $FILETYPE=array("image/jpeg","image/png" , "image/webp","image/bmp","image/gif");
            if(in_array($type,$FILETYPE)){   //if filetype allowed
                move_uploaded_file($tmp_name, $filePath);  //moves an uploaded img file to a directory
               
            }
            else{
                console.log("ERROR:File format not supported"); //else print error in console log
            }
            $_POST['UPLOAD']= $newName;   //img =$filepath
        }
        else{
            $_POST['UPLOAD']= ""; //empty -no img uploaded
        }
       
    }

   
    foreach($_POST as $key=>$value){
       if($key!='submitbutton' && $key!='editRow'){   //submitbutton and editrow not included
         if($key=='UPLOAD'){
            $datapost['IMG']=$value;  //key for image
         }

         elseif($key=='ANCHOR'  && $value!==""){
            
            //check anchor not integer -remove dot
            $int_anchor= str_replace(".", "", $value);

           // echo $int_anchor;
            if(is_numeric($int_anchor)){//if anchor is an integer ,datapost['TOC']=$value;
                
                $datapost['ANCHOR']=$value;
                $datapost['TOC']=$value;
            }

            else{ //if not int ,datapost['TOF']=$value;
                $val = str_replace(' ', '_', $value);  //replace space with underscore if anchor figure 1 ->figure1 as anchor cannot have space
                $datapost['ANCHOR']=$val;
                $datapost['TOF']=$val;
            }
           

         }

        else{
 
            $datapost[strtoupper($key)]=$value;  //converts all data name to uppercase
        }
                     
      }
    }
    echo json_encode($datapost);  //The json_encode() function is used to encode a value to JSON format.   
}

?>