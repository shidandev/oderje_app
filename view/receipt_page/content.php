<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-2 col-sm-1 col-1"></div>
		<div class="col-md-8 col-sm-10 col-10 border border-rounded bubble-high py-2">
			
			<div class="col-md-12 col-sm-12 col-12 text-center text-outline-custom1 text-warning h3 p-0">Receipt</div>
			<div class="row p-1 ">
				<div class="col-md-4 col-sm-5 col-3  p-0 text-center">
					<img src="../img/oderje-logo.png" class="img-fluid m-3" style="width:50%;">
				</div>
				<div class="col-md-8 col-sm-7 col-9  p-0">
					<table class="float-right">
						<tr>
							<td class="p-0 text-right " width="40%"><small > Bill Ref </small></td>
							<td width="10%" class="p-0 font-weight-bold text-center">:</td>
							<td width="50%" class="p-0 text-right"><small><span id="bill_refNo" class="font-weight-bold">OJ99999999</span></small></td>
						</tr>
						<tr>
							<td class="p-0 text-right"><small >Bill Date</small></td>
							<td class="p-0 font-weight-bold text-center">:</td>
							<td class="p-0 text-right"><span id="bill_date"> 11/12/2019 </span></td>
						</tr>
					</table>
					<!-- <label class="col-md-12 col-sm-12 col-12 text-right p-0 m-0 font-weight-bold"><small>Bill Ref</small> : <span>OJ99999999</span></label>
					<label class="col-md-12 col-sm-12 col-12 text-right p-0 m-0 font-weight-bold"><small>Bill Date</small> : <span> 11/12/2019 </span></label> -->
				</div>
			</div>			
			
			<div class="row mx-auto mt-3">
				<table class="col-md-12 col-sm-12 col-12">
					<tr><td width="50%" class="text-center">Merchant</td><td width="1%">:</td><td id="merchant_name" class="text-center" width="49%"></td></tr>
					<tr><td width="50%" class="text-center">Amount</td><td width="1%">:</td><td id="amount" class="text-center" width="49%">RM 5.05</td></tr>
					<tr><td width="50%" class="text-center">Customer</td><td width="1%">:</td><td id="customer_name" class="text-center" width="49%"></td></tr>
					<tr><td width="50%" class="text-center">Status</td><td width="1%">:</td><td id="status" class="text-center" width="49%">>successfully<</td></tr>
				</table>
			</div>
			<div class="row mx-auto mt-5">
				<button class="print_btn btn btn-outline-info box-white bubble-high col-6 invisible">Print</button>
				<button class="back_btn btn btn-outline-info box-white bubble-high col-6">Back</button>
			</div>
		</div>
		<div class="col-md-2 col-sm-1 col-1"></div>
	</div>
</div>

<script>
	$(document).ready(function(){


		if($_GET)
		{
			if($_GET['type'] == "single")
			{
				let bill_id = $_GET['bill_id'];

				$.post(oderje_url+"api/customer_receipt",
				{
					function:"get_receipt_single",
					bill_id:bill_id
				},
				function(data){
					console.table(data);
					$("#status").text((data.status=='paid' || data.status == "Paid" || data.status == "PAID")? "Paid":"" );
					$("#merchant_name").text(data.merchant_name);
					$("#bill_refNo").text(data.bill_ref_no);
					$("#bill_date").text(data.bill_date);
					$("#amount").text(" RM "+data.bill_amount);
					$("#customer_name").text(data.customer_name);

				},"json");
			}
			else if($_GET['type'] == "multiple")
			{
				window.location.href = "multiple";

			}
			else{
				window.location.href = "../index.php";
			}
		}
		else{
			window.location.href = "../index.php";
		}

		$(".back_btn").on("click",function(){
			window.location.href = "../index.php";
		});
	});

</script>