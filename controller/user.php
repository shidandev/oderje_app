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
