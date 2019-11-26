<div class="container-fluid mt-2" style="margin-bottom:50px">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <select class="form-control" id="account_option_btn">
                <option>Main Account</option>
                <option>Rewards</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card border-white">
                <div class="card-body text-center text-secondary">
                    <p>
                        Credit Balance
                    </p>
                    <span id="currency">
                        RM&nbsp;
                    </span>
                    <span class="mr-n2" id="amount-big" style="font-size:36px">
                        500
                    </span>
                    <span class="align-bottom">&sdot;</span>
                    <span id="amount-small">
                        99
                    </span>
                </div>
                <div class="card-footer bg-white text-center" style="border-color:#FF6600">
                    <span id="accountName">Muhammad Amin bin Mohd Faudzi</span>
                    <br>
                    <span id="accountNumber">10011888</span>
                </div>
            </div>
            <div id="accordion">
                <div class="card border-white">
                    <div class="card-header border-white bg-white text-center" id="headingvouchers"
                        data-toggle="collapse" data-target="#vouchers" aria-expanded="false" aria-controls="vouchers">
                        <p class="text-center text-secondary">
                            Vouchers&nbsp;&nbsp;<i class="fas fa-chevron-down fa-xs"></i>
                        </p>
                    </div>
                    <div id="vouchers" class="collapse" aria-labelledby="headingvpuchers" data-parent="#accordion">
                        <div class="row" style="overflow-y: scroll;max-height: 350px" id="voucher_list_div">
                            <div class="col-md-4 col-sm-6 my-1">
                                <div class="card border-light">
                                    <div class="card-body" style="background-color:lightgoldenrodyellow">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="https://app.oderje.com/images/oderje-logo.png" class="card-img d-block w-100"
                                                alt="shop-logo">
                                            </div>
                                            <div class="col-8 text-right">
                                                <small style="color:#FF6600">
                                                    </i>Cash Voucher
                                                </small>
                                                <p>
                                                    RM <span id="cashVoucherValue">6.00</span>
                                                </p>
                                                <p class="text-secondary mt-n3" style="font-size:10px">
                                                    Valid till : <span id="cashVoucherEnd">01/10/2021</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-1 border-top border-white">
                                            <div class="col-8" style="height:20px">
                                                <p class="text-secondary mt-1" style="font-size:10px">
                                                    By: <span id="cashVoucherFrom">Business 1</span>
                                                    <br>
                                                    Redeem at: <span id="cashVoucherFrom">Business 2</span>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 my-1">
                                <div class="card border-light">
                                    <div class="card-body" style="background-color:bisque">
                                        <div class="row">
                                            <div class="col-8">
                                                <small style="color:#FF6600">
                                                    </i>Delivery Voucher
                                                </small>
                                                <p>
                                                    <i class="text-secondary fas fa-truck">&nbsp;</i>Free Delivery&nbsp;
                                                </p>
                                                <p class="text-secondary mt-n3" style="font-size:10px">
                                                    Valid till : <span id="cashVoucherEnd">01/10/2021</span>
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <img src="https://app.oderje.com/images/oderje-logo.png" class="card-img d-block w-100"
                                                alt="shop-logo">
                                            </div>
                                        </div>
                                        <div class="row mt-2 border-top border-light">
                                            <div class="col-8" style="height:20px">
                                                <p class="text-secondary mt-2" style="font-size:10px">
                                                    By: <span id="cashVoucherFrom">Business 1</span>
                                                    <br>
                                                    Redeem at: <span id="cashVoucherFrom">Business 2</span>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 my-1">
                                <div class="card border-light">
                                    <div class="card-body" style="background-color:powderblue">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="https://app.oderje.com/images/oderje-logo.png" class="card-img d-block w-100"
                                            alt="shop-logo">
                                            </div>
                                            <div class="col-8 text-right">
                                                <small style="color:#FF6600">
                                                    </i>Discount Voucher
                                                </small>
                                                <p>
                                                    &#8722;<span id="discountVoucherValue">10</span>&#37;
                                                </p>
                                                <p class="mt-n3" style="font-size:10px">
                                                    Valid till : <span id="discountVoucherEnd">01/10/2021</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-1 border-top border-light">
                                            <div class="col-8" style="height:20px">
                                                <p class="mt-2" style="font-size:10px">
                                                    By: <span id="discountVoucherFrom">Business 1</span>
                                                    <br>
                                                    Redeem at: <span id="discountVoucherFrom">Business 2</span>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 my-1">
                                
                            </div>
                            <div class="col-md-4 col-sm-6 my-1">
                                
                            </div>
                            <div class="col-md-4 col-sm-6 my-1">
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-header border-white bg-white text-center" id="headingtransactionHistory"
                        data-toggle="collapse" data-target="#transactionHistory" aria-expanded="false"
                        aria-controls="transactionHistory">
                        <p class="text-center text-secondary">
                            Transaction History&nbsp;&nbsp;<i class="fas fa-chevron-down fa-xs"></i>
                        </p>
                    </div>
                    <div id="transactionHistory" class="collapse" aria-labelledby="headingtransactionHistory"
                        data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-sm table-hover" id="transaction_list_div">
                                <thead>
                                    <tr class="bg-light">
                                        <th><small>2020/02/02&nbsp;&nbsp;02:02:02</small></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kafe Jutawan</td>
                                        <td class="text-right text-danger">- RM 8.00</td>
                                    </tr>
                                    <tr>
                                        <td>oderje account top up</td>
                                        <td class="text-right text-success">RM 50.00</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr class="bg-light">
                                        <th><small>2020/01/01&nbsp;&nbsp;01:01:01</small></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kafe Jutawan</td>
                                        <td class="text-right text-danger">- RM 8.00</td>
                                    </tr>
                                    <tr>
                                        <td>oderje account top up</td>
                                        <td class="text-right text-success">RM 50.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card border-white">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-center">
                                <div class="p-1">
                                    <button class="btn btn-sm" id="reload_btn" style="background-color:seashell;width:105px">
                                        <i class="fas fa-plus"></i>
                                        <br>
                                        Reload Credit
                                    </button>
                                </div>
                                <div class="p-1">
                                    <button class="btn btn-sm" id="transfer_btn" style="background-color:seashell;width:105px">
                                        <i class="fas fa-exchange-alt"></i>
                                        <br>
                                        Pay / Transfer
                                    </button>
                                </div>
                                <div class="p-1">
                                    <button class="btn btn-sm" id="withdraw_btn" style="background-color:seashell;width:105px">
                                        <i class="fas fa-hand-holding"></i>
                                        <br>
                                        Widthraw
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-n4">
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-center">
                                <div class="p-1">
                                    <button class="btn btn-sm" id="help_btn" style="background-color:seashell;width:105px">
                                        <i class="fas fa-question-circle"></i>
                                        <br>
                                        Help
                                    </button>
                                </div>
                                <div class="p-1">
                                    <button class="btn btn-sm" id="profile_btn" style="background-color:seashell;width:105px">
                                        <i class="fas fa-user-circle"></i>
                                        <br>
                                        My Profile
                                    </button>
                                </div>
                                <div class="p-1">
                                    <button class="btn btn-sm" id="sign_out_btn" style="background-color:seashell;width:105px">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <br>
                                        Log out
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    $(document).ready(function(){
        
        if(!$_USER['login_status'])
        {
           window.location.href = "../login.php?d="+url_encode("backpath="+$_GET['path']);
        }

        $("#profile_btn").click(function(){
            window.location.href = "../profile";
        });


        $("#sign_out_btn").click(function(){

            if(confirm("Are you sure log out?"))
            {
                let path = $_USER['path'];
                let url = "";
                if(path == home() || path == (home()+"index.php"))
                {
                    url = "session.php";
                }
                else
                {
                    url = "../session.php";
                }
                $.post(url,
                {
                    function:"release_session"
                },
                function(data){
                    if(data)
                    {
                        if(data.status == "ok")
                        {
                            //window.location.href = "index.php";
                            if($_GET && $_GET['backpath'])
                            {
                                window.location.href = $_GET['backpath'];
                            }
                            else
                            {
                                window.location.href = "../index.php";
                            }

                        }
                        else
                        {
                            alert("Sistem error, please wait and try again");
                        }
                    }
                },"json").
                fail(function(){
                    //alert("uina");
                });
            }
            
        });
    });
</script>
<!-- <?php include '../view/wallet_page/footer.php' ?> -->