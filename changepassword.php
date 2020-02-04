<!DOCTYPE html>
<html>
<?php include_once("head/head.php"); ?>

<body style="background-color:#FF6E0E">

    <?php include_once("controller/user.php"); ?>
    <div class="container-fluid">
        <div class="row" style="margin-top:80px">
            <div class="col-md-2 col-1"></div>

            <div class="col-md-8 col-10 box bg-light bubble-high p-3" id="success_div">

                <div class="col-md-12 col-12 mt-2 text-center  " id="img_btn">
                    <img src="img/oderje-logo.png?" class="img-fluid w-50 ">
                </div>
                <form id="form_change" class="form-group row">
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
                    <div class="col-12 mt-3 row mx-auto">

                        <button type="submit" class="btn btn-info login_btn text-center mt-3">Submit</button>

                    </div>
                </form>

            </div>
            <div class="col-md-2 col-1 "></div>
        </div>
    </div>
</body>



<script>
    $(document).ready(function() {

        $("#form_change").on('submit', function(e) {
            e.preventDefault();
            let password = $("#password-input").val();

            if (password != "") {
                $.post("https://app.oderje.com/api/forgotpassword", {
                        function: "confirm_changepassword",
                        c_id: $_GET['specialID'],
                        password: password,
                    },
                    function(data) {
                        if (data.status == "ok") {
                            alert("Password successfully change");
                            window.location.href = "login.php";
                        } else {
                            alert("Please Try again");
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

</html>