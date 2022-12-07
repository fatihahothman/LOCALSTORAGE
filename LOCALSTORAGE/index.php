<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>Edit Form</title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="YH5NIp1UtyJcMxrrEOwMB3ncsv8UukepUFpUWTO_7yE" />
    <meta name="google-signin-client_id"
        content="538208214824-jg7c1u15he6c9biboek9foog19ntbo4c.apps.googleusercontent.com">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&family=Roboto:ital,wght@0,400;1,300;1,400&display=swap"
        rel="stylesheet">

    <!-- fontawesome cdn -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://kit.fontawesome.com/a98a5ccfd5.js" crossorigin="anonymous"></script>


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <!--Datatables is a JQuery plugin that supports basic data table functionalities

       such as sorting, searching, and paging without any configurations-->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



    <!-- Bootstrap Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>

   

    <!-- CSS -->

    <link rel="stylesheet" href="css/editForm.css" />

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Slide<strong>Maker</strong></a> <a class="navbar-brand dimmed"
                href="webbook/1029711610510497104111116104109971105552641031099710510846991111092430">Web<strong>Book</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item nav-link nav-name" style="color: #0498fc;">
                        Logged in as nurfatihah othman
                    </li>
                    <li class="nav-item nav-status">
                        <a class="nav-link" href='login.php?logout=1'>Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <main class="login-form">
        <div class="container-fluid">
            <div class="row">

            <!-- load data from pagedata local storage -->
                <div class="col-lg-6 mb-4">
                    <div class="card" id="loadPgData">
                        <div class="card-header" style="font-weight: bold;">Section</div>
                        <div class="card-body">

                            <div class="custom-file">

                             <!-- button to pageList.html -->
                                <button class="btn btn-success pagelist" onclick="window.location.href='pageList.html'"
                                    style="width:140px;" id="pagelist">
                                    Section List
                                </button>

                                 <!-- button for add new page -->
                                <button class="btn btn-primary newpage" onclick="window.location.href='index.php'"
                                    style="width:140px;" id="addnewpage">
                                    <img src="images/add.png" alt="add" style="width:25px; height:25px;">
                                    New 
                                </button>

                            </div>


                            <div class="table-responsive " id="accordion">

                                <table class="table table-bordered table-hover" id="loaddata">
                                    <thead>
                                        <tr>
                                            <th scope="col-10">Section</th>
                                            <th scope="col-2" style="text-align:center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody id="pgData">


                                    </tbody>

                                </table>

                                 <!-- button for save page-save data into body -->
                                <button class="btn btn-success float-end save-page" onclick="savePage(event)"
                                    style="width:140px;" id="save-page">
                                    Save Section
                                </button>

                            </div>

                        </div>
                    </div>
                        <!-- load data from pagedata local storage end -->
                    <br><br>

                     <!-- display local storage data in form of anchor,title and body only -->

                    <div class="card" id="showDataRow">
                        <div class="card-header" style="font-weight: bold;">Edit Section</div>
                        <div class="card-body">

                            <div class="table-responsive" id="accordion">

                                <table class="table table-bordered table-hover" id="showDataRows">
                                    <thead>
                                        <tr>

                                            <th scope="col-10">Section</th>
                                            <th scope="col-2" style="text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showDataRows">


                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>

                    <!-- display local storage data in form of anchor,title and body only end -->
                    <br><br>

                     <!-- display local storage by page in JSON format-->
                    <div class="card" id="showPage">
                        <div class="card-header" style="font-weight: bold;">Full Section</div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table id="showPg">
                                    <thead>
                                        <tr>

                                            <!-- <th scope="col">Page Data</th>
                                            <th scope="col" style="text-align:end">Action</th> -->

                                        </tr>
                                    </thead>
                                    <tbody id="showPages">


                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>




                </div>


                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->


                <br><br>

                <!-- <div class="col"> -->
                <!-- <div class="container"> -->
                <!-- <div class="row"> -->
                <div class="col-lg-6 mb-4 ">
                    <div class="card editForm">
                        <div class="card-header" style="font-weight: bold;">Edit Form</div>

                        <div class="card-body">
                            <div class=" rounded d-flex align-items-stretch" id="form">

                                <div class="contact-form">

                                    <!-- start form -->
                                    <form method="POST" id="editForm" action="" onsubmit="submitForm(event,page)"
                                        enctype="multipart/form-data">
                                        <!-- enctype for uplaoding image -->
                                        <!-- enctype='multipart/form-data is an encoding type that allows files to be sent through a POST. -->

                                        <div class="form-group pt-lg-2 pt-3">

                                            <label for="anchor">Content Number</label> <!-- anchor  -->

                                            <input type="text" name="ANCHOR" id="ANCHOR" class="form-control">

                                        </div>

                                        <div class="form-group pt-lg-2 pt-3" id="BigTitle">

                                            <label for="bigtitle">Heading Title</label> <!-- big title  -->

                                            <input type="text" name="bigtitle" id="BIGTITLE" class="form-control">

                                        </div>

                                        <div class="form-group pt-3">

                                            <label for="title">Title</label> <!-- title  -->

                                            <input type="text" name="title" id="TITLE" class="form-control">

                                        </div>



                                        <div class="input_fields_wrap">

                                            <!--  *****************************************    PARAGRAPH (id:para)  ************************************************* -->

                                            <div class="form-group pt-3" id="para" style="">

                                                <label id="labelpara" for="body">Paragraph&nbsp;<span name="CountPara"
                                                        id="ParaCount1">1</span></label>
                                                <!-- body[] - array  -->

                                                <textarea name="body[]" id="BODY" class="form-control"></textarea><br>

                                            </div>

                                        </div>
                                        <!--  *****************************************      PARAGRAPH END   ************************************************* -->


                                        <!--  ************************************* ADD PARAGRAPH +  BUTTON (button id:addpara) ***************************************** -->

                                        <span>
                                            <a id="addpara" type="button" class="btn btn-primary float-end"
                                                style="font-size:14px;font-weight:normal;">
                                                <img src="images/add.png" alt="add"
                                                    style="width:25px; height:25px;">&nbsp;Add paragraph
                                            </a>

                                        </span>&nbsp;&nbsp;&nbsp;

                                        <!--  ************************************* ADD PARAGRAPH +  BUTTON END ************************************************* -->



                                        <!-- Upload image input-->

                                        <div class="form-group pt-3">

                                            <label for="img">Image</label> <!-- img  -->
                                            <!-- onchange="readURL(this);" : function for image preview  -->
                                            <input id="upload" type="file" onchange="readURL(this);"
                                                class="form-control border-0 text-muted" name="img">

                                        </div>
                                        <br>

                                        <!-- Uploaded image area  -image preview box -->
                                        <div class="image-area"><img id="imageResult" src="#" alt=""
                                                class="img-fluid rounded shadow-sm mx-auto d-block"></div>

                                        <div class="form-group pt-3">

                                            <label for="figtitle">Figure Title</label> <!-- alink  -->

                                            <input type="text" name="fig_title" class="form-control" id="FIG_TITLE">


                                        </div>

                                        <div class="form-group pt-3">

                                            <label for="alink">Alink</label> <!-- alink  -->

                                            <input type="text" name="alink" class="form-control" id="ALINK">

                                            <!-- submitbutton for processing form in processNote.php -->
                                            <input type="text" hidden name="submitbutton" id="submitbutton" value="1"
                                                class="form-control">
                                            <!-- editrow button for return value of index of data to be edited -->
                                            <input type="text" hidden name="editRow" id="editRow" value=""
                                                class="form-control">

                                        </div>



                                        <div
                                            class="d-flex align-items-center flex-wrap justify-content-between  mt-lg-4 mt-5">
                                            <!-- cancel button  -->
                                            <div class="btn btn-danger" style="width:140px;font-size:normal;" onclick="window.location.href='index.php'">

                                                Cancel

                                            </div>

                                            <input type="reset" value="Reset" id="resetForm" hidden>
                                            <!-- reset form button  -->
                                            <!-- submit button  -->

                                            <button class="btn btn-success " type="submit" name="submit" id="save"
                                                style="width:140px;font-size:normal;">
                                                Save
                                            </button>

                                            <!-- edit button  -->

                                            <button class="btn btn-success " type="submit" name="edit" id="editBtn"
                                                style="width:140px;font-size:normal;display:none;">
                                                Edit
                                            </button>


                                        </div>

                                    </form>
                                    <!-- end form -->
                                </div>

                            </div>

                        </div>

                        <!-- form div -->

                    </div>

                </div>
            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->
        </div>

        </div>

    </main>
   
    <script>
        /*  ==========================================

            SHOW UPLOADED IMAGE

        * ========================================== */

        function readURL(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();



                reader.onload = function (e) {

                    $('#imageResult') //id of image preview box

                        .attr('src', e.target.result);

                };

                reader.readAsDataURL(input.files[0]);

            }

        }



        $(function () {

            $('#upload').on('change', function () {

                readURL(input);

            });

        });



        /*  ==========================================

        SHOW UPLOADED IMAGE NAME

        * ========================================== */

        var input = document.getElementById('upload');

        var infoArea = document.getElementById('upload-label');



        input.addEventListener('change', showFileName);



        function showFileName(event) {

            var input = event.srcElement;

            var fileName = input.files[0].name;

            infoArea.textContent = 'File name: ' + fileName;

        }

          /*  ==========================================

                    DISABLED INPUT TITLE
        * ========================================== */

        var one = document.getElementById('BIGTITLE');
        var two = document.getElementById('TITLE');

        //checks instantly 
        var checker = setInterval(function() {
            if(two.value !== '') {
            one.disabled = true;
            } else {
            //when its clear, it enabled again
            one.disabled = false;
            }
            if(one.value !== '') {
            two.disabled = true
            } else {
            two.disabled = false;
            }
        }, 30);


        /*  ==========================================

            ADDING PARAGRAPH AFTER + BUTTON CLICKED

        * ========================================== */

        $(document).ready(function () {

            var max_fields = 100; //maximum input boxes allowed

            var wrapper = $(".input_fields_wrap"); //Fields wrapper-> input_fields_wrap

            var add_button = $(".addpara"); //ADD PARAGRAPH +  BUTTON 


            var x = 1; //initlal text box count

            $(addpara).click(function (e) { //on add input button click

                e.preventDefault(); // Prevent the button from submitting.

                if (x < max_fields) { //max input box allowed

                    x++; //text box increment

                    $(wrapper).append(

                        '<div class="form-group pt-3" id="para" style=""><label id="labelpara' + x +
                        '" for="body">Paragraph&nbsp;<span>' +
                        x +
                        '</span></label><textarea name="body[]" id="BODY' + x +
                        '" class="form-control"></textarea><br><div class="input-group-append"><button hidden class="btn btn-outline-danger" id="remove_field" type="button">Remove</button></div></div>'

                    ); //append new text area paragraph when user clicked ADD PARAGRAPH +  BUTTON in div with class=input_fields_wrap
                    // x is used for incrementing paragraph number 

                }


            });


            $(wrapper).on("click", "#remove_field", function (e) { //remove paragraph input field
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                x--;
            })

        });


        /*  ==============================================

                    DISPLAY LOCAL STORAGE DATA 
        * ================================================= */

        $(document).ready(function () {
            loadData();
        });

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


        /*  ==============================================

                     DELETE LOCAL STORAGE
         * ================================================= */
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
    </script>

    <script>
        /*  ==========================================================
                        save data into body array
        * ============================================================= */

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
                //    setTimeout(()=>{
                //        savePageinBody();
                //     },4);
                    
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


         /*  ==========================================================
                        save data into body array
        * ============================================================= */

        function savePageinBody(){

          //  document.getElementById("save-page").click();
           
            $("#pgData").html(""); //clear localstorage container
            let storage = new Array();
            //get maindata in local storage
            storage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) : [];

            //storing page number of section 
            counter = JSON.parse(localStorage.getItem("counterPage")) ? JSON.parse(localStorage.getItem("counterPage")) : [];

            counter = storage.length +1; //counter equal to storage length + 1 ,if there is 1 data in maindata then counter=1
           

            if (storage) {

                let pageStorage = new Array();
                pageStorage = JSON.parse(localStorage.getItem("pagedata")) ? JSON.parse(localStorage.getItem("pagedata")) : []; //get pagedata in local storage
                temp = []; //declare array
           
                

                console.log( pageStorage.length);

                for (let i = 1; i < pageStorage.length; i++) { //loop thru local storage
                    var dataArray = pageStorage[i]; //declaring dataArray to access key in local storage
                        console.log(pageStorage[i]);
                  
                   
                   temp.push(pageStorage[i]); //push into array temp[]
                    //push pageStorage data start at index 1 into temp[] array 
                }
               
                i = 0;
                pageStorage = JSON.parse(pageStorage[i]);

                pageStorage.PAGE = counter; //page number

                pageStorage.BODY = temp; //set array BODY[] to temp[]-set temp[] as body of data index 0

               storage.push(pageStorage); //push pageStorage from pagedata to maindata localstorage


            }
           

            localStorage.setItem('counterPage', JSON.stringify(counter)); //save new page number to localStorage

            localStorage.setItem('maindata', JSON.stringify(storage)); //  save maindata to local storage

            localStorage.removeItem('pagedata'); //delete pagedata local storage after push to maindata

            location.reload();

        }

        function savePageMain(){
            // location.reload();
            $("#pgData").html(""); //clear localstorage container
            let storage = new Array();
            //get maindata in local storage
            storage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) : [];

            //storing page number of section 
            counter = JSON.parse(localStorage.getItem("counterPage")) ? JSON.parse(localStorage.getItem("counterPage")) : [];

            if (storage) {

                let pageStorage = new Array();
                pageStorage = JSON.parse(localStorage.getItem("pagedata")) ? JSON.parse(localStorage.getItem("pagedata")) : []; //get pagedata in local storage
                temp = []; //declare array
           
                counter = storage.length +1; //counter equal to storage length + 1 ,if there is 1 data in maindata then counter=1

                console.log( pageStorage.length);

                for (let i = 2; i < pageStorage.length; i++) { //loop thru local storage
                    var dataArray = pageStorage[i]; //declaring dataArray to access key in local storage
                        console.log(pageStorage[i]);
                  
                   
                   temp.push(pageStorage[i]); //push into array temp[]
                    //push pageStorage data start at index 2 into temp[] array 
                }
               
                i = 1;
                pageStorage = JSON.parse(pageStorage[i]);

                pageStorage.PAGE = counter; //page number

                pageStorage.BODY = temp; //set array BODY[] to temp[]-set temp[] as body of data index 1

                storage.push(pageStorage); //push pageStorage from pagedata to maindata localstorage


            }
           

            localStorage.setItem('counterPage', JSON.stringify(counter)); //save new page number to localStorage

            localStorage.setItem('maindata', JSON.stringify(storage)); //  save maindata to local storage

            localStorage.removeItem('pagedata'); //delete pagedata local storage after push to maindata

            loadData(); //call loadData() to display local storage data of pagedata

            location.reload();
        }


        /*  ==========================================================
                       show full page of data in JSON format
        * ============================================================= */

        function showFullPage() {
            $("#showPg").html(""); //emptying #localstorage container so no repeated data is displayed showDataRow
            i = page - 1; //get page number--- page 1 =index 0 so i=page-1

            let storage = new Array();

            storage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) :[] //get item from local storage
            //get maindata that matched index of page-1
            storage[i] = JSON.stringify(storage[i], null, '<br><br>'); //replace null with line break 

            result = storage[i].replace(/\\/g,''); //g - Global replace. Replace all instances of the matched string in the provided text.

            $($("#showPg")).append(`<tr>
                    <td class="col-10 PageData">${ result}</td>
                    </tr>`);

            showDatabyRow();

        }




        /*==========================================================
                    display data of page by row -separated
        * ============================================================= */

        function showDatabyRow() {
            // $("#showDataRow").html(""); //emptying #localstorage container so no repeated data is displayed 
            // document.getElementById("save-edit").childNodes[0].nodeValue="Edit";  //change save button to edit button

            let myStorage = new Array();

            myStorage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) :[] //get item from local storage

            let storage=myStorage;

            let tempStorage =new Array(); //create tempdata local storage for saving body of maindata so that it can be accessed by key

            tempStorage = JSON.parse(localStorage.getItem("tempdata")) ? JSON.parse(localStorage.getItem("tempdata")) :[];


            if (storage) {
                for (let i = 0; i < storage.length; i++) { //loop thru local storage
                    let dataArray = storage[i]; //declaring dataArray to access key in local storage

                    if (i == page - 1) { //if i equal to value(index of page)

                        if (dataArray.BIGTITLE !== "" ) { //check if bigtitle not empty then display title as big title
                            title = dataArray.BIGTITLE;
                        } else if (dataArray.TITLE !=="") { //if bigtitle empty then it will take title as title (for sub)
                            title = dataArray.TITLE;
                        } else {
                            title = dataArray.FIG_TITLE; //else figtitle for figure
                        }

                        if(dataArray.BIGTITLE == undefined){
                            if(dataArray.TITLE !==""){
                                title = dataArray.TITLE;
                            }else{
                                title = "";
                            }
                        }

                        if (dataArray.FIG_TITLE!=="" && dataArray.FIG_TITLE!==undefined) { //if anchor is not a number
                            title = dataArray.FIG_TITLE;
                        }  

                        if (dataArray.ANCHOR !== "") {
                            anchorTitle = dataArray.ANCHOR + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + title;
                        } else {
                            anchorTitle = title;
                        }

                        if (dataArray.ANCHOR == "" && dataArray.BIGTITLE =="" && dataArray.TITLE ==""){
                            anchorTitle="";
                        }

                        if (dataArray.BODY !== "") {
                            body1 = dataArray.BODY;
                             //   console.log(body1.join('\r\n'));
                            body2=body1.join('<br><br>');

                        }

                        body2.toString();  //convert to string
                        
                        body=body2.includes("{"); //check if body has {anchor:"",.......body:[""]....} or just directly body 1:......,2:.....,3:........        

                        if(body){
                            body2="";
                        }
                        // //hide main if empty
                    
                     if (body2!== "") {

                            $("#showDataRows").append(`<tr>
                            <td class="col-10 ">${anchorTitle}<br>${body2}</td>
                            <td class="col-2 " style="text-align:center" onclick="FetchMainData(${i});"><i class="far fa-edit"  style="font-size:20px;color:blue;">&nbsp;&nbsp;</i></td>
                            </tr>`);

                     }else if(anchorTitle !==""){

                            $("#showDataRows").append(`<tr>
                                <td class="col-10 ">${anchorTitle}</td>
                                <td class="col-2 " style="text-align:center" onclick="FetchMainData(${i});"><i class="far fa-edit"  style="font-size:20px;color:blue;">&nbsp;&nbsp;</i></td>
                                </tr>`);
                     }

                     

                      if(body==true){  //body has {anchor:"",.......body:[""]....}-kalau body directly body :[] takyah buat ni satgi jadi undefined
                            temp = []; //temp array

                            for (let i = 0; i < dataArray.BODY.length; i++) {

                                tempStorage.push(dataArray.BODY[i]); //push pageStorage body in tempstorage local storage

                            }

                            localStorage.setItem('tempdata', JSON.stringify(tempStorage)); //save to tempstorage local storage
                            window.localStorage.removeItem('tempdata'); //delete tempdata from local storage

                            if (tempStorage) {
                                for (let i = 0; i < tempStorage.length; i++) { //loop thru tempstorage length

                                    let tempArray = JSON.parse(tempStorage[i]); //declaring dataArray to access key in local storage

                                    
                                    if (tempArray.BIGTITLE !== undefined) { //check if bigtitle is not undefined
                                        title = tempArray.BIGTITLE;
                                    } else { //if bigtitle undefined then it will take title as title (for addsub)
                                        title = tempArray.TITLE;
                                    } 

                                    if (tempArray.FIG_TITLE!=="" ) { //if anchor is not a number
                                        title = tempArray.FIG_TITLE;
                                    } 

                                    if(tempArray.BIGTITLE == undefined){
                                        if(tempArray.TITLE !==""){
                                            title = tempArray.TITLE;
                                        }else{
                                            title = "";
                                        }
                                    }

                                    if (tempArray.ANCHOR !== "") {
                                        anchorTitle = tempArray.ANCHOR + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + title;
                                    } else {
                                        anchorTitle = title;
                                    }

                                    if (tempArray.BODY !== "" && tempArray.BODY.length>1) {
                                        body1 = tempArray.BODY;
                                    //   console.log(body1.join('\r\n'));
                                        body2=body1.join('<br><br>');

                                    }else{
                                        body2 = tempArray.BODY;
                                    }

                                    $("#showDataRows").append(`<tr>
                                    <td class="col-10 ">${anchorTitle}<br>${body2}</td>
                                    <td class="col-2 " style="text-align:center" onclick="FetchData(${i});"><i class="far fa-edit"  style="font-size:20px;color:blue;">&nbsp;&nbsp;</i></td>
                                    </tr>`);


                                }
                            //
                            }

                      }

                       
                    }
                }

            }

        }



        /*==========================================================
                   fetch maindata to form to be edited
        * ============================================================= */

        function FetchMainData(value) {
            console.log(value);
            document.getElementById("resetForm").click(); //reset form


            // document.getElementById("save-edit").childNodes[0].nodeValue="Edit";  //change save button to edit button

            document.getElementById("save").style.display = "none"; //hide save button
            document.getElementById("editBtn").style.display = "block"; //display edit button
            document.getElementById("submitbutton").value = "3"; //set submitbutton to 3 (use in json.js)
            document.getElementById("editRow").value = value; //editrow button value to index of data  (use in json.js)

            Paracounter = JSON.parse(localStorage.getItem("counterPara")) ? JSON.parse(localStorage.getItem("counterPara")) : []; //save paragraph counter
            //paracounter save total of paragraph container which is equal to body length of current data
            //it is used for removing paragraph container that has been added to back the form to default state [only one paragraph ] everytime before value is fetched to form 


            if (Paracounter) {
                console.log(Paracounter);

                for (let i = 1; i < Paracounter; i++) { //based on current counterPara value in LS

                    document.getElementById("remove_field").click(); //click button to remove paragraph that has been added

                }
            }


            let storage = new Array();

            storage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) :
            [] //get item from local storage

            if (storage) {
                for (let i = 0; i < storage.length; i++) { //loop thru local storage
                    let dataArray = storage[i]; //declaring dataArray to access key in local storag


                    if (i == value) { //fetch data to editform

                        if (dataArray.IMG !== "") { //if img not empty
                            // document.getElementById('upload').value = tempArray.IMG;
                            dataArray.IMG = "images/" + dataArray.IMG; //specify folder/directory
                            console.log(dataArray.IMG);
                            document.getElementById('imageResult').src = dataArray.IMG; //display image in image preview area
                        }

                        if(dataArray.BIGTITLE!==undefined){
                            document.getElementById('BIGTITLE').value = dataArray.BIGTITLE;
                        }
                        else{
                            document.getElementById('TITLE').value = dataArray.TITLE;
                        }

                        if(dataArray.BIGTITLE!==""){
                            document.getElementById('BIGTITLE').value = dataArray.BIGTITLE;
                        }
                        else{
                            document.getElementById('TITLE').value = dataArray.TITLE;
                        }

                        if(dataArray.BIGTITLE==undefined){
                            document.getElementById('BIGTITLE').value = "";
                        }


                        document.getElementById('ANCHOR').value = dataArray.ANCHOR;

                        if(dataArray.BODY ==""){
                            document.getElementById('BODY').value = "";
                        }else{
                            document.getElementById('BODY').value = dataArray.BODY[0];
                        }

                        if(dataArray.FIG_TITLE !==undefined){
                            document.getElementById('FIG_TITLE').value = dataArray.FIG_TITLE;

                        }
                        else{
                            document.getElementById('FIG_TITLE').value = "";
                        }

                        test=dataArray.BODY.toString();  //convert to string
                        
                        body=test.includes("{"); //check if body has {anchor:"",.......body:[""]....} or just directly body 1:,2:,3:     
                            
                        console.log(body);

                       
                        
                       
                        document.getElementById('ALINK').value = dataArray.ALINK;
                        // document.getElementById('IMG').value = dataArray.IMG;

                       if(body==false){
                            for (let i = 1; i < dataArray.BODY.length; i++) { //start from index 1

                                let xi = i + 1;
                                document.getElementById("addpara").click(); //add paragraph onclick 'addpara' button

                                document.getElementById('BODY' + xi).value = dataArray.BODY[i]; //display body data to their respected para container

                            }
                            
                      }else {
                        
                        document.getElementById('BODY').value = "";
                       // localStorage.setItem('counterPara', 1);
                      }

                    }

                    if(page >2){
                        Paracounter = dataArray.BODY.length; ////paracounter =current body length
                    }else{
                        Paracounter = 1;
                    }
                   
                    localStorage.setItem('counterPara', JSON.stringify(Paracounter)); //save paracounter


                }

            }
        }


        /*==========================================================
                   fetch data body to form to be edited
        * ============================================================= */

        function FetchData(value) {
            console.log(value);

            document.getElementById("resetForm").click(); //reset form

            document.getElementById("save").style.display = "none"; //hide save button
            document.getElementById("editBtn").style.display = "block"; //display edit button
            document.getElementById("submitbutton").value = "2"; //set submitbutton to 2 (use in json.js)
            document.getElementById("editRow").value = value; //editrow button value to index of data  (use in json.js)


            Paracounter = JSON.parse(localStorage.getItem("counterPara")) ? JSON.parse(localStorage.getItem("counterPara")) : []; //save paragraph counter
            //paracounter save total of paragraph container which is equal to body length of current data
            //it is used for removing paragraph container that has been added to back the form to default state [only one paragraph ] everytime before value is fetched to form 


            if (Paracounter) {
                console.log(Paracounter);

                for (let i = 1; i < Paracounter; i++) { //based on current counterPara value in LS

                    document.getElementById("remove_field").click(); //click button to remove paragraph that has been added

                }
            }

            let storage = new Array();

            storage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) :[] //get item from local storage

            let tempStorage = new Array();
            tempStorage = JSON.parse(localStorage.getItem("tempdata")) ? JSON.parse(localStorage.getItem("tempdata")) :[]; //get tempdata


            if (storage) {

                for (let i = 0; i < storage.length; i++) { //loop thru local storage
                    let dataArray = storage[i]; //declaring dataArray to access key in local storage

                    temp = [];  //declare array

                    if (i == page - 1) {
                        for (let i = 0; i < dataArray.BODY.length; i++) {

                            if (i == value) {

                                temp.push(dataArray.BODY[i]); //push data body to temp

                                tempStorage.push(temp); //push temp to tempstorage

                            }

                        }

                        localStorage.setItem('tempdata', JSON.stringify(tempStorage)); //save to tempdata local storage

                        window.localStorage.removeItem('tempdata'); //delete tempdata local storage

                        if (tempStorage) { //if theres data in local storage
                            for (let i = 0; i < tempStorage.length; i++) { //loop thru local storage

                                let tempArray = JSON.parse(tempStorage[i]); //declaring dataArray to access key in local storage

                                if (tempArray.IMG !== "") { //if img not empty

                                    // document.getElementById('upload').value = tempArray.IMG;
                                    tempArray.IMG = "images/" + tempArray.IMG; //specify folder/directory

                                    console.log(tempArray.IMG);

                                    document.getElementById('imageResult').src = tempArray.IMG; //display image in image preview area
                                }

                                //get value to display on form    
                                document.getElementById('ANCHOR').value = tempArray.ANCHOR;

                                if(tempArray.BIGTITLE!==undefined){

                                    document.getElementById('BIGTITLE').value = tempArray.BIGTITLE;
                                }
                                else{

                                    document.getElementById('TITLE').value = tempArray.TITLE;
                                }
                               
                                if(tempArray.FIG_TITLE!==undefined){
                                    document.getElementById('FIG_TITLE').value = tempArray.FIG_TITLE;

                                }
                                else{
                                    document.getElementById('FIG_TITLE').value = "";
                                }

                                document.getElementById('BODY').value = tempArray.BODY[i]; //body index 0

                                if(tempArray.BODY[i] == undefined){
                                    document.getElementById('BODY').value = "";
                                }

                              
                                document.getElementById('ALINK').value = tempArray.ALINK;

                                if (tempArray.BODY.length > 1) { //if body array length>1

                                    console.log(tempArray.BODY.length);

                                    for (let i = 1; i < tempArray.BODY.length; i++) { //start from index 1

                                        let xi = i + 1;
                                        document.getElementById("addpara").click(); //add paragraph onclick 'addpara' button

                                        document.getElementById('BODY' + xi).value = tempArray.BODY[i]; //display body data to their respected para container

                                    }
                                }
                                Paracounter = tempArray.BODY.length; ////paracounter =current body length

                                localStorage.setItem('counterPara', JSON.stringify(Paracounter)); //save paracounter

                            }

                        }


                    }

                }
            }

        }

        /*  ==========================================================
            // Read a page's GET URL variables and return them as a hash.
                    //get page number 
        * ============================================================= */

        function getUrlVars() {
            var vars = [], //declare as array
                hash;

            //The split( ) method is used for strings. It divides a string into substrings and returns them as an array

            // slice() method returns selected elements in an array, as a new array -> not changing original array

            //href="editForm.php?page='+ (i+1) +'"->http://localhost/MIAT/editForm.php?page=1

            //slice url start at ?

            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

            for (var i = 0; i < hashes.length; i++) {

                hash = hashes[i].split('=');
                
                vars.push(hash[0]);

                vars[hash[0]] = hash[1];
            }

            return vars;

        }
        //get page number from url
        var page = getUrlVars()["page"];

        // if no page detected in url then no page storage displayed
        if (page !== undefined) { //if page is detected in url
            // document.getElementById("loadPgData").style.display = "none"; //hide card for displaying page data
            showFullPage(); //call function to display full page storage of that particular page
        }

        console.log(page); //print page in console.log->page 


        let pgreload = window.performance.getEntriesByType("navigation")[0].type; //detect page reload

        console.log(pgreload);

        if (pgreload) { //if page reload true

            localStorage.removeItem('counterPara'); //delete counterPara in LS-reset

            //it has to be deleted everytime because FetchData(); 

            //counterpara will be used to remove paragraph container ,if current data has body length of 4 then the next current data has length of 1 ,then it should remove 3 para container
            
            //if page reload,then the form will be back to default-1para container only
            
            //then,if we fetch new current data,while in local storage counterpara value is 4 which it should remove 3 para container,it will return error of onclick button remove
           
            //because it cannot remove 3 para container when the form currently only have 1 container   
        }

        
    </script>

    <!-- <script src="js/txt.js"></script> -->
    
    <!-- json.js-> process form data into json => save into local storage -->

    <script src="js/json.js"></script>


</body>



</html>