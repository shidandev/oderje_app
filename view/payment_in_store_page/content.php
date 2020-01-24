<div class="container-fluid" style="margin-bottom:100px">
    <div class="card border-white">
        <div class="card-header bg-white border-light">
            <h4 class="text-center">Order Confirmation</h4>
            <h5 class="text-center">In-Store Purchase</h5>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="card-body">
                            <b>Item list</b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="accordionItemList">

                            <!-- <div class="card root">
                                <div class="card-header " id="headingItemList1" data-toggle="collapse" data-target="#collapseItemList1" aria-expanded="true" aria-controls="collapseItemList1">
                                    <div class="row ">
                                        <div class="col-11 ">
                                            Store Name <br>
                                            <small>Location</small>
                                        </div>
                                        <div class="col-1 text-right my-auto pl-0 m-0">
                                            <i class="fas fa-chevron-down  text-secondary"></i>
                                        </div>
                                    </div>
                                </div>

                                <div id="collapseItemList1" class="collapse card-header" aria-labelledby="headingItemList1" data-parent="#accordionItemList">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 border p-3 my-1">
                                            <div class="col-12 text-center">
                                                <img src=" https://app.oderje.com/images/product/5.png " class="card-img-top mx-auto " style="width:200px;min-height:200px;max-height: 100px;" alt="Product Name ">
                                            </div>
                                            <div class="col-12 text-center">Product Name</div>
                                            <div class="col-12 text-center text-primary font-weight-bold"><small>3 x RM 150</small></div>
                                            <div class="col-12 text-center font-weight-bold" style="color:#FF9933">RM 150</div>
                                        </div>

                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 ">
                <?php include 'paymentMethodOCPanel.php'; ?>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $("#oderjePrepaid").attr("checked", true);

        $("#pay_btn").on("click", function() {
            console.log("proceed payment");
        });

        if (localStorage.data) {


            try {
                var data = JSON.parse(localStorage.data);
                var lel = new CheckOutMerchant(data);
                console.log(data);
                if (data) {
                    $("#accordionItemList ").append(lel.CheckOutByMerchantView());
                    $("#customerName").text($_USER['name']);

                    var count = 0;
                    var total_price = 0;
                    for (let i = 0; i < data.basket.length; i++) {
                        count += parseInt(data.basket[i].p_quantity);
                        total_price += parseInt(data.basket[i].p_quantity) * (parseFloat(data.basket[i].p_price) / 100);
                    }

                    $("#total_item").text(count);
                    $("#total_price").text((total_price).toFixed(2));
                    $("#amount_need_to_pay").text(total_price.toFixed(2));
                }
            } catch (e) {}

        } else {
            alert("Please back to basket to check out ");

        }


    });
</script>