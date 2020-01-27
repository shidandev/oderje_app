<!DOCTYPE html>
<html>
	<?php include_once("../head/head-child.php");?>
<body>
	<?php include_once("../controller/user.php");?>

	<script>

		initializer();
		function initializer(){
			if(!$_USER['login_status'])
			{
				let path = $_USER['path'];
				if(path == home() || path == (home()+"index.php"))
				{
					window.location.href = "login.php?d="+url_encode("backpath="+$_USER['path']);

				}
				else
				{
					window.location.href = "../login.php?d="+url_encode("backpath="+$_USER['path']);
				}

			}
			else{
				$("#name_display").text($_USER['name']);
			}
		}
	</script>
	<?php include_once("../view/common/navbar.php");?>
	<?php include_once("../view/payment_preorder_page/content.php");?>
</body>
</html>