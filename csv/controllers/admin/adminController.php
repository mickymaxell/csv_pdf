<?php
Flight::route('/', function() {
        require 'config/config.php';
    admin_logged_check();
    
    include 'views/includes/header.php';
    include 'views/admin/login.php';
    include 'views/includes/footer.php';
});


Flight::route('/admin', function() {
    
    require 'config/config.php';
    admin_logged_check();
    
    include 'views/includes/header.php';
    include 'views/admin/login.php';
    include 'views/includes/footer.php';
});

Flight::route('/logout', function() {
    require 'config/config.php';

    session_destroy();
    header('Location: ' . $base_url);
    exit();
});




Flight::route('/admin/changepsw', function() {
    require 'config/config.php';
    admin_session_check();
    $password   = $_POST['password'];
    $respArray  = array();
    $user       = $_SESSION['user'];

    if($password!=FALSE){
        $data = array(
            'password'=>md5($password)
        );
        $db->where('id', $user['id']);
        $update =  $db->update('users',$data);
        
        if($update!=0){
            unset($_SESSION['user']);
            $respArray['response'] = "success";
            $respArray['message']  = " Password Updated Please Login to Continue";

        }else{
            $respArray['response'] = "error";
            $respArray['message']  = "Upation Failed";
        }

    }else{
        $respArray['response'] = "error";
        $respArray['message']  = "Please enter Password";
    }
    echo json_encode($respArray);
});

Flight::route('/loginaction', function() {
    require 'config/config.php';

    $email_id  = $_POST['email'];
    $password  = $_POST['password'];
    $respArray = array();
    if($email_id == FALSE || $password == FALSE ){
        $respArray['response'] = "Login Failed";
        $respArray['message']  = "Username or Passwor Missing";
    }else{

        $db->where("email_id", $_REQUEST['email']);
        // $db->where("password", md5($_REQUEST['password']));
        $user = $db->getOne("users");


        if($user!=0){
            if ($user['email_id'] == $_REQUEST['email'] && $user['password'] == md5($_REQUEST['password'])) {

                if(($user['is_admin'] == 1) && ($user['type'] == 'admin')){
                    $_SESSION['user'] = $user;

                    // header('Location: ' . $base_url . 'dashboard');
              //       exit();
                    $respArray['response'] = "Verified";
                    $respArray['message']  = "Logging in..";
                    $respArray['data']     = $user['is_admin']?"admin":"user";
                }else{
                    $respArray['response'] = "Login Failed";
                    $respArray['message']  = "Permission Denied";
                }    

            }else{

                $respArray['response'] = "Login Failed";
                $respArray['message']  = "Password Incorrect";
            }
        }    
        else {
                // header('Location: ' . $base_url . '?status=invalid');
                // exit();
                $respArray['response'] = "Login Failed";
                $respArray['message']  = "Username  Incorrect";
            }
    }
    echo json_encode($respArray);

});



Flight::route('/admin/dashboard', function() {
    require 'config/config.php';
    admin_session_check();

    include 'views/includes/admin/header.php';
    include 'views/includes/admin/sidebar.php';
    include 'views/admin/dashboard.php';
    include 'views/includes/admin/footer.php';
});



