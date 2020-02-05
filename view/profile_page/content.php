<div class="container mt-2" style="margin-bottom:50px">
    <div class="card border-white text-center">
        <div class="card-header">
            <b>My Profile</b>
        </div>
        <div class="row" id="preview">
            <div class="col-md-3 mt-3">
                <img src="https://app.oderje.com/images/avatar.png" class="rounded mx-auto d-block" alt="user-avatar" width="100%">
            </div>
            <div class="col-md-9">
                <table id="tablePreview" class="table table-sm table-borderless text-left mt-3">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td id="userFullname"></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td id="username"></td>
                        </tr>
                        <tr>
                            <th>E-mail</th>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>+6<span id="phone"></span></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>
                                <span id="address"></span><br>
                                <span id="postcode"></span>, <span id="state"></span><br>
                                <span id="country"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td id="gender"></td>
                        </tr>
                        <tr>
                            <th>D.O.B</th>
                            <td id="dob"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <button class="btn btn-sm btn-light" id="edit-profile">
                            Edit&nbsp;<i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="preview-form">
            <div class="col-md-3 mt-3">
                <img src="https://app.oderje.com/images/avatar.png" class="rounded mx-auto d-block" alt="user-avatar" width="100%">
            </div>
            <div class="col-md-9">
                <form id="form-profile">
                    <table id="tablePreview" class="table table-sm table-borderless text-left mt-3">
                        <tbody>
                            <tr>
                                <th>Name <span style="color:red">*</span></th>
                                <td><input type="text" class="form-control form-control-sm" id="userFullnameform" name="userFullname" value="" required></td>
                            </tr>
                            <tr>
                                <th>Username <span style="color:red">*</span></th>
                                <td><input type="text" class="form-control form-control-sm" id="usernameform" name="username" value="" readonly required></td>
                            </tr>
                            <tr>
                                <th>E-mail <span style="color:red">*</span></th>
                                <td><input type="text" class="form-control form-control-sm" id="emailform" name="email" value="" required></td>
                            </tr>
                            <tr>
                                <th>Phone <span style="color:red">*</span></th>
                                <td>
                                    <div class="form-group form-inline"> +6 &nbsp;<input type="text" class="form-control form-control-sm" id="phoneform" name="phone" value="" required></div>
                                </td>
                            </tr>
                            <tr>
                                <th>Address <span style="color:red">*</span></th>
                                <td>
                                    <input type="text" class="form-control form-control-sm mb-2" id="addressform" placeholder="Address" name="address" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Postcode <span style="color:red">*</span></th>
                                <td>
                                    <input type="number" class="form-control form-control-sm mb-2" id="postcodeform" placeholder="postcode" name="postcode" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>State <span style="color:red">*</span></th>
                                <td>
                                    <input type="text" class="form-control form-control-sm mb-2" id="stateform" placeholder="state" name="state" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Country <span style="color:red">*</span></th>
                                <td>
                                    <input type="text" class="form-control form-control-sm" id="countryform" placeholder="country" name="country" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Gender <span style="color:red">*</span></th>
                                <td>
                                    <select class="form-control form-control-sm" id="genderform" name="gender" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <th>D.O.B <span style="color:red">*</span></th>
                                <td><input type="date" class="form-control form-control-sm" id="dobform" name="dob" value="" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <button class="btn btn-sm btn-light" id="cancel-profile">
                                Back&nbsp;<i class="fas fa-arrow-left"></i>
                            </button>
                            <button type="submit" class="btn btn-sm btn-light" id="save-profile">
                                Save&nbsp;<i class="fas fa-save"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        if (!$_USER['login_status']) {
            window.location.href = "../login.php?d=" + url_encode("backpath=" + $_GET['path']);
        }


        $.post("https://app.oderje.com/api/customer", {
                function: "getprofile",
                username: $_USER['username']
            },
            function(data1) {
                if (data1.status == "ok") {

                    $("#userFullname").text(data1.fullname);
                    $("#username").text($_USER['username']);
                    $("#email").text(data1.email);
                    $("#phone").text(data1.phone);
                    $("#address").text(data1.address);
                    $("#postcode").text(data1.postcode);
                    $("#state").text(data1.state);
                    $("#country").text(data1.country);
                    $("#gender").text(data1.gender);
                    $("#dob").text(data1.dob);

                    $("#userFullnameform").val(data1.fullname);
                    $("#usernameform").val($_USER['username']);
                    $("#emailform").val(data1.email);
                    $("#phoneform").val(data1.phone);
                    $("#addressform").val(data1.address);
                    $("#postcodeform").val(data1.postcode);
                    $("#stateform").val(data1.state);
                    $("#countryform").val(data1.country);
                    $("#genderform").val(data1.gender);
                    $("#dobform").val(data1.dob);

                } else {
                    alert("Error db");
                    return;
                }
            }, "json");


        $("#preview").show();
        $("#preview-form").hide();
        $("#edit-profile").show();
        $("#save-profile").hide();
        $("#cancel-profile").hide();


        $("#edit-profile").on('click', function(e) {

            e.preventDefault();

            $("#preview-form").show();
            $("#preview").hide();
            $("#save-profile").show();
            $("#cancel-profile").show();
            $("#edit-profile").hide();


        });


        $("#cancel-profile").on('click', function(e) {

            e.preventDefault();

            $("#preview").show();
            $("#preview-form").hide();
            $("#edit-profile").show();
            $("#save-profile").hide();
            $("#cancel-profile").hide();

        });

        $("#form-profile").on('submit', function(e) {

            e.preventDefault();

            let cid = $_USER['cid'];
            let name = $("#userFullnameform").val().trim();
            let email = $("#emailform").val().trim();
            let phone = $("#phoneform").val().trim();
            let address = $("#addressform").val().trim();
            let postcode = $("#postcodeform").val().trim();
            let state = $("#stateform").val().trim();
            let country = $("#countryform").val().trim();
            let gender = $("#genderform").val().trim();
            let dob = $("#dobform").val().trim();

            dob = dob.split("/").reverse().join("-");

            if (name != "" && email != "" && phone != "" && address != "" && postcode != "" && state != "" && country != "" && gender != "" && dob != "") {
                $.post("https://app.oderje.com/api/editprofile", {
                        function: "edit_profile",
                        cid: cid,
                        name: name,
                        email: email,
                        phone: phone,
                        address: address,
                        postcode: postcode,
                        state: state,
                        country: country,
                        gender: gender,
                        dob: dob
                    },
                    function(data1) {
                        if (data1.status == "ok") {
                            alert("Data save successfully");
                            location.reload();


                        } else {
                            alert("Try Again");
                        }
                    }, "json");
            }

        });



    });
</script>
<!-- <?php include '../inc/back-to-top-button.php' ?> -->