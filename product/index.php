<html>

	<?php include_once("../head/head-child.php");?>


<body>
	<?php include_once("../controller/user.php");?>
	<?php include_once("../view/common/navbar.php");?>
	<?php include_once("../view/product_page/content.php");?>
	<?php include_once("../view/product_page/footer.php");?>

</body>
<script src="../view/product_page/product_onload.js"></script>
<?php
	if(isset($_REQUEST['merchant_name']))
	{
		echo '<script>$_GET["merchant_name"] ="'. $_REQUEST['merchant_name'].'"</script>';
	}

?>

</html>