Flight::route('/admin/avatarchange',function(){

    require 'config/config.php';
    admin_session_check();

    if(isset($_FILES['avatarfile']['name'])){

        $user       = $_SESSION['user'];
        $image_name = $user['user_name'];
        $image_name = explode(' ',$image_name);
        $image_name = strtolower($image_name[0]);
        $id         = $user['id'];

        $target_dir  = 'uploads/admin/';
        $target_file = $target_dir . basename($image_name);
       // $respArray = array();
        if (isset($_FILES['avatarfile'])) {
            
                        $temp = explode(".", $_FILES["avatarfile"]["name"]);
                        $newfilename = $image_name . '.' . end($temp);
                        $target_file = $target_dir . $newfilename;
                        move_uploaded_file($_FILES["avatarfile"]["tmp_name"], $target_file);        
                        $data['avatar'] = $newfilename;
                        $data['updated'] = date("d-m-Y  H:i:s");

                        if($id > 0){
                            // $db->where('id', $id);
                            // $insert_id = $db->update('users',$data);
                            $insert_id = $db->rawQuery("UPDATE users SET avatar='".$newfilename."' WHERE id=".$id);
                                $_SESSION['user']['avatar'] = $newfilename;
                                Flight::redirect('/admin/dashboard');
                        }else{
                           Flight::redirect('/admin/dashboard');
                        }
        }else{
                   Flight::redirect('/admin/dashboard'); 
        }
    }
});








    Flight::route('/user',function(){

        require 'config/config.php';
        club_logged_check();
        
        include 'views/includes/header.php';
        include 'views/clubs/login.php';
        include 'views/includes/footer.php';
    });

    Flight::route('/clubusers/loginaction',function(){

        require 'config/config.php';

        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $respArray = array();

        if($username == FALSE || $password == FALSE ){
            $respArray['response'] = "Login Failed";
            $respArray['message']  = "Username or Password Missing";
        }else{
            $clubuser_data = $db->where('user_name',$username)->getone('club_users');
            if($clubuser_data){
                if(($clubuser_data['user_name'] == $username) && ($clubuser_data['password'] == md5($password))){
                    $_SESSION['club_user'] = $clubuser_data;
                    $respArray['response'] = "Verified";
                    $respArray['message']  = 'Logging in...';
                }else{
                    $respArray['response'] = "Login Failed";
                    $respArray['message']  = 'Incorrect Password';
                }
            }else{
                $respArray['response'] = "Login Failed";
                $respArray['message']  = "User Account not found";
            }
        }

        echo json_encode($respArray);

    });

    Flight::route('/clubusers/dashboard',function(){

        require 'config/config.php';

        include 'views/includes/clubs/header.php';
        include 'views/includes/clubs/sidebar.php';
        include 'views/clubs/dashboard.php';
        include 'views/includes/clubs/footer.php';

    });

    Flight::route('/clubusers/password_change',function(){

        require 'config/config.php';
        club_user_session_check();

        $password   = $_REQUEST['clubusers_new_psw'];
        $respArray  = array();
        $user       = $_SESSION['club_user'];

        if($password!=FALSE){
            $data = array(
                'password'=>md5($password)
            );
            $db->where('id', $user['id']);
            $update =  $db->update('club_users',$data);
            
            if($update!=0){
                unset($_SESSION['club_user']);
                $respArray['response'] = "success";
                $respArray['message']  = " Password Updated Please Login to Continue";

            }else{
                $respArray['response'] = "error";
                $respArray['message']  = "Upation Failed";
            }

        }else{
            $respArray['response'] = "error";
            $respArray['message']  = "Please enter Password";
        }
        echo json_encode($respArray);

    });

    Flight::route('/clubusers/avatarchange',function(){

        require 'config/config.php';
        club_user_session_check();

        if(isset($_FILES['avatarfile']['name'])){

            $user       = $_SESSION['club_user'];
            $image_name = $user['user_name'];
            $image_name = explode(' ',$image_name);
            $image_name = strtolower($image_name[0]);
            $id         = $user['id'];

            $target_dir  = 'uploads/clubusers/';
            $target_file = $target_dir . basename($image_name);
           // $respArray = array();
            if (isset($_FILES['avatarfile'])) {
                
                            $temp = explode(".", $_FILES["avatarfile"]["name"]);
                            $current_timestamp = strtotime(date('d-m-Y H:i:s'));
                            $newfilename = $image_name .'-'.$current_timestamp. '.' . end($temp);
                            $target_file = $target_dir . $newfilename;
                            move_uploaded_file($_FILES["avatarfile"]["tmp_name"], $target_file);        
                            $data['image'] = $newfilename;

                            if($id > 0){
                                $insert_id = $db->rawQuery("UPDATE club_users SET image='".$newfilename."' WHERE id=".$id);
                                    $_SESSION['club_user']['image'] = $newfilename;
                                    Flight::redirect('/clubusers/dashboard');
                            }else{
                               Flight::redirect('/clubusers/dashboard');
                            }
            }else{
                       Flight::redirect('/clubusers/dashboard'); 
            }
        }
    });






?>