<!DOCTYPE html>
<html>
<?php include_once("head/head.php");?>
<body style="background-color:#FF6E0E">
    <?php include_once("controller/user.php");?>
	<div class="container-fluid">
		<div class="row" style="margin-top:80px">
			<div class="col-md-2 col-1"></div>

			<div class="col-md-8 col-10 box bg-light bubble-high">
				
				<div class="col-md-12 col-12 mt-2 text-center  " id="img_btn">
					<img src="img/oderje-logo.png?" class="img-fluid w-50 ">
				</div>
				<div class="col-12 text-center font-weight-bold mt-3">Thank you for choosing us as your platform</div>
				<div class="col-12 text-center mt-3 font-weight-bold d-none">gif</div>
				<div class="col-12 text-center mt-3 font-weight-bold">Please check your email for confirmation</div>
			</div>
			<div class="col-md-2 col-1 "></div>
		</div>
	</div>
</body>

<script>
	$("#img_btn").on('click',function(){
		window.location.href = "index.php";
	});
</script>
</html>