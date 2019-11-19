<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top">
    
    <img src="http://www.oderje.com/img/oderje-logo.png" class="img-fluid d-none d-sm-block" style="width:10%">
    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <img src="http://www.oderje.com/img/oderje-logo.png" class="img-fluid d-block d-sm-none ml-auto"
    style="width:30%">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-2 mt-2 mr-auto">
                <a href="http://www.oderje.com/fav-list/">
                    <button class="btn btn-sm text-light" style="background-color:#FC9732">
                        <i class="fas fa-heart" style="font-size:20px"></i></i><br>Favourites<br><span
                        class="badge badge-pill badge-light">5</span>
                    </button>
                </a>
            </li>
            <li class="nav-item mx-2 mt-2 mr-auto">
                <button class="btn btn-sm text-light" style="background-color:#FC9732">
                    <i class="fas fa-shopping-basket" style="font-size:20px"></i><br>My Basket<br><span
                    class="badge badge-pill badge-light">5</span>
                </button>
            </li>
            <li class="nav-item mx-2 mt-2 mr-auto">
                <button type="button" class="btn btn-sm text-light" id="wallet_btn" style="background-color:#FC9732">
                    <i class="fas fa-money-bill-wave" style="font-size:20px" s></i>
                    <br>My Wallet<br>
                    <span class="badge badge-pill badge-light">RM <span>500</span></span>
                </button>
            </li>
            <li class="nav-item mx-2 mt-2 mr-auto login_nav_div">
                <button class="btn btn-sm text-light sign_in_btn px-3" style="background-color:#FC9732">
                    <i class="fas fa-sign-in-alt" style="font-size:20px"></i></i><br>Log In<br>
                </button>
            </li>
            <li class="nav-item mx-2 mt-2 mr-auto logout_nav_div">
                <button class="btn btn-sm text-light sign_out_btn" style="background-color:#FC9732">
                    <i class="fas fa-sign-out-alt" style="font-size:20px"></i></i><br>Log Out<br>
                    <span id="fullname"></span><br>
                </button>
            </li>
       </ul>
    </div>
</nav>
<!-- <div class="container mt-1" id="div_navigation" >
    <div class="row bg-info mx-auto box bubble-mid">
        <div class="col-2 text-center ">
            <button class="btn p-0" id="back_btn_global">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div> -->



<script>
    //all navigation bar logic here
    $("#fullname").text(($_USER['name'])? $_USER['name']:"");


    if($_USER['login_status'] == true)
    {
        $(".login_nav_div").addClass("d-none");
        $(".logout_nav_div").removeClass("d-none");
    }
    else
    {

        $(".logout_nav_div").addClass("d-none");
        $(".login_nav_div").removeClass("d-none");
    }

    $("#wallet_btn").click(function(){
        let path = $_USER['path'];

        if(path == home() || path == (home()+"index.php"))
        {
            window.location.href = "wallet?d="+url_encode("backpath="+$_USER['path']);
        }
        else
        {
            window.location.href = "../wallet?d="+url_encode("backpath="+$_USER['path']);
        }
    });

    $(".sign_in_btn").click(function(){
        let path = $_USER['path'];

        if(path == home() || path == (home()+"index.php"))
        {
            window.location.href = "login.php?d="+url_encode("backpath="+$_USER['path']);
        }
        else
        {
            window.location.href = "../login.php?d="+url_encode("backpath="+$_USER['path']);
        }
    });

    $(".sign_out_btn").click(function(){

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
                            window.location.href = "index.php";
                        }

                    }
                    else
                    {
                        alert("Sistem error, please wait and try again");
                    }
                }
            },"json").
            fail(function(){
                alert("uina");
            });
        }
        
    });

    $("#back_btn_global").click(function(){
        window.location.href = $_GET['backpath'];
    });
</script>