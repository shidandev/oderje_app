<div class="container mt-2" style="margin-bottom:50px">
    <div class="card border-white text-center">
        <div class="card-header">
            <b>My Profile</b>
        </div>
        <div class="row">
            <div class="col-md-3">
                <img src="https://app.oderje.com/images/avatar.png" class="rounded mx-auto d-block" alt="user-avatar" width="100%">
            </div>
            <div class="col-md-9">
                <table id="tablePreview" class="table table-sm table-borderless text-left">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>Muhammad Amin bin Mohd Faudzi</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>aminfaudzi</td>
                        </tr>
                        <tr>
                            <th>E-mail</th>
                            <td>aminfaudzi@gmail.com</td>
                        </tr>
                        <tr>
                            <th>Telephone</th>
                            <td>+6 018 4633273</td>
                        </tr>
                        <tr>
                            <th>Adress</th>
                            <td>
                                24, Taman Anggerik<br>
                                Jalan Junjong, 09000 Kulim,<br>
                                Kedah, Malaysia
                            </td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>Male</td>
                        </tr>
                        <tr>
                            <th>D.O.B</th>
                            <td>14 January 1992</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 text-center">
            <button class="btn btn-sm btn-light">
                Edit&nbsp;<i class="fas fa-edit"></i>
            </button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        if(!$_USER['login_status'])
        {
           window.location.href = "../login.php?d="+url_encode("backpath="+$_GET['path']);
        }
    });
</script>
<!-- <?php include '../inc/back-to-top-button.php' ?> -->