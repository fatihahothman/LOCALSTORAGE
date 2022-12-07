function SaveTXT(event) {
    // Prevent the form from submitting.
            event.preventDefault();
                //get editform id
            //var textForm = new FormData(document.getElementById('nameForm'));

            var filename =document.getElementById('filetxtname').value;

            var foldername=document.getElementById('foldername').value;

            // Fetch is a browser API for loading texts, images, structured data, asynchronously to update an HTML page
            //fetch API
   
            let storage = new Array();

            let myStorage= new Array();

            myStorage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) : [] //get item from local storage
           
            // storage={SECTION:myStorage};

            // sectionLength=myStorage.length;    ///SECTION LENGTH

            //sectionLength=2500;
           // console.log(myStorage.length);

            storage = JSON.stringify(storage, null,'\r\n'); //Used as a new line character in  Windows  -nak bagi fetch multi line
           
            result = storage.replace(/\\/g, ''); //g - Global replace. Replace all instances of the matched string in the provided text.

            result = result.replace(/\"\{/g, '\{'); //remove "" from {} of body 

            result = result.replace(/\}\"/g, '\}'); //remove "" from {} of body 

           result=result.replace(/(\r\n|\r|\n){2}/g, '$1').replace(/(\r\n|\r|\n){3,}/g, '$1');  //remove \n
           
            result = result.replace(/\}\,/g,'\}\,\n\n');

            result=result.replace(/\[\{/g,'\[\n\{');

          //  result=result.replace(/\]\,/g,'\]\,\n');

            result = result.replace(/\{\"/g,'\t\t\{\"');

            result = result.replace(/\"\,/g, '\"\,\r\n\n\t\t'); // bagi body data ada line break  after every "key":"value",

            result = result.replace(/\"\]\,/g, '\"\]\,\r\n\n\t\t'); //bagi body data ada line break  after every "key":"value",-this one for body [] then \n

           result=result.replace(/(\n\s*?\n)\s*\n/mg, '$1');
           

           // console.log(result); //final result 
            

            $.ajax({  //let this finish run first -then execute clearLocalStorage()
                url: 'savetext.php', //write to text file 
                data: {
                    'text': result,
                    'filename': filename,
                    'foldername' :foldername,
                    'jsfile' : "0"  //not a js file
                }, //text->local storage data
                // name -> text file name
                method: 'POST', //using method POST
                success: function() {
                    clearLocalStorage();
                }
                //     if (data !== 'failed'){
                //         clearLocalStorage();
                //     }
                //     else {
                //         $("#warning").html("<div class='alert alert-danger bg-danger alert-dismissible fade show' id='my-alertadd' role='alert' style='width:100%;display: block;margin: 0 auto;color:black;font-size:15px;'><strong>The maximum sections allowed is 2000.Please reduce the section until 2000 sections only.</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div><br>");
                //     }
                // }
              
            });


}

function SaveJS(event) {
    // Prevent the form from submitting.
            event.preventDefault();
                //get editform id
            //var textForm = new FormData(document.getElementById('nameForm'));

            var filename =document.getElementById('filetxtname').value;

            var foldername=document.getElementById('foldername').value;

            // Fetch is a browser API for loading texts, images, structured data, asynchronously to update an HTML page
            //fetch API
   
            let storage = new Array();

            let myStorage= new Array();

            myStorage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) : [] //get item from local storage
           
            storage={SECTION:myStorage};

            // sectionLength=myStorage.length;    ///SECTION LENGTH

            // sectionLength=2500;
          
            result = JSON.stringify(storage,null,2); //Used as a new line character in  Windows  -nak bagi fetch multi line

            storage = JSON.stringify(storage, null,'\r\n'); //Used as a new line character in  Windows  -nak bagi fetch multi line
            
            result = storage.replace(/\\/g, ''); //g - Global replace. Replace all instances of the matched string in the provided text.

            result=result.replace(/"([^"]+)":/g, '$1 : ');  //remove "" from key

            const regex = new RegExp('"{ANCHOR', 'g');

            result = result.replace(regex, '\t\t\{\n\t\t\tANCHOR'); //remove "" from {} of body 

            result = result.replace(/\"\}\"/g, '\"\n\t\t\}'); //remove "" from {} of body 

            result=result.replace(/(\r\n|\r|\n){2}/g, '$1').replace(/(\r\n|\r|\n){3,}/g, '$1');  //remove \n
            
            result = result.replace(/\}\,/g,'\}\,\n\n');

            result=result.replace(/\[\{/g,'\[\n\{');

            result = result.replace(/\{\"/g,'\t\{\"');

            result = result.replace(/\"\,/g, '\"\,\r\n\n\t\t\t'); // bagi body data ada line break  after every "key":"value",

            result = result.replace(/\"\]\,/g, '\"\]\,\r\n\n\t\t\t'); //bagi body data ada line break  after every "key":"value",-this one for body [] then \n

            result=result.replace(/(\n\s*?\n)\s*\n/mg, '$1');  //remove line break

           result=result.replace(/\{/m, ''); //remove first line {

           result=result.replace(/\r?\n?[^\r\n]*$/, ""); //remove last line }

           result=result.replace(/\r?\n?[^\r\n]*$/, "];"); //add ];

           result=result.replace("SECTION :", 'var SECTION = ');
     
            console.log(result);
            
            $.ajax({  //let this finish run first -then execute clearLocalStorage()
                url: 'savetext.php', //write to text file 
                data: {
                    'text': result,
                    'filename': filename,
                    'foldername' :foldername,
                    'jsfile' : "0"  //not a js file
                }, //text->local storage data
                // name -> text file name
                method: 'POST', //using method POST
                success: function() {
                    clearLocalStorage();
                }
                //     if (data !== 'failed'){
                //         clearLocalStorage();
                //     }
                //     else {
                //         $("#warning").html("<div class='alert alert-danger bg-danger alert-dismissible fade show' id='my-alertadd' role='alert' style='width:100%;display: block;margin: 0 auto;color:black;font-size:15px;'><strong>The maximum sections allowed is 2000.Please reduce the section until 2000 sections only.</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div><br>");
                //     }
                // }
              
            });


          

}


function clearLocalStorage() { //clear local storage

   var filename =document.getElementById('filetxtname').value;

   var foldername=document.getElementById('foldername').value;

   $.ajax({  //send folder name to php to list all files in folder 'content'

    url: "checkFileExist.php",

    method: "POST",

    data: {
        'filename': filename,
        'foldername' :foldername
    },

    success: function (data) {  //show file list in modal
       console.log("File Exist :",data);

       localStorage.clear();

       location.reload();   //reload page
       
       document.getElementById("pageList").contentWindow.location.reload(true); //reload element
    }


});

}

//loadtext to local storage

function loadtext() {

    localStorage.clear(); //clear local storage

    //Get the file input element by its id 
    var fileInput = document.getElementById('myFile');
    //Get the file name
    var fileName = fileInput.files[0].name;

    // Regular expression for file extension.
    var patternFileExtension = /\.([0-9a-z]+)(?:[\?#]|$)/i;

    //Get the file Extension 
    var fileExtension = (fileName).match(patternFileExtension);
    console.log(fileExtension);


    let fileReader = new FileReader();

    fileReader.onload = function () {

    if(fileExtension[0]==".js"){

        data=fileReader.result;
        
        data=data.replace("var SECTION = ", '{\n\n"SECTION" :');

        data=data.replace(/\r?\n?[^\r\n]*$/,"\}\n]\n\}");
    
       // var objKeysRegex = /({|,)(?:\s*)(?:')?([A-Za-z_$\.][A-Za-z0-9_ \-\.$]*)(?:')?(?:\s*):/g;// look for object names

       // data = data.replace(objKeysRegex, "$1\"$2\":");// all object names should be double quoted-result in "ANCHOR":  -inavlid whitespace

        data=data.replace(/(?!\b\s+\b)\s+/g, ""); //remove whitespace between quoted key result in  "ANCHOR":

        data=data.replace(new RegExp("ANCHOR", 'g'),'"ANCHOR"');

        data=data.replace(new RegExp("TOC", 'g'),'"TOC"');

        data=data.replace(new RegExp("BIGTITLE", 'g'),'"BIGTITLE"');

        data=data.replace(new RegExp("FIG_TITLE", 'g'),'"FIG_TITLE"');

        data=data.replace(/\bTITLE\b/g,'"TITLE"');

        data=data.replace(new RegExp("BODY", 'g'),'"BODY"');

        data=data.replace(new RegExp("IMG", 'g'),'"IMG"');

        data=data.replace(new RegExp("TOF", 'g'),'"TOF"');

        data=data.replace(new RegExp("ALINK", 'g'),'"ALINK"');

        data=data.replace(new RegExp("PAGE", 'g'),'"PAGE"');

        console.log(data);
    
        let parsedJSON = JSON.parse(data);

        console.log(parsedJSON);

        lssave(parsedJSON);

    }else{  //txt file
        console.log(fileReader.result);
        let parsedJSON = JSON.parse(fileReader.result);
        console.log(parsedJSON);

       lssave(parsedJSON);
    }

   
   
    }
    fileReader.readAsText(document.querySelector('.file').files[0]);

}



//load data to local storage 
function lssave(data) {
  //  console.log(data);

    storage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) : [] //get item from local storage


    if (storage) {

        Object.keys(data.SECTION).forEach(function (k) {
            storage.push(data.SECTION[k]); //push data to local storage main data

            //  localStorage.setItem('maindata', JSON.stringify(data[k]));
        });
    }
   // console.log(JSON.stringify(storage));
    localStorage.setItem('maindata', JSON.stringify(storage)); //  save maindata to local storage

    //data received from text file are not stringified -it has been replaced before saving to text file-saveTXT()
    //stringify body data 

    if (storage) {
        for (let i = 0; i < storage.length; i++) {
            let tempArray = storage[i];
            console.log(tempArray.BODY.length);

            for (z = 0; z < tempArray.BODY.length; z++) {

                console.log(typeof(tempArray.BODY[z]));

                if(typeof tempArray.BODY[z] === "object"){  //only stringify if it is an object
                    body1 = JSON.stringify(tempArray.BODY[z]); //stringify body
              
                    tempArray.BODY [z]= body1; //body equal to temp
                }
                
            }

        }
    }

    localStorage.setItem('maindata', JSON.stringify(storage)); //  save maindata to local storage

    location.reload(); //reload page
    document.getElementById("pageList").contentWindow.location.reload(true); //reload element


};


//fetchFiles.php
//onclick browse text button
$(document).on('click', '.view_files', function () {

    var folder = "content";

    $.ajax({  //send folder name to php to list all files in folder 'content'

        url: "fetchFiles.php",

        method: "POST",

        data: {
            action: folder
        },

        success: function (data) {  //show file list in modal
            $('#file_list').html(data);
            $('#filelistModal').modal('show');
        }


    });

});



//onclick icon 'upload' in modal
$(document).on('click', '.browsetext', function(){
  
    var path = $(this).attr("id");  //get id of button icon = file path

    console.log(path);

    //Get the file input element by its id 
    var fileInput = path;
    //Get the file name

    // Regular expression for file extension.
    var patternFileExtension = /\.([0-9a-z]+)(?:[\?#]|$)/i;

    //Get the file Extension 
    var fileExtension = (fileInput).match(patternFileExtension);
    console.log(fileExtension);

    if(fileExtension[1]=="js"){
        console.log("js");
    }

    
  
    
    $.ajax({
        url: 'readFiles.php', //read data from text file
        
        method: 'POST', //using method POST
        
        data: {
            'path': path    
        },

        success: function (data) {

            if(fileExtension[1]=="txt"){

                data=JSON.parse(data);  //parse data received from readFiles.php

                localStorage.clear(); //clear local storage if theres data already existed
         
                lssave(data);  //save to local storage
            }
            
            else{
                console.log(data);
                data=data.replace("var SECTION = ", '{\n\n"SECTION" :');

                data=data.replace(/\r?\n?[^\r\n]*$/,"\}\n]\n\}");
            
                //var objKeysRegex = /({|,)(?:\s*)(?:')?([A-Za-z_$\.][A-Za-z0-9_ \-\.$]*)(?:')?(?:\s*):/g;// look for object names
        
               // data = data.replace(objKeysRegex, "$1\"$2\":");// all object names should be double quoted-result in "ANCHOR: " -inavlid whitespace
        
                data=data.replace(/(?!\b\s+\b)\s+/g, ""); //remove whitespace between quoted key result in  "ANCHOR:"

                data=data.replace(new RegExp("ANCHOR", 'g'),'"ANCHOR"');

                data=data.replace(new RegExp("TOC", 'g'),'"TOC"');

                data=data.replace(new RegExp("BIGTITLE", 'g'),'"BIGTITLE"');

                data=data.replace(new RegExp("FIG_TITLE", 'g'),'"FIG_TITLE"');

                data=data.replace(/\bTITLE\b/g,'"TITLE"');

                data=data.replace(new RegExp("BODY", 'g'),'"BODY"');

                data=data.replace(new RegExp("IMG", 'g'),'"IMG"');

                data=data.replace(new RegExp("TOF", 'g'),'"TOF"');

                data=data.replace(new RegExp("ALINK", 'g'),'"ALINK"');

                data=data.replace(new RegExp("PAGE", 'g'),'"PAGE"');

        
                console.log(data);
            
                let parsedJSON = JSON.parse(data);

                console.log(parsedJSON);
        
                lssave(parsedJSON);
            }   
        }
        
    });


});


