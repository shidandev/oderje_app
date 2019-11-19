<!DOCTYPE html>
<html>
<?php include_once("head/head.php");?>
<body style="background-color:#FF6E0E">
    <?php include_once("controller/user.php");?>
	<div class="container-fluid" >
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
            </div>
            <div class="col-md-4 col-sm-2"> </div>

        </div>

    </div>
    <script>
        
        $(document).ready(function(){
            
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
                            name:data.fullname
                        },
                        function(data){
                            //console.log(data);
                            if(data)
                            {
                                if($_GET['merchant_uid'] && $_GET['merchant_id'] && $_GET['price'])
                                {
                                    var url = "payment/index.php?d="+url_encode("UID="+$_GET['merchant_uid']+"&MID="+$_GET['merchant_id']+"&PRICE="+$_GET['price']);
                                    console.log(url);
                                    window.location.href = url;
                                }
                                else if($_GET['path'])
                                {
                                    // console.log("here");
                                    window.location.href = $_GET['backpath'];
                                }
                                else
                                {
                                    window.location.href = "index.php";
                                }

                                }
                            
                           
                            
                        },"json");


                    }
                },"json");

            });
        });
    </script>
</body>
</html>


               