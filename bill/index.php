<!DOCTYPE html>
<html>
<?php include_once("../head/head-child.php");?>

<body>
    <?php include_once("../controller/user.php");?>
    <?php //include_once("../view/common/navbar.php");?>
    <div class="container mt-3">
        <div class="row text-center">
            <div class="col-12 h4">Your Order</div>
        </div>
        <div class="row text-center">
            <div class="col-12 h5">Number</div>
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
        <div class="row ">
            <div class="col-12 text-center">
                <button class="btn btn-success order_link">View Order Detail</button>
                <button class="btn btn-success back_btn">Back</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            //var temp = ($_GET['bill_code']).substring(10,16);
            //console.log(temp);
            $("#bill_code").text(($_GET['bill_code']).substring(14, 19));
            // $("#bill_code").text(($_GET['bill_code']));

            $(".order_link").click(function(){
                window.location.href= "../order";

            });

            $(".back_btn").click(function(){
                window.location.href ="../index.php";
            });
        });
    </script>
</body>

</html>