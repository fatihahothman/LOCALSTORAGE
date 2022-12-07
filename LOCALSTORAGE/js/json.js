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
                console.log('Success:', BtnValue.SUBMITBUTTON);  //value of submitbutton if 1=save ,2=edit body data,3=edit main,4=submit empty form for main of body 
                
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

                else if(BtnValue.SUBMITBUTTON==2){  //submitbutton==2 ,edit existing local storage (body data)

                    let storage = new Array();

                    storage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) : [] //get item from local storage maindata
                    
        
                    if (storage) { 
                        
                        for (let i = 0; i < storage.length ; i++) { //loop thru local storage
                            let dataArray = storage[i];//declaring dataArray to access key in local storage
                            
                            if(i==page-1){  //if storage index equal to page-1
                                for (let i = 0; i < dataArray.BODY.length; i++) {  //loop thru body length of storage
        
                                    if(i==BtnValue.EDITROW){  //if value of index body equal to value of editrow

                                        dataArray.BODY[i]=data;  //body data equal to new data submitted thru edit button
        
                                    }
        
                                }
                               
                            }
        
                        }
                        localStorage.setItem("maindata", JSON.stringify(storage)); //set maindata in local storage
                       location.reload();   //reload page
                       document.getElementById("EditStorage").contentWindow.location.reload(true); //reload element
                      // document.getElementById("showData").click();
                      
                    }
                }
                else if(BtnValue.SUBMITBUTTON==3){   //edit main data (page 1)
                    let storage = new Array();

                    storage = JSON.parse(localStorage.getItem("maindata")) ? JSON.parse(localStorage.getItem("maindata")) : [] //get item from local storage maindata
                    
        
                    if (storage) { 
                        
                        for (let i = 0; i < storage.length ; i++) { //loop thru local storage 

                            let dataArray = storage[i];

                            if(i==BtnValue.EDITROW){  //if storage index equal value of editrow btn

                                let dataMainData = JSON.parse(data);  //parse data submitted from edit form

                                //set value one by one so it will not change entire existing data(body)-main data has no body

                                    if (!isNaN(dataMainData.ANCHOR)) // check if anchor a number or not
                                    {
                                        dataArray.ANCHOR=dataMainData.ANCHOR;       
                                        dataArray.TOC=dataMainData.ANCHOR;
                                    }
                                    else{     //if not number then-TOF-figure
                                        dataArray.ANCHOR=dataMainData.ANCHOR;
                                        dataArray.TOF=dataMainData.ANCHOR;
                                    }


                                    dataArray.BIGTITLE=dataMainData.BIGTITLE;

                                    dataArray.TITLE=dataMainData.TITLE;
                                  
                                //   dataArray.BODY=dataMainData.BODY;
                                    dataArray.IMG=dataMainData.IMG;

                                    if( dataArray.FIG_TITLE !==undefined){
                                        dataArray.FIG_TITLE=dataMainData.FIG_TITLE;
                                    }

                                    dataArray.ALINK=dataMainData.ALINK;
                                  
                                    if(page>1){
                                     
                                        dataArray.BODY=dataMainData.BODY;
                                    }
                                

                               // storage[i]=data;  //body data equal to new data submitted thru edit button-it change entire
       
                            }
        
                        }
                        localStorage.setItem("maindata", JSON.stringify(storage)); //set maindata in local storage
                        location.reload();   //reload page
                        document.getElementById("EditStorage").contentWindow.location.reload(true); //reload element
                        // document.getElementById("showData").click();
                      
                    }
                }
                
                else{  //BtnValue.SUBMITBUTTON==4       utk submit empty form bila save page
                   
                        var docdata = JSON.parse(localStorage.getItem("pagedata")) ? JSON.parse(localStorage.getItem("pagedata")) : [];

                        console.log(docdata);   //print data in localstorage 
                        
                        docdata.shift(docdata);  //remove data at index 0-it is an empty array (pagedata)

                        docdata.unshift(data);   //unshift data submitted to index 0-empty form so all data will be in the body[]-savePageinBody()
                        
                        localStorage.setItem('pagedata', JSON.stringify(docdata));  //  sets the value of the "data" Object item.Save Data to Local Storage. 

                        savePageinBody();
                  
                        // location.reload();
       
                }
                

            })
            
    
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