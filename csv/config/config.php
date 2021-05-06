<?php 
session_start(); 
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

$base_url = "http://localhost/csv/";


      $db = new MysqliDb ('localhost', 'root', 'michael@123', 'csv');
	
	function session_check() {
		
	    $base_url = "http://localhost/csv/";
	    if (!isset($_SESSION['user'])) {
	        header('location: ' . $base_url . '');
	        exit();
	    }

	    if($_SESSION['user']['user_name']!=0){
			header('location: ' . $base_url . '');
	        exit();
		}
	}

	function admin_session_check(){

		$base_url = "http://localhost/csv/";
		if(!isset($_SESSION['user'])){
			header('location: ' . $base_url . '');
	        exit();	
		}
		if($_SESSION['user']['is_admin']!=1){
			header('location: ' . $base_url . '');
	        exit();
		}
	}

	function admin_logged_check(){
		$base_url = "http://localhost/csv/";
		
		if(isset($_SESSION['user'])){
			if($_SESSION['user']['is_admin']==1){
				header('location: ' . $base_url . 'admin/dashboard');
		        exit();	
			}
		}	
	}

	function club_logged_check(){
		$base_url = "http://localhost/csv/";
		$db = new MysqliDb ('localhost', 'root', 'michael@123', 'csv');

		if(isset($_SESSION['club_user']['user_name'])){

			$club_user_data = 	$db->where('user_name',$_SESSION['club_user']['user_name'])->getone('club_users');
			
			if(empty($club_user_data)){
				header('location: '.$base_url);
				exit();
			}else{
				header('location: '.$base_url.'clubusers/dashboard');
				exit();
			}	
		}
		
	}

?>