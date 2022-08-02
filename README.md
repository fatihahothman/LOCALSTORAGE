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
<ul><li>This PHP codes is used to fetch form data from the form with POST method and return as JSON encoded string to the Fetch API.</li></ul>
<ul><h5>C. Get button value from form</h5></ul>

``` PHP
<?php 
//  print_r($_FILES);
if(isset($_POST['submitbutton'])){ 
    //return value of submit button and edit row for edit local storage to differentiate what type of action is carried out-submit/edit/save section
    //as array
    $btnreturn=array(
        "SUBMITBUTTON"=>$_POST['submitbutton'],  //value of submitbutton if 1=save ,2=edit body data,3=edit main,4=submit empty form for main of body 
        "EDITROW"=>$_POST['editRow']   //index of row to be edited (edit data)
        
    );
    echo json_encode($btnreturn);  //The json_encode() function is used to encode a value to JSON format. 
                                 
}

?>
```
<ul><li>This PHP code is used to fetch button value from form and return to the Fetch API.</li></ul>
<h4>2. Load Data </h4>
<ul><li><h5>Function loadData()</h5></li></ul>

``` javascript
  function loadData() {
           
            let pageStorage = new Array();
            $("#pgData").html(""); //emptying #localstorage container so no repeated data is displayed
            // let x = 0; //initlal text box count
            pageStorage = JSON.parse(localStorage.getItem("pagedata")) ? JSON.parse(localStorage.getItem("pagedata")) :
                [] //get item from local storage
            if (pageStorage) {
                // document.getElementById("loadPgData").style.display = "block"; //card for displaying page data

                for (let i = 1; i < pageStorage.length; i++) { //loop thru local storage

                    let dataArray = JSON.parse(pageStorage[i]); //declaring dataArray to access key in local storage

                    if (dataArray.BIGTITLE !== undefined) { //check if bigtitle is not undefined
                        title = dataArray.BIGTITLE;
                    } else { //if bigtitle undefined then it will take title as title (for addsub)
                        title = dataArray.TITLE;
                    } 
                   
                    if (dataArray.FIG_TITLE!=="" && dataArray.FIG_TITLE!==undefined) { //if anchor is not a number
                        title = dataArray.FIG_TITLE;
                    } 

                    if (dataArray.ANCHOR !== "") {
                        anchorTitle = dataArray.ANCHOR + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + title;
                    } else {
                        anchorTitle = title;
                    }

                    if (dataArray.BODY !== "" && dataArray.BODY.length>1) {
                        body1 = dataArray.BODY;
                      //  console.log(body1.join('\r\n'));
                        body2=body1.join('<br><br>');  //put line break between paragraph

                    }else{
                        body2 = dataArray.BODY;
                    }
                  console.log(title);
                    $('#loaddata').append(`<tr>
                    <td class="col-10 PageData">${anchorTitle}<br>${body2}</td>
                    <td class="ActionPage" style="text-align:center">&nbsp;&nbsp;<i class="far fa-trash-alt"  onclick="removePageData(${i});" style="color:#e74c3c;font-size:20px;"></i></i></td>
                    </tr>`);
                }

            }

        }

```
<ul><li>What a function do</li><ul><li>This code is used to load data from local storage and display on HTML page.</li></ul></ul>
<ul><li>What the function's parameters or arguments are</li><ul><li>This function has no parameter</li></ul></ul>
<ul><li>What a function returns</li><ul><li>This function has no return value.</li></ul></ul>
<h4>3. Remove data</h4>
<ul><h5>A. Function removePageData(value)</h5></ul>

