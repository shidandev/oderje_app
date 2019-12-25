<div class="container-fluid" style="margin-bottom:50px">
	<div class="row">
		<div class="col-12">
			<div class="container-fluid">
				<div class="card border-white mt-2 text-center">
					<div class="row">
						<div class="col-12">
							<div class="d-flex justify-content-center">
								<div class="p-1 bg-warning btn-block text-white">
									
									<i class="fas fa-heart"></i><br>Favourites
									
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid" style="margin-bottom:100px">
				<div class="card border-white" id="collapseListFavourite" style="display:true">
					<div class="card-body">
						<div class="row">
							<!-- <?php include '../inc/product-card.php'; ?> -->
							<!-- <?php include '../inc/product-card.php'; ?> -->
							<!-- <?php include '../inc/product-card.php'; ?> -->
							<!-- <?php include '../inc/product-card.php'; ?> -->
						</div>
					</div>
				</div>
				
			</div>
			<!-- <?php include '../inc/back-to-top-button.php' ?> -->
			<!-- <?php include '../inc/grab-item-modal.php'; ?> -->
			
		</div>
	</div>
</div>
<!-- <?php include '../inc/back-to-top-button.php' ?> -->


<script>
	$(document).ready(function () {


		if(!$_USER['login_status'])
		{
			window.location.href = "../login.php?d="+url_encode("backpath="+$_GET['path']);
		}
		
		$("#listFavourite").click(function () {
			$("#collapseListFavourite").slideToggle("fast");
			$("#collapseListHot").slideUp("fast");
			$("#collapseListPromotions").slideUp("fast");

		});
		// $("#listHot").click(function () {
		// 	$("#collapseListHot").slideToggle("fast");
		// 	$("#collapseListFavourite").slideUp("fast");
		// 	$("#collapseListPromotions").slideUp("fast");
		// });
		// $("#listPromotions").click(function () {
		// 	$("#collapseListPromotions").slideToggle("fast");
		// 	$("#collapseListHot").slideUp("fast");
		// 	$("#collapseListFavourite").slideUp("fast");
		// });
	});
</script>