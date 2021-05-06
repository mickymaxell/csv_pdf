<?php

    Flight::route('/admin/csv',function(){

        require 'config/config.php';
        admin_session_check();

        include 'views/includes/admin/header.php';
        include 'views/includes/admin/sidebar.php';
        include 'views/admin/csv.php';
        include 'views/includes/admin/footer.php';    

    });


Flight::route('/admin/uploadmediafiles',function(){

    require 'config/config.php';
    admin_session_check();


    $allowTypes = array('csv'); 
    $response = array( 
        'status' => 0, 
        'message' => 'Form submission failed, please try again.' 
    ); 
    
    $errMsg = ''; 
    $valid = 1; 
    $respArray = array();

        // Get the submitted form data 
    $filesArr = $_FILES["customFile"];
    // Check whether submitted data is not empty 
    if($valid == 1){ 
        $uploadStatus = 1; 
         
        $extension = pathinfo($_FILES['customFile']['name'], PATHINFO_EXTENSION);

        if(!empty($_FILES['customFile']['name']) && $extension == 'csv'){
            
            $csvFile = fopen($_FILES['customFile']['tmp_name'], 'r');
            fgetcsv($csvFile); 


            while(($csvData = fgetcsv($csvFile)) !== FALSE){
                  $csvData = array_map("utf8_encode", $csvData);

                  $dataLen = count($csvData);

                  if( !($dataLen == 5) ) continue;
                  
                  $field1 = trim($csvData[0]);
                  $field2 = trim($csvData[1]);
                  $field3 = trim($csvData[2]);
                  $field4 = trim($csvData[3]);
                  $field5 = trim($csvData[4]);

                  $csv_data = array(
                                        'field1' => $field1,
                                        'field2' => $field2,
                                        'field3' => $field3,
                                        'field4' => $field4,
                                        'field5' => $field5
                                    );
                
                $insert_id =   $db->insert('csv_data',$csv_data);  
            
                if($insert_id){
                    $respArray['response'] = "success";
                    $respArray['message']  = "Fields were added successfully";    
                }else{

                    $respArray['response'] = "Failed";
                    $respArray['message']  = "Fields were not added";
                }
            }      

        }else if($extension != 'csv'){
                $respArray['response'] = "Failed";
                $respArray['message']  = "Invalid File Format ,only csv accepted";
        }else{
                $respArray['response'] = "Failed";
                $respArray['message']  = "CSV File empty";
        }
    }    

    echo json_encode($respArray,true);

});

?>