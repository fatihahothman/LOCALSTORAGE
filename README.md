# Project title : JSON Generator Tool 
<h3>Introduction</h3>
<p>This project is aiming to generate a JSON encoded content from a form data and the data will be saved in the local storage.This is used to store the data locally and will be preserved even the browser is closed.The preserved data can be loaded and used at a later time.The data can be saved to local storage and retrieved,edit and delete from the local storage.This project allows the data to be saved in JSON format in a text file or load a JSON file to the local storage from a local folder.</p>
<h3>Build Status</h3>
<p>This project has been...</p>
<h3>Installation</h3>
<p>To access this project, the software programs need to be installed:</p>
<ul>
  <li>XAMPP Installer<ul><li>https://www.apachefriends.org/download.html</li></ul></li>
  <li>Any IDE; in this project, Visual Studio Code used.<ul><li>https://code.visualstudio.com/docs/?dv=win</li></ul></li>
</ul>
<h3>Code Style</h3>
<ul><li>Comments-The comments is used at the top or the sides of codes with // (double slash)</li></ul>
 
```php
echo json_encode($btnreturn);  //The json_encode() function is used to encode a value to JSON format. 
```
<h3>Code Documentation</h3>
<h4>1. Submit Form</h4>
<ul><h5>A. Function submitForm(event,page)-Fetch API</h5></ul>

```javascript
function submitForm(event,page) { //bring page=from url as parameter
   
    // Prevent the form from submitting.
    event.preventDefault();
   
    //get editform id
    var myData = new FormData(document.getElementById('editForm'));

    // Fetch is a browser API for loading texts, images, structured data, asynchronously to update an HTML page
   
    //fetch API to get form data
    fetch('processNote.php', {

            method: 'POST',

            body: myData    //FormData

        })
        
        // Converting received data ->returns the text content of the selected elements.
        .then(response => response.text())

        .then(data => {

            //result output
            console.log('Success:', data);  //form data

             //fetch API to get buuton value -button submitbutton and button editrow from form
            fetch('processBtn.php', {

                method: 'POST',
    
                body: myData    //FormData
    
            })
            // Converting received data ->returns the text content of the selected elements.
            .then(response => response.text())
    
            .then(btnData => {  //return value of submitbutton to differentiate between save and edit

                var BtnValue=JSON.parse(btnData);

                console.log('Success:', BtnValue.EDITROW);  //index of row data to be edited
                console.log('Success:', BtnValue.SUBMITBUTTON);  //value of submitton if 1=save ,2=edit body data,3=edit main,4=submit empty form for main of body 
                
                if(BtnValue.SUBMITBUTTON==1){ //save new data to local storage

                    if ("pagedata" in localStorage) {  //if theres pagedata in localStorage
                        // parsing data that was received as JSON;   
                       //get item from local storage-returns value of the specified Storage Object item
                       var docdata = JSON.parse(localStorage.getItem("pagedata")) ? JSON.parse(localStorage.getItem("pagedata")) : [];
                       console.log(docdata);   //print data in localstorage 
                      
                       docdata.push(data);  //push data to local storage
       
                   } else {  //else no data in local storage->push empty array
       
                       docdata = []; //declare as array
       
                       emptydata = [];   //declare as array
       
                       docdata.push(emptydata); //push empty array to the empty localStorage
       
                       docdata.push(data);
                       //push/adds data after emptydata
                    
                   }
       
                 
                   localStorage.setItem('pagedata', JSON.stringify(docdata));  //  sets the value of the "data" Object item.Save Data to Local Storage.
                  
                   $("#localstorage").html(""); // //emptying #localstorage container so no repeated data is displayed
                   
                   loadData(); //call loadData() to display local storage data of pagedata
     
                }

              //some code here
    
             //error handling
            .catch(error => {
    
                console.error('Error:', error);
    
            });
    
           
        })
        
         //error handling
        .catch(error => {

            console.error('Error:', error);

        });

}
```
<ul><li>What a function do</li><ul><li>This code is used to send a request to <strong>processNote.php</strong> to process the form data and return as json encoded text as a response.</li><li> send a request to <strong>processBtn.php</strong> to response with the button value from the form.</li></ul></ul>
<ul><li>What the function's parameters or arguments are</li><ul><li><strong> event </strong> and <strong> page </strong>are the parameters for this function</li></ul></ul>
<ul><li>What a function returns</li><ul><li>This function has no return value.</li></ul></ul>

<ul><h5>B. Get Form Data as JSON encoded</h5></ul>

``` php
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
```
<ul><li>This PHP codes is used to fetch form data from the form with POST method and return as JSON encoded string.</li></ul>
<ul><h5>C. Get button value from form</h5></ul>

``` PHP
<?php 
//  print_r($_FILES);
if(isset($_POST['submitbutton'])){ 
    //return value of submit button and edit row for edit local storage
    //as array
    $btnreturn=array(
        "SUBMITBUTTON"=>$_POST['submitbutton'],
        "EDITROW"=>$_POST['editRow']
        
    );
    echo json_encode($btnreturn);  //The json_encode() function is used to encode a value to JSON format. 
                                 
}

?>
```
