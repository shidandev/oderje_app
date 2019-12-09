<?php
	session_start();

	$data = array();
	if(isset($_REQUEST['function']) && $_REQUEST['function'] == "set_session")
	{

		if(isset($_REQUEST['cid']) && isset($_REQUEST['key']) && isset($_REQUEST['name']))
		{

			$cid = $_REQUEST['cid'];
			$key = $_REQUEST['key'];
			$name = $_REQUEST['name'];
			$uid = $_REQUEST['uid'];
			$username = $_REQUEST['username'];
			$email = $_REQUEST['email'];
			$phone = $_REQUEST['phone'];
			$address = $_REQUEST['address'];
			$postcode = $_REQUEST['postcode'];
			$state = $_REQUEST['state'];
			$country = $_REQUEST['country'];
			$gender = $_REQUEST['gender'];
			$dob = $_REQUEST['dob'];


			$_SESSION['cid'] = $cid;
			$_SESSION['key'] = $key;
			$_SESSION['name'] = $name;
			$_SESSION['uid'] = $uid;

			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;
			$_SESSION['phone'] = $phone;
			$_SESSION['address'] = $address;
			$_SESSION['postcode'] = $postcode;
			$_SESSION['state'] = $state;
			$_SESSION['country'] = $country;
			$_SESSION['gender'] = $gender;
			$_SESSION['dob'] = $dob;

			$_SESSION['login_status'] = TRUE;
			$data['status'] = "ok";

			// var_dump($_SESSION);
			
		}
		else
		{
			$data['status'] = "ko";
		}


	}
	else if(isset($_REQUEST['function']) && $_REQUEST['function'] == "release_session")
	{
		
		if(session_destroy())
		{
			$data['status'] = "ok";
		}
		else
		{
			$data['status'] = "ko";
		}
		
	}

	else if(isset($_REQUEST['function']) && $_REQUEST['function'] == "add_param")
	{

		$param = $_REQUEST['param'];
		$keys = array_keys($param);	

		//var_dump($keys);
		//var_dump($param);
		for($i = 0 ; $i < count($param); $i++)
		{
			// $_SESSION[$keys[$i]] = $param[$i];
			$_SESSION[$keys[$i]]=$param[$keys[$i]];
		}

		$keys2 = array_keys($_SESSION);	
		/*echo '<script>';
		for($i = 0 ; $i<count($_SESSION); $i++)
		{
			echo '$_USER["'.$keys2[$i].'"] = "'.$_SESSION[$keys2[$i]].'";';
		}
		echo '</script>';*/
		$data = $param;

	}

	else if(isset($_REQUEST['function']) && $_REQUEST['function'] == "get_param"){
		$keys = array_keys($_SESSION);
		$temp = array();

		for($i = 0 ; $i < count($_SESSION); $i ++)
		{
			$temp[$keys[$i]] = $_SESSION[$keys[$i]];
			
		}	
		$data = $temp;	
	}
	else if(isset($_REQUEST['function']) && $_REQUEST['function'] == "unset_param"){
		$param = $_REQUEST['param'];

		for($i = 0 ; $i < count($param); $i ++)
		{
			unset($_SESSION[$param[$i]]);
		}	
		$data = $param;	
	}
	echo json_encode($data);
?>