<?php
		session_start();
		if(isset($_SESSION) && count($_SESSION) > 0)
		{
			$keys = array_keys($_SESSION);	

			echo '<script>';
			echo 'var $_USER = new Array();';
			echo 'var cur_url = window.location.pathname;';
			echo '$_USER["path"] = cur_url;';
			for($i = 0 ; $i<count($_SESSION); $i++)
			{
				echo '$_USER["'.$keys[$i].'"] = "'.$_SESSION[$keys[$i]].'";';
			}
			echo '</script>';
			// echo '	<script>
			// 			//console.log("occupy");
			// 			var cur_url = window.location.pathname;

			// 			var $_USER = new Array();
			// 			$_USER["cid"] = '.$_SESSION['cid'].';
			// 			$_USER["key"] = "'.$_SESSION['key'].'"; 
			// 			$_USER["name"] = "'.$_SESSION['name'].'";
			// 			$_USER["login_status"] = '.$_SESSION['login_status'].';
			// 			$_USER["path"] = cur_url;

			// 		</script>';

		}
		else
		{
			echo '	<script>
						// console.log("empty");
						var cur_url = window.location.pathname;

						var $_USER = new Array();
						$_USER["cid"] = null;
						$_USER["key"] = null; 
						$_USER["login_status"] = false;
						$_USER["path"] = cur_url;
					</script>';

		}
?>
