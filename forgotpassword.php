<!DOCTYPE html>
<html lang="en">
<?php include_once("head/head.php"); ?>

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

<body>
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
                                <h3 class="card-title text-center mt-n3">Forgot Password</h3>

                                <form id="form_fp" method="post" action="https://app.oderje.com/api/forgotpassword">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" required="true">

                                    <button type="submit" class="btn btn-info login_btn text-center mt-3">Submit</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {

            $("#form_fp").on('submit', function(e) {

                e.preventDefault();
                let email = $("#email").val().trim();

                if (email != "") {
                    $.post("https://app.oderje.com/api/forgotpassword", {
                            function: "forgot_password",
                            email: email
                        },
                        function(data1) {
                            if (data1.status == "ok") {
                                $.post("https://app.oderje.com/api/email", {
                                    function: "email_forgotpassword",
                                    remail: email,
                                    cid: data1.cid
                                }, function(data) {
                                    if (data.status == "ok") {
                                        window.location.href = "forgotpassword-pending.php";
                                    } else {
                                        alert("Email doesn't exist");

                                    }
                                }, "json");


                            } else {
                                alert("Email doesn't exist");
                            }
                        }, "json");
                }
            });

        });
    </script>
</body>

</html>