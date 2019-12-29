
<div class="container-fluid my-3 " >
	<div class="row"  >
		<div class="col-md-2 d-none  d-md-block "></div>
		<div class="col-md-8 col-12">
			<div class="col-md-12 text-center box bubble-high bg-darkpeach">
				<label class="h5 font-weight-bold text-white text-outline col-md-12">Welcome </label>
				<label id="name_display" class="h5 font-weight-bold text-white text-outline col-md-12">Welcome </label>
			</div>
			<div class="col-md-12 text-center box bubble-high mt-2 bg-darkpeach py-3">
				<span class="h5 font-weight-bold text-white text-outline">Cashless Balance : RM <span id="balance_display">1000.00</span></span>
			</div>
			<div class="row mx-auto">
				<div class="col-md-4 col-4  box bubble-high mt-2 bg-custom1 text-center py-2" id="transfer_btn">
					<div class="h6 font-weight-bold text-white text-outline">Transfer</div>
					<i class="fas fa-exchange-alt text-white"></i>
				</div>
				<div class="col-md-4 col-4  box bubble-high mt-2 bg-info text-center py-2 blur" id="topup_btn">
					<div class="h6 font-weight-bold text-white text-outline">Topup</div>
					<i class="fas fa-arrow-up text-custom1 text-white"></i>
				</div>
				<div class="col-md-4 col-4  box bubble-high mt-2 bg-primary text-center py-2 blur" id="withdraw_btn">
					<div class="h6 font-weight-bold text-white text-outline">Withdraw</div>
					<i class="fas fa-money-bill-alt text-custom1 text-white"></i>

				</div>
			</div>
			
			<!-- for withdraw pager -->
			<div class="d-none for_withdraw row bg-primary mx-auto  py-1 box bubble-high text-white" id="withdraw_div">
				<div class="col-md-12 col-12 my-2 text-left bg-info box bubble-high"><small><b>Topup Information</b> </small></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Name</b> </small></div>
				<div class="col-md-10 col-8"><input class="form-control mx-0" type="text" value="name" disabled=""></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Account No</b> </small></div>
				<div class="col-md-10 col-8"><input class="form-control mx-0" type="text" value="name" disabled=""></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Bank Name</b> </small></div>
				<div class="col-md-10 col-8"><input class="form-control mx-0" type="text" value="name" disabled=""></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Quantity</b> </small></div>
				<div class="col-md-10 col-8"><input class="form-control mx-0" type="number" value="0.00" disabled=""></div>
			</div>
			<div class="d-none for_withdraw row mx-auto">
				<div class="col-md-6 col-6  box bubble-high mt-2 bg-custom1 text-center" id="withdraw_cancel_btn">
					<div class="h5 font-weight-bold text-white text-outline">Cancel</div>
					
				</div>
				<div class="col-md-6 col-6  box bubble-high mt-2 bg-info text-center" id="withdraw_submit_btn">
					<div class="h5 font-weight-bold text-white text-outline">Withdraw</div>
					
				</div>
			</div>

			<!-- for topup pager -->
			<div class="d-none for_topup row bg-info mx-auto  py-1 box bubble-high text-white" id="topup_div">
				<div class="col-md-12 col-12 my-2 text-left bg-info box bubble-high"><small><b>Topup Information</b> </small></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Name</b> </small></div>
				<div class="col-md-10 col-8"><input class="form-control mx-0" type="text" value="name" disabled=""></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Account No</b> </small></div>
				<div class="col-md-10 col-8"><input class="form-control mx-0" type="text" value="name" disabled=""></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Channel</b> </small></div>
				<div class="col-md-10 col-8">
					<select class="form-control">
						<option value="FPX">FPX</option>
						<option value="Credit Card">Credit Card</option>
					</select>
				</div>
				<div class="col-md-2 col-4 my-auto "><small><b>Topup</b> </small></div>
				<div class="col-md-10 col-8">
					<!-- <input class="form-control mx-0" type="number" min="1" value="name" disabled=""> -->
					<select class="form-control">
						<option value="5">RM 5.00</option>
						<option value="10">RM 10.00</option>
						<option value="15">RM 15.00</option>
						<option value="20">RM 20.00</option>
						<option value="30">RM 30.00</option>
						<option value="50">RM 50.00</option>
					</select>
				</div>

			</div>
			<div class="d-none for_topup row mx-auto">
				<div class="col-md-6 col-6  box bubble-high mt-2 bg-custom1 text-center" id="topup_cancel_btn">
					<div class="h5 font-weight-bold text-white text-outline">Cancel</div>
					
				</div>
				<div class="col-md-6 col-6  box bubble-high mt-2 bg-info text-center" id="topup_submit_btn">
					<div class="h5 font-weight-bold text-white text-outline">Topup</div>
					
				</div>
			</div>
			<!-- for transfer pager -->
			<div class=" for_transfer row bg-custom1 mx-auto  py-1 box bubble-high text-white" id="transfer_div">
				<div class="col-md-12 col-12 my-2 text-left bg-info box bubble-high"><small><b>Sender Information</b> </small></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Name</b> </small></div>
				<div class="col-md-10 col-8"><input class="form-control mx-0" type="text" value="name" disabled=""></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Account No</b> </small></div>
				<div class="col-md-10 col-8"><input class="form-control mx-0" type="text" value="name" disabled=""></div>
				
				<div class="col-md-12 col-12 my-2 text-left bg-info box bubble-high"><small><b>Receiver Information</b> </small></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Name</b> </small></div>
				<div class="col-md-10 col-8"><input class="form-control mx-0" type="text" value="name" ></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Account No</b> </small></div>
				<div class="col-md-10 col-8"><input class="form-control mx-0" type="text" value="name"></div>
				
				<div class="col-md-12 col-12 my-2 text-left bg-info box bubble-high"><small><b>Transfer Information</b> </small></div>
				<div class="col-md-2 col-4 my-auto "><small><b>Detail</b> </small></div>
				<div class="col-md-10 col-8"><input class="form-control mx-0" type="text" value="name"></div>
			</div>
			<div class=" for_transfer row mx-auto">
				<div class="col-md-6 col-6  box bubble-high mt-2 bg-custom1 text-center" id="transfer_cancel_btn">
					<div class="h5 font-weight-bold text-white text-outline">Cancel</div>
					
				</div>
				<div class="col-md-6 col-6  box bubble-high mt-2 bg-info text-center" id="transfer_submit_btn">
					<div class="h5 font-weight-bold text-white text-outline">Transfer</div>
					
				</div>
			</div>


		</div>
		<div class="col-md-2 d-none d-md-block "></div>
	</div>
</div>

<script>
	$(document).ready(function(){
		

		$("#transfer_submit_btn").on("click",function(){
		
		});
		$("#transfer_btn").on("click",function(){
			$(this).removeClass("blur");
			$("#topup_btn").addClass("blur");
			$("#withdraw_btn").addClass("blur");
			$(".for_transfer").removeClass("d-none");
			$(".for_topup").addClass("d-none");
			$(".for_withdraw").addClass("d-none");

		});
		$("#topup_btn").on("click",function(){
			$(this).removeClass("blur");
			$("#transfer_btn").addClass("blur");
			$("#withdraw_btn").addClass("blur");
			$(".for_topup").removeClass("d-none");
			$(".for_transfer").addClass("d-none");
			$(".for_withdraw").addClass("d-none");
		});
		$("#withdraw_btn").on("click",function(){
			$(this).removeClass("blur");
			$("#topup_btn").addClass("blur");
			$("#transfer_btn").addClass("blur");
			$(".for_withdraw").removeClass("d-none");
			$(".for_transfer").addClass("d-none");
			$(".for_topup").addClass("d-none");
		});

       	$("#transfer_cancel_btn").on("click",function(){
       		window.location.href = $_GET['backpath'];
       	});
	});

	
</script>