``` javascript
 function removePageData(value) {
            // console.log(value);
            // parsing data that was received as JSON;   
            //get item from local storage-returns value of the specified Storage Object item
            pageStorage = JSON.parse(localStorage.getItem("pagedata")) ? JSON.parse(localStorage.getItem("pagedata")) :
                [];

            if (pageStorage) {
                for (let i = 1; i < pageStorage.length; i++) { //loop thru local storage
                    let dataArray = JSON.parse(pageStorage[i]); //declaring dataArray to access key in local storage

                    if (i == value) { //if value pass in in remove(value) is equal to i 
                        // console.log(dataArray.UPLOAD);
                        imgTodel = dataArray.IMG; //set var for img to be deleted from directory
                        console.log(imgTodel); //show imgTodel value in console.log() to verify 


                        //send AJAX request for deleting image from directory
                        $.ajax({
                            url: 'deleteimg.php', //unlink image from directory (images)     
                            data: {
                                'file': imgTodel
                            }, //file->image to be deleted
                            method: 'POST', //using method POST
                        });

                        //delete local storage data 
                        //splice() method changes the contents of an array by removing or replacing existing elements and/or adding new elements in place
                        pageStorage.splice(value, 1); //  remove one data at index =value -> splice(start, deleteCount) 

                    }
                }
                // JSON.stringify() method converts a JavaScript object or value to a JSON string before save to local storage
                // because Local storage can only save strings
                // sets the value of the specified Storage Object item.
                localStorage.setItem("pagedata", JSON.stringify(pageStorage));
                loadData();
            }

        }
```
<ul><li>What a function do</li><ul><li>This code is used to delete page data from local storage.</li><li>Send AJAX request to <strong>deleteimg.php</strong></li></ul></ul>
<ul><li>What the function's parameters or arguments are</li><ul><li><strong>value</strong> is the parameter of this function.Value is the index of data to be deleted in the local storage.</li></ul></ul>
<ul><li>What a function returns</li><ul><li>This function has no return value.</li></ul></ul>
<ul><h5>B. Unlink image from directory</h5></ul>

``` PHP
<?php  
  
 if(!empty($_POST["file"]))  //if image exist
 {  
     $img=$_POST["file"];

     $img="images/". $img;  //specify folder name
     
     unlink($img);   //unlink image from directory (images) ->delete image 
      
 }  
 ?>  
```
<ul><li>This PHP code is used to unlink image of data deleted from directory.</li></li>
<h4>3. Save Section</h4>
<ul><h5>A. Function savePage()</h5></ul>
``` javascript
function savePage() {
           
            $("#pgData").html(""); //clear localstorage container
        
            let storage = new Array();
            //get maindata in local storage
            storage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) : [];

            //storing page number of section 
            counter = JSON.parse(localStorage.getItem("counterPage")) ? JSON.parse(localStorage.getItem( "counterPage")) : [];

            Paracounter = JSON.parse(localStorage.getItem("counterPara")) ? JSON.parse(localStorage.getItem("counterPara")) : []; //save paragraph counter
            //paracounter save total of paragraph container which is equal to body length of current data
            //it is used for removing paragraph container that has been added to back the form to default state [only one paragraph ] everytime before value is fetched to form 


            if (storage) {
                
                let pageStorage = new Array();
                pageStorage = JSON.parse(localStorage.getItem("pagedata")) ? JSON.parse(localStorage.getItem("pagedata")) : []; //get pagedata in local storage
           
                counter = storage.length +1; //counter equal to storage length + 1 ,if there is 1 data in maindata then counter=1

                
                    x=pageStorage.length-1;
                    let dataArray = JSON.parse(pageStorage[x]);; 
                  
                    console.log(dataArray.BODY.length);
                  
                
                if(counter>1){  //if current page not first page
                    document.getElementById("resetForm").click(); //reset form

                    if (Paracounter) {
                        console.log(Paracounter);

                        for (let i = 1; i < Paracounter; i++) { //based on current counterPara value in LS

                            document.getElementById("remove_field").click(); //click button to remove paragraph that has been added

                        }
                    }

                    //to let form submitted finish executed first
                   setTimeout(()=>{
                       savePageinBody();
                    },4);
                    
                    //submit empty form so all data will be in body[]
                    document.getElementById("submitbutton").value = "4"; //set submitbutton to 4  (use in json.js)
                    document.getElementById("save").click();// Form submission

                }else{
                    savePageMain();  //first page
                }

                Paracounter = dataArray.BODY.length; ////paracounter =current body length

                localStorage.setItem('counterPara', JSON.stringify(Paracounter)); //save paracounter

            }
                localStorage.setItem('counterPage', JSON.stringify(counter)); //save new page number to localStorage

        }

```
<ul><li>What a function do</li><ul><li>This code is used to call another function which are savePageMain() or savePageinBody().</li></ul></ul>
<ul><li>What the function's parameters or arguments are</li><ul><li>This function has no parameter.</li></ul></ul>
<ul><li>What a function returns</li><ul><li>This function has no return value.</li></ul></ul>
