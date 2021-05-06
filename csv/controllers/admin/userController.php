<?php

	Flight::route('/admin/users',function(){

	    require 'config/config.php';
	    admin_session_check();

	    $userid = 0;
	    include 'views/includes/admin/header.php';
	    include 'views/includes/admin/sidebar.php';
	    include 'views/admin/userlist.php';
	    include 'views/includes/admin/footer.php';

	});

Flight::route('/admin/userlist',function(){

    require 'config/config.php';

    admin_session_check();
    $user   = $_SESSION['user'];
    $start  = $_REQUEST['length'];
    $skip   = $_REQUEST['start'];
    $search = $_REQUEST['search'];
    $current_user_id = $_SESSION['user']['id'];
    if ($search['value'] != '') {

        $db->where("a.user_name", '%' . $search['value'] . '%', 'like');
        $db->where("a.first_name", '%' . $search['value'] . '%', 'like');
        $db->where("a.email_id", '%' . $search['value'] . '%', 'like');
        $db->where("a.type", '%' . $search['value'] . '%', 'like');
    }

    $db->orderBy("a.id", "desc");
    $result = $db->withTotalCount()->where('a.id!='.$current_user_id)->get("users as a", array($skip, $start));  
    $total  = $db->totalCount;
    $data   = array();

    $i     = $skip;
    $count = 0;
    
    foreach($result as $item){
        $row = array();

        $count++;
        $row[]   = $count;
        $message = "'Do you want to delete '";
        $row[]   =   $item['user_name'];       
        $row[]   =   $item['first_name'];
        $row[]   =   $item['email_id'];
        $row[]   =   $item['type'];
        $row[]   = '
               <a  data-toggle="modal" title="View" data-target="#ViewuserdetailModal" onclick="viewuser('.$item['id'].')" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
               <a  data-target="#AddUser" data-toggle="modal" title="Edit" onclick="getuserdetail('.$item['id'].')" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
               <a id="deleteuser"  title="Delete" onclick="delete_user('.$item['id'].')" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>';
        $data[] = $row;
    }


    $output = array(
        "draw"              => $_REQUEST['draw'],
        "recordsTotal"      => $total,
        "recordsFiltered"   => $total,
        "data"              => $data,
    );

    echo json_encode($output);

});


Flight::route('/admin/createuser',function(){

    require 'config/config.php';
    admin_session_check();

    $today          = date("Y-m-d H:i:s");
    $userid         = $_POST['userid'];
    $email          = $_POST['email'];
    $username       = $_POST['uname'];
    $usertype       = $_POST['usertype'];
    $db->where('id', $userid);
    $user           = $db->getone("users");
    $respArray      = array();
    $userdetails    = 0;
    $usernamedata   = 0;
    if($usertype == "admin"){
    	$data['is_admin'] = 1;
    	$data['is_subscriber'] = 0;
    	$data['type']     = $usertype;
    }else if($usertype == "user"){
    	$data['is_admin'] = 0;
    	$data['is_subscriber'] = 1;
    	$data['type']     = $usertype;
    }
    if($userid > 0){

            $data['user_name'] = $_POST['uname'];
            $data['first_name'] = $_POST['name'];
            $data['email_id'] = $_POST['email'];

            if($user['user_name']!=$username || $user['email_id']!=$email){

                if($user['email_id']!=$email){
                    $db->where('email_id', $email);
                    $userdetails = $db->getone("users");    
                }

                if($user['user_name']!=$username){ 
                    $db->where('user_name',$username);
                    $usernamedata = $db->getone("users");
                }    

                    if($userdetails!=0){
                        $respArray['response'] = "wait";
                        $respArray['message']  = "Email-id Already exists";
                    }else{
                            if($usernamedata!=0){
                                $respArray['response'] = "wait";
                                $respArray['message']  = "Username Already exists";
                            }else{

                                    $db->where('id', $userid);
                                    $insert_id = $db->update('users', $data);
                                    if($insert_id){
                                                    $respArray['response'] = "success";
                                                    $respArray['message']  = "User details were Updated";
                                    }else{
                                                    $respArray['response'] = "error";
                                                    $respArray['message']  = "Failed to update user details";
                                    }
                            }
                    }            

            }else{
                    
                    $db->where('id', $userid);
                    $insert_id = $db->update('users', $data);
                    if($insert_id){
                                    $respArray['response'] = "success";
                                    $respArray['message']  = "User details were Updated";
                    }else{
                                    $respArray['response'] = "error";
                                    $respArray['message']  = "Failed to update user details";
                    }
            }

    }else{

            $db->where('email_id', $email);
            $userdetails = $db->getone("users");

            $db->where('user_name',$username);
            $usernamedata = $db->getone("users");

            if($userdetails){
                $respArray['response'] = "wait";
                $respArray['message']  = "Email-id Already exists";
            }else{
                    if($usernamedata){
                        $respArray['response'] = "wait";
                        $respArray['message']  = "Username Already exists";
                    }else{
                                $data['user_name'] = $_POST['uname'];
                                $data['first_name'] = $_POST['name'];
                                $data['email_id'] = $_POST['email'];
                                $data['password'] = md5($_POST['password']);
                                $data['created'] = $today;
                                
                                $insert_id = $db->insert('users', $data);
                                if($insert_id){
                                                $respArray['response'] = "success";
                                                $respArray['message']  = "User was created successfully";
                                }else{
                                                $respArray['response'] = "error";
                                                $respArray['message']  = "Failed to create the user";
                                }  
                    }    
            }
    }        

    

    
    echo json_encode($respArray);

});



Flight::route('/admin/getuserdetails/@id',function($id){

    require 'config/config.php';
    admin_session_check();
    $data = $db->where('a.id', $id)->getone("users as a");
    echo json_encode($data);

});

Flight::route('/admin/viewuser/@id',function($id){

    require 'config/config.php';
    admin_session_check();

});

Flight::route('/admin/deleteuser/@id',function($id){

    require 'config/config.php';
    admin_session_check();

    $respArray  = array();
    $data       = $db->where('a.id', $id)->delete("users as a");
    if($data){
                $respArray['response'] = "success";
                $respArray['message'] = "The user Was deleted";    
    }else{
                $respArray['response'] = "error";
                $respArray['message'] = "Failed to remove the user";
    }
    echo json_encode($respArray);
    // header('Location: ' . $base_url . 'admin/users');
    //         exit();
});

?>