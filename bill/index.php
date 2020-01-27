<!DOCTYPE html>
<html>
<?php include_once("../head/head-child.php");?>

<body>
    <?php include_once("../controller/user.php");?>
    <?php include_once("../view/common/navbar.php");?>
    <div class="container mt-3">
        <div class="row text-center">
            <div class="col-12 h4">Your order</div>
        </div>
        <div class="row text-center">
            <div class="col-12 h5">Bill number</div>
        </div>
        <div class="row text-center my-5">
            <div class="col-12 h5">
                <span class="font-weight-bold" id="bill_code"></span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12 h5">Please Wait...</div>
            <div class="col-12 h5">Thank you</div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#bill_code").text($_GET['bill_code']);
        });
    </script>
</body>

</html>