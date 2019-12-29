<div class="container-fluid" style="margin-bottom:50px">
    <div class="row my-3 justify-content-center">
        <div class="col-xl-6 col-12">
            <select class="form-control">
                <option>Main Account</option>
                <option>Rewards</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-12">
            <div class="card border-white">
                <div class="card-body text-center">
                    <p>
                        Current Balance
                    </p>
                    <span id="currency">
                        RM&nbsp;
                    </span>
                    <span class="mr-n2" id="amount-big" style="font-size:42px">
                       	0
                    </span>
                    <span class="align-bottom">&sdot;</span>
                    <span id="amount-small">
                        00
                    </span>
                </div>
                <div class="card-footer bg-white text-center" style="border-color:#FF6600">
                    <span id="accountName"></span>
                    <br>
                    <span id="accountNumber"></span>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card border-white">
                <div><span class="text-danger">*</span><small>Transfer to ANSI SYSTEMS SDN BHD</small></div>
                <div class="card-body" style="background-color:azure">
                    <div class="row">
                        <div class="col-12 mb-2 text-center">
                            <form action="" class="text-center mb-3">
                                <label for="Money" class="my-2"><b>Reload Amount</b>&nbsp;&#58;&nbsp;(RM)</label>
                                <input id="Money" class="form-control form-control-lg text-center" type="text"
                                    style="font-size:xx-large">
                            </form>
                            <b>Reload Via</b>&nbsp;&#58;
                        </div>
                        <div class="col-12">
                            <div class="card border-white">
                                <div class="card-body">
                                    <div class="row">
                                    	<?php include_once("bank_button.php");?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4 text-center">
                            <button class="btn btn-sm text-white" type="button" id="proceed_btn" style="background-color:#FF6600;border-color:#FF6600;width:120px">
                            	Proceed&nbsp;&nbsp;<i id="reloadProceedButton" class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        <span id="temp"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("../footer/footer-wallet.php")?>
<script src="../js/moneyInput.js"></script>

<script>
	$(document).ready(function(){

        if($_GET["amount"])
        {
            $("#Money").val($_GET['amount']);

        }
		$("#proceed_btn").on("click",function(){
			let c_id = $_USER['cid'];
			let amount = $("#Money").val();
			let bank_code = $("input[name='paymentMethod']:checked").val();
            let bank_name = $("input[name='paymentMethod']:checked").attr("bank-name");
            

            console.log(bank_code);
            if(parseFloat(amount) > 1.0 && bank_code != "" && bank_name !="")
            {
                $.post(oderje_url+"/api/customer_topup",{
                    function:"topup_wallet_typ",
                    c_id:c_id,
                    amount:amount,
                    bank_code:bank_code,
                    bank_name:bank_name
                },function(data){
                    console.log(data);
                    $("#temp").append(data.page);
                },"json");
            }
			else{
                alert("Please set amount more than RM 1.00");
            }
		});	


		 $.post(oderje_url+"api/customer",
        {
            function:"user_typ_key",
            u_id:$_USER['uid']
        },
        function(data){
            if(data.status == "ok")
            {
                $.post(typ_url+"api/typ_accountBalance",
                {
                    function:"vab_amount",
                    key:data.typ_key
                },function(data2){

                    var amount = ((data2.vab_amount).toString()).split(".");
                    //console.log(amount[0]);
                    $("#amount-big").text(amount[0]);
                    $("#amount-small").text(amount[1]);

                    $("#accountNumber").text(data2.vab_no);
                    
                },"json");

                $("#accountName").text($_USER['name']);
            }

        },"json");
	});
</script>