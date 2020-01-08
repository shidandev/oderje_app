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
					window.location.href = "login.php?d="+url_encode("backpath="+$_USER['path']+"&MID="+$_GET['MID']+"&UID="+$_GET['UID']+"&bill_id="+$_GET['bill_id']);

				}
				else
				{
					window.location.href = "../login.php?d="+url_encode("backpath="+$_USER['path']+"&MID="+$_GET['MID']+"&UID="+$_GET['UID']+"&bill_id="+$_GET['bill_id']);
				}

			}
			else{
				$("#name_display").text($_USER['name']);
			}
		}
	</script>

	<?php include_once("../view/common/navbar.php");?>
	
	<?php include_once("../view/payment_page/content2.php");?>
</body>
</html>