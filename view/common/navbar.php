<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top">

    <!-- <img src="http://www.oderje.com/img/oderje-logo.png" class="img-fluid d-none d-sm-block" style="width:10%"> -->


    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <span class="d-none header-logo">
        <img src="../img/oderje-logo.png?" class="img-fluid d-block d-sm-none ml-auto btn_homepage" style="width:30%;margin-top:-35px" >
    </span>
    <div class="col-2">
        <a href="http://www.oderje.com/" class="d-none header-logo">
            <img src="../img/oderje-logo.png?" class="img-fluid d-none d-sm-block mt-2" style="width:80%">
        </a>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav list-inline ml-auto mt-3">
            <li class="px-1 list-inline-item">
                <button class="btn text-white favourite_btn" style="background-color:#FF9933">
                    <small>
                        <i class="fas fa-heart fa-lg my-1 "></i><br>
                        <label class="font-weight-bold">Favourites</label><br>
                        <span class="badge badge-pill badge-light my-1 ">0</span>
                    </small>
                </button>
            </li>
            <li class="px-1 list-inline-item">
                <button class="btn text-white basket_btn" style="background-color:#FF9933">
                    <small>
                        <i class="fas fa-shopping-basket fa-lg my-1 "></i><br>
                        <label class="font-weight-bold">My Basket</label><br>
                        <span class="badge badge-pill badge-light my-1 basketCount">0</span>
                    </small>
                </button>
            </li>
            <li class="px-1 list-inline-item">
                <button class="btn text-white wallet_btn" style="background-color:#FF9933">
                    <small>
                        <i class="fas fa-wallet fa-lg my-1 "></i><br>
                        <label class="font-weight-bold">My Wallet</label><br>
                        <span class="badge badge-pill badge-light my-1 loginStat"><span id="label1">RM</span> <span class="wallet_balance">0</span></span>
                    </small>
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
    $("#fullname").text(($_USER['name']) ? $_USER['name'] : "");

    (
        $_USER['path'] == "/www.oderje.com/index.php" ||
        $_USER['path'] == "/www.oderje.com/" ||
        $_USER['path'] == "/" ||
        $_USER['path'] == "/index.php" ||
        $_USER['path'] == "/dev2.oderje.com/index.php" ||
        $_USER['path'] == "/dev2.oderje.com/"
    ) ? $(".header-logo").addClass("d-none"): $(".header-logo").removeClass("d-none");

    //($_USER['path'] == "/www.oderje.com/basket/index.php" || $_USER['path'] == "/www.oderje.com/basket/"  )?$("#basket_custom").removeClass("d-none"):$("#basket_custom").addClass("d-none");

    if ($_USER['login_status'] == true) {
        // $(".wallet_div").removeClass("d-none");
        // $(".login_nav_div").addClass("d-none");

    } else {
        $(".loginStat").text("login");
        // $(".wallet_div").addClass("d-none");
        // $(".login_nav_div").removeClass("d-none");
    }

    $(".btn_homepage").click(function() {
        window.location.href = oderje_home;
    });

    $(".basket_btn").click(function() {
        let path = $_USER['path'];

        if (path == home() || path == (home() + "index.php")) {
            window.location.href = "basket?d=" + url_encode("backpath=" + $_USER['path']);
        } else {
            window.location.href = "../basket?d=" + url_encode("backpath=" + $_USER['path']);
        }
    });
    $(".wallet_btn").click(function() {
        let path = $_USER['path'];

        if (path == home() || path == (home() + "index.php")) {
            window.location.href = "wallet?d=" + url_encode("backpath=" + $_USER['path']);
        } else {
            window.location.href = "../wallet?d=" + url_encode("backpath=" + $_USER['path']);
        }
    });

    $(".favourite_btn").click(function() {
        let path = $_USER['path'];

        if (path == home() || path == (home() + "index.php")) {
            window.location.href = "favourite?d=" + url_encode("backpath=" + $_USER['path']);
        } else {
            window.location.href = "../favourite?d=" + url_encode("backpath=" + $_USER['path']);
        }

    });
    $(".sign_in_btn").click(function() {
        let path = $_USER['path'];

        if (path == home() || path == (home() + "index.php")) {
            window.location.href = "login.php?d=" + url_encode("backpath=" + $_USER['path']);
        } else {
            window.location.href = "../login.php?d=" + url_encode("backpath=" + $_USER['path']);
        }
    });

    $("#basketGeneral").click(function() {
        $("#collapseGeneralContent").slideToggle("fast");
        if ($("#collapseFoodContent").is(":visible")) {
            $("#collapseFoodContent").slideUp("fast");
        }
    });
    $("#basketFood").click(function() {
        $("#collapseFoodContent").slideToggle("fast");
        if ($("#collapseGeneralContent").is(":visible")) {
            $("#collapseGeneralContent").slideUp("fast");
        }
    });

    $.post(oderje_url + "api/customer", {
            function: "user_typ_key",
            u_id: $_USER['uid']
        },
        function(data) {
            if (data.status == "ok") {
                $.post(typ_url + "api/typ_accountBalance", {
                    function: "vab_amount",
                    key: data.typ_key
                }, function(data2) {
                    $(".wallet_balance").text(data2.vab_amount);
                    

                }, "json");

                $("#accountName").text($_USER['name']);
            }

        }, "json");
    // $(".sign_out_btn").click(function(){

    //     if(confirm("Are you sure log out?"))
    //     {
    //         let path = $_USER['path'];
    //         let url = "";
    //         if(path == home() || path == (home()+"index.php"))
    //         {
    //             url = "session.php";
    //         }
    //         else
    //         {
    //             url = "../session.php";
    //         }
    //         $.post(url,
    //         {
    //             function:"release_session"
    //         },
    //         function(data){
    //             if(data)
    //             {
    //                 if(data.status == "ok")
    //                 {
    //                     //window.location.href = "index.php";
    //                     if($_GET && $_GET['backpath'])
    //                     {
    //                         window.location.href = $_GET['backpath'];
    //                     }
    //                     else
    //                     {
    //                         window.location.href = "index.php";
    //                     }

    //                 }
    //                 else
    //                 {
    //                     alert("Sistem error, please wait and try again");
    //                 }
    //             }
    //         },"json").
    //         fail(function(){
    //             alert("uina");
    //         });
    //     }

    // });

    // $("#back_btn_global").click(function(){
    //     window.location.href = $_GET['backpath'];
    // });
</script>