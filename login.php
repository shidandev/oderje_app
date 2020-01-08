<!DOCTYPE html>
<html>
<?php include_once("head/head.php");?>
<body style="background-color:#FF6E0E">
    <?php include_once("controller/user.php");?>
	<!-- <div class="container-fluid" >
        <div class="row">
            <div class="col-md-4 col-sm-2"></div>
            <div class="col-md-4 text-center mb-3" style="margin-top:80px">
                <a href="http://www.oderje.com/"><img src="http://www.oderje.com/img/oderje-logo-2.png" class="img-fluid w-50"></a>
            </div>
            <div class="col-md-4 col-sm-2"></div>
            <div class="col-md-4 col-sm-2"></div>
            <div class="col-md-4 bg-light m-1 border border-dark rounded p-2">
               
                <label class="text-center col-md-12 h3">Log in</label>
                <label class="px-1 text-primary"><b>Username or e-mail</b></label>
                <input class="px-2 form-control" type="text" name="username" id="username" placeholder="Enter username or e-mail" required="true">
                <label class="px-1 mt-2 text-primary"><b>Password</b></label>
                <input class="px-2 form-control" type="password" name="pass"  id="password" placeholder="Enter password" required="true"> 
                
                <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label text-primary" for="customCheck1"><b>Remember me</b></label>
                </div>
                <div class="row mx-auto">
                    <button type="button" class="col-6 btn btn-outline-warning btn-block mt-3 text-dark cancel_back_btn"><b>Cancel</b></button>
                    <button type="button" class="col-6 btn btn-outline-warning btn-block mt-3 text-dark login_btn"><b>Login</b></button>
                </div>
                <div class="row mx-auto"><a href="register.php" class="btn btn-outline-dark float-center col-12 mt-3">Sign up instead</a></div>       
            </div>
            <div class="col-md-4 col-sm-2"> </div>

        </div>

    </div> -->

    <style>
    html,
    body,
    .container-login {
        height: 100%;
    }

    .container-login {
        display: table;
        width: 100%;
        margin-top: 0px;
        padding: 50px 0 10 10;
        /*set left/right padding according to needs*/
        box-sizing: border-box;
    }
    </style>
    <div class="container-fluid container-login" style="background-color:#FF6E0E">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center mb-3" style="margin-top:80px">
                <a href="https://www.oderje.com/"><img src="https://app.oderje.com/images/oderje-logo-2.png" class="img-fluid w-50"></a>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="card mt-3 shadow p-3 mb-5 bg-white rounded">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="card-body mb-n3">
                                <h3 class="card-title text-center mt-n3">Log in</h3>
                                
                                    <div class="form-group">
                                        <label for="username">Username or e-mail</label>
                                        <input type="text" class="form-control" id="username"
                                            aria-describedby="username" placeholder="Enter username or e-mail"
                                            required="true">
                                        <!-- <small id="loginHelp" class="form-text text-muted">We'll never share your email with
                                            anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Enter password" required="true">
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="Check">
                                        <label class="form-check-label" for="Check">Remember me</label>
                                    </div>
                                    <button type="button" class="btn btn-info login_btn">Submit</button>
                               
                                <p class="text-right"><a href="#" class="text-secondary">Forgot password?</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <footer class="fixed-bottom" style="background-color:#FF6E0E">
            <div class="col-12 text-center">
                <p><a href="register.php" class="text-light">or click here to sign up :)</a></p>
            </div>
        </footer>
    </div>
    <script>
        
        $(document).ready(function(){
            
            
            if($_USER['login_status'] && $_GET  && $_GET['backpath'] == null)
            {
                // alert($_GET['backpath'] == "");    
                window.location.href = "wallet";
            }

            $(".cancel_back_btn").on("click",function(){
                window.location.href = "index.php";
            });
            $(".login_btn").on("click",function(){
                
                var username = $("#username").val().trim();
                var password = $("#password").val().trim();

                $.post("https://app.oderje.com/api/customer",
                {
                    function:"login",
                    username:username,
                    pass:password
                },
                function(data){
                    if(data.status == "ok")
                    {
                        $.post("session.php",
                        {
                            function:"set_session",
                            cid:data.customer_ID,
                            key:data.key,
                            name:data.fullname,
                            uid:data.uid,
                            username:data.username,
                            email:data.email,
                            phone:data.phone,
                            address:data.address,
                            postcode:data.postcode,
                            state:data.state,
                            country:data.country,
                            gender:data.gender,
                            dob:data.dob
                        },
                        function(data){
                            //console.log(data);
                            if(data)
                            {
                                if($_GET['MID'] && $_GET['UID'] && $_GET['bill_id'])
                                {
                                    var url = "payment/index.php?d="+url_encode("UID="+$_GET['UID']+"&MID="+$_GET['MID']+"&bill_id="+$_GET['bill_id']);
                                    console.log(url);
                                    window.location.href = url;
                                }
                                else if($_USER['path'] && !$_GET['backpath'])
                                {
                                    // console.log("here");
                                    // window.location.href = $_GET['backpath'];
                                    window.location.href = "wallet/";
                                }
                                else
                                {
                                    window.location.href = "index.php";
                                }

                                }
                            
                           
                            
                        },"json");


                    }
                    else
                    {
                        alert("Username and password are not match");
                    }
                },"json");

            });
        });
    </script>
</body>
</html>


               