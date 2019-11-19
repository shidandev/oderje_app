<html>
	<?php include_once("head/head.php");?>
<body>
	<?php include_once("controller/user.php");?>
	<?php include_once("view/common/navbar.php");?>
	<?php include_once("view/main_page/content.php");?>
	<?php include_once("view/main_page/footer.php");?>

</body>

<script>
	$(document).ready(function(){
		

		if($_GET['function'])
		{
			let price  = ($_GET['price'])? $_GET['price']:0;
			switch($_GET['function']){
				case "payment" : {window.location = "payment?d="+url_encode("UID="+$_GET['u_id']+"&MID="+$_GET['mid']+"&PRICE="+price)};break;
				case "product" : {window.location = "product?d="+url_encode("UID="+$_GET['u_id']+"&MID="+$_GET['mid']);};break;
				case "package" : {window.location = "package?d="+url_encode("UID="+$_GET['u_id']+"&MID="+$_GET['mid']);};break;
			}
		}

		document.title = "Welcome to Oderje";



		$("#search-oderje").on("click",function(){
			var search_str = $("#search_str").val().trim();
			console.log(search_str);
			window.location = "product/?d="+url_encode("search="+search_str);
			
		});

	});
	
</script>
</html>