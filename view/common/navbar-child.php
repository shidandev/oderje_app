<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top">
    
    <!-- <img src="http://www.oderje.com/img/oderje-logo.png" class="img-fluid d-none d-sm-block" style="width:10%"> -->
    

    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <span  class="d-none header-logo">
        <img src="../../img/oderje-logo.png?" class="img-fluid d-block d-sm-none ml-auto btn_homepage" style="width:30%;margin-top:-35px" >
    </span>
    <div class="col-2">
        <a href="http://www.oderje.com/" class="d-none header-logo">
            <img src="../../img/oderje-logo.png?" class="img-fluid d-none d-sm-block mt-2" style="width:80%">
        </a>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-2 mt-2 mr-auto ">
                
                <button class="btn btn-sm text-light h-100" id="favourite_btn" style="background-color:#FF9933">
                    <i class="fas fa-heart fa-lg my-1"></i><br><span class="text-center">Favourites</span><br><span
                        class="badge badge-pill badge-light my-1">0</span>
                </button>
                
            </li>
            <li class="nav-item mx-2 mt-2 mr-auto">
                <button class="btn btn-sm text-light h-100" id="basket_btn" style="background-color:#FF9933">
                    <i class="fas fa-shopping-basket my-1 fa-lg"></i><br>My Basket<br><span
                        class="badge badge-pill badge-light my-1">0</span>
                </button>
            </li>
            <li class="nav-item mx-2 mt-2 mr-auto wallet_div ">
                <button type="button" class="btn btn-sm text-light " id="wallet_btn" style="background-color:#FC9732">
                    <i class="fas fa-wallet fa-lg my-1" style="font-size:20px" s></i>
                    <br>My Wallet<br>
                    <span class="badge badge-pill badge-light my-1"><span id="label1">RM</span> <span id="wallet_balance">500</span></span>
                </button>
            </li>
             <li class="nav-item mx-2 mt-2 mr-auto login_nav_div d-none">
                <button class="btn btn-sm text-light sign_in_btn px-3" style="background-color:#FC9732">
                    <i class="fas fa-sign-in-alt" style="font-size:20px"></i></i><br>Log In<br>
                </button>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid d-none" id="basket_custom">
    <div class="row bg-white">
        <div class="col-6">
            <div class="card border-white">
                <div class="card-header border-white text-white" id="basketGeneral" style="background:#FF9933">
                    <p class="mb-0 text-center">
                        <i class="fas fa-shopping-basket"></i>&nbsp;&nbsp;General
                    </p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card border-white">
                <div class="card-header border-white text-white" id="basketFood" style="background:yellowgreen">
                    <p class="mb-0 text-center">
                        <i class="fas fa-utensils"></i>&nbsp;&nbsp;Food
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    //all navigation bar logic here
    $("#fullname").text(($_USER['name'])? $_USER['name']:"");

    (
        $_USER['path'] == "/www.oderje.com/index.php" ||
        $_USER['path'] == "/www.oderje.com/" ||
        $_USER['path'] == "/" ||
        $_USER['path'] == "/index.php" ||
        $_USER['path'] == "/dev2.oderje.com/index.php" || 
        $_USER['path'] == "/dev2.oderje.com/" 
    )?$(".header-logo").addClass("d-none"):$(".header-logo").removeClass("d-none");

    //($_USER['path'] == "/www.oderje.com/basket/index.php" || $_USER['path'] == "/www.oderje.com/basket/"  )?$("#basket_custom").removeClass("d-none"):$("#basket_custom").addClass("d-none");

    if($_USER['login_status'] == true)
    {
        // $(".wallet_div").removeClass("d-none");
        // $(".login_nav_div").addClass("d-none");
    }
    else
    {

        // $(".wallet_div").addClass("d-none");
        // $(".login_nav_div").removeClass("d-none");
    }

    $(".btn_homepage").click(function(){
        window.location.href = oderje_home;
    });

    $("#basket_btn").click(function(){
        
        let path = $_USER['path'];

        if(path === "/www.oderje.com/payment/pos/")
        {
            window.location.href = "../../basket?d="+url_encode("backpath="+$_USER['path']);
        }
    });
    $("#wallet_btn").click(function(){
        let path = $_USER['path'];

        if(path === "/www.oderje.com/payment/pos/")
        {
            window.location.href = "../../wallet?d="+url_encode("backpath="+$_USER['path']);
        }
        
    });

    $("#favourite_btn").click(function(){
        let path = $_USER['path'];
        
        if(path === "/www.oderje.com/payment/pos/")
        {
            window.location.href = "../../favourite?d="+url_encode("backpath="+$_USER['path']);
        }

    });
    $(".sign_in_btn").click(function(){
        let path = $_USER['path'];

        if(path === "/www.oderje.com/payment/pos/")
        {
            window.location.href = "../../login.php?d="+url_encode("backpath="+$_USER['path']);
        }

       
    });

     $("#basketGeneral").click(function () {
        $("#collapseGeneralContent").slideToggle("fast");
        if ($("#collapseFoodContent").is(":visible")) {
            $("#collapseFoodContent").slideUp("fast");
        }
    });
    $("#basketFood").click(function () {
        $("#collapseFoodContent").slideToggle("fast");
        if ($("#collapseGeneralContent").is(":visible")) {
            $("#collapseGeneralContent").slideUp("fast");
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
                    $("#wallet_balance").text(data2.vab_amount);
                    
                    
                },"json");

                $("#accountName").text($_USER['name']);
            }

        },"json");
   
</script>