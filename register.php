<!DOCTYPE html>
<html>
<?php include_once("head/head.php"); ?>

<body style="background-color:#FF6E0E">
    <?php include_once("controller/user.php"); ?>

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
            <div class="col-md-4 text-center mb-3" style="margin-top:50px">
                <a href="index.php"><img src="img/oderje-logo-2.png" class="img-fluid w-50"></a>
        </div>
        <div class=" col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="card my-3 shadow p-3 mb-5 bg-white rounded">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h3 class="card-title text-center mt-n2 mb-2">Registration</h3>
                                <form id="form_signup" method="post" action="https://app.oderje.com/api/customer">
                                    <input type="hidden" name="function" value="register">
                                    <div class="form-group row">
                                        <div class="col-md-6 mb-2">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Enter username" required="true">
                                            <small id="username" class="form-text text-muted">Username is unique and will be
                                                used for your transactions</small>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="password">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your e-mail" required="true">
                                            <small id="email" class="form-text text-muted">or you can also use e-mail for your
                                                transactions</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 mb-2">
                                            <label for="password">Password</label>
                                            <div class="input-group">
                                                <input type="password" id="password-input" class="form-control" placeholder="Create a strong password" required="true" name="pass">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="password-icon"><i id="password-toggle" class="far fa-eye"></i></span>
                                                </div>
                                            </div>
                                            <small id="password-text" class="form-text text-muted">Minimum 8 alphanumeric character with at least 1 number and 1 uppercase letter</small>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="passwordCheck">Re-type Password</label>
                                            <div class="input-group">
                                                <input type="password" id="passwordCheck-input" class="form-control" placeholder="Double check " required="true">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="passwordCheck-icon"><i id="passwordCheck-toggle" class="far fa-eye"></i></span>
                                                </div>
                                            </div>
                                            <small id="passwordCheck-text" class="form-text text-muted">Must be same with your password</small>
                                        </div>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="confirm-check" required="true">
                                        <label class="form-check-label" for="confirm-check">I agree to the <a href="#">term of use and privacy policy.</a></label>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block" style="background-color:#FF6E0E">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <footer class="fixed-bottom" style="background-color:#FF6E0E">
            <div class="col-12 text-center">
                <p><a href="login.php" class="text-light">log in instead?</a></p>
            </div>
        </footer>
    </div>

    <script>
        $(document).ready(function() {

            $("#form_signup").on('submit', function(e) {
                e.preventDefault();
                let username = $("#username").val().trim();
                let email = $("#email").val().trim();
                let password = $("#password-input").val();

                if (username != "" && email != "" && password != "") {
                    $.post("https://app.oderje.com/api/customer", {
                            function: "register",
                            username: username,
                            pass: password,
                            email: email
                        },
                        function(data1) {
                            if (data1.status == "ok") {
                                $.post("https://app.oderje.com/api/email", {
                                    function: "email_register",
                                    remail: email,
                                    cid: data1.cid
                                }, function(data) {
                                    if (data.status == "ok") {
                                        window.location.href = "register-pending.php";
                                    } else {
                                        alert("Username or E - mail already in used");

                                    }
                                }, "json");



                            } else {
                                alert("Username or E - mail already in used");
                            }
                        }, "json");
                }
            });

            $("#password-icon").click(function() {
                if ($("#password-toggle").hasClass("fa-eye")) {
                    $("#password-toggle").removeClass("fa-eye");
                    $("#password-toggle").addClass("fa-eye-slash");
                    $("#password-input").attr("type", "text");
                } else {
                    $("#password-toggle").removeClass("fa-eye-slash");
                    $("#password-toggle").addClass("fa-eye");
                    $("#password-input").attr("type", "password");
                }
            });
            $("#passwordCheck-icon").click(function() {
                if ($("#passwordCheck-toggle").hasClass("fa-eye")) {
                    $("#passwordCheck-toggle").removeClass("fa-eye");
                    $("#passwordCheck-toggle").addClass("fa-eye-slash");
                    $("#passwordCheck-input").attr("type", "text");
                } else {
                    $("#passwordCheck-toggle").removeClass("fa-eye-slash");
                    $("#passwordCheck-toggle").addClass("fa-eye");
                    $("#passwordCheck-input").attr("type", "password");
                }
            });
            $("#password-input").blur(function() {
                if ($("#password-input").val() != "") {
                    if ($("#password-input").val() != $("#passwordCheck-input").val()) {
                        $("#passwordCheck-text").removeClass("text-muted");
                        $("#passwordCheck-text").addClass("text-danger");
                        $("#passwordCheck-text").text("Password not match!");
                    } else {
                        $("#passwordCheck-text").removeClass("text-danger");
                        $("#passwordCheck-text").removeClass("text-muted");
                        $("#passwordCheck-text").addClass("text-success");
                        $("#passwordCheck-text").text("Password match");
                    }
                }
            });
            $("#passwordCheck-input").blur(function() {
                if ($("#passwordCheck-input").val() != "") {
                    if ($("#passwordCheck-input").val() != $("#password-input").val()) {
                        $("#passwordCheck-text").removeClass("text-muted");
                        $("#passwordCheck-text").addClass("text-danger");
                        $("#passwordCheck-text").text("Password not match!");
                    } else {
                        $("#passwordCheck-text").removeClass("text-danger");
                        $("#passwordCheck-text").removeClass("text-muted");
                        $("#passwordCheck-text").addClass("text-success");
                        $("#passwordCheck-text").text("Password match");
                    }
                } else {
                    $("#passwordCheck-text").removeClass("text-muted");
                    $("#passwordCheck-text").removeClass("text-success");
                    $("#passwordCheck-text").addClass("text-danger");
                    $("#passwordCheck-text").text("Password not match!");
                }
            });
        });
    </script>
</body>

</html>