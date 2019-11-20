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

			$_SESSION['cid'] = $cid;
			$_SESSION['key'] = $key;
			$_SESSION['name'] = $name;

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