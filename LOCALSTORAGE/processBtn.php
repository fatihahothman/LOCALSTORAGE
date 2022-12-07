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