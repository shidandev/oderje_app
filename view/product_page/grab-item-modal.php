<div class="modal fade modal-grab-item" tabindex="-1" role="dialog" aria-labelledby="modal-grab-item"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="card border-light">
                <div class="col-12 text-right">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="carouselNavigator" class="carousel slide" data-interval="5000"
                                data-ride="carousel">
                                <div class="carousel-inner" id="image_slider">
                                    <div class="carousel-item active text-center">
                                        <img style=" display: center;max-width:150px;max-height:150px;width: auto;height: auto;" src="https://www.oderje.com/img/products/generic-product.jpg"
                                            class="w-75 float-" alt="Product image">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img style=" display: center;max-width:150px;max-height:150px;width: auto;height: auto;" src="https://www.oderje.com/img/products/generic-product.jpg"
                                            class="w-75 float-" alt="Product image">
                                    </div>
                                   <!--  <div class="carousel-item">
                                        <img src="http://localhost/oderje.com/img/products/generic-product.jpg"
                                            class="d-block w-100" alt="Product image">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="http://localhost/oderje.com/img/products/generic-product.jpg"
                                            class="d-block w-100" alt="Product image">
                                    </div> -->
                                </div>
                                <a class="carousel-control-prev" href="#carouselNavigator" role="button"
                                    data-slide="prev">
                                    <i class="fas fa-angle-left text-dark" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselNavigator" role="button"
                                    data-slide="next">
                                    <i class="fas fa-angle-right text-dark" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-title overflow-hidden" style="height:40px">
                                <h6>
                                    <span id="p_name">hah</span>
                                </h6>
                            </div>
                            <small class="text-secondary">
                                <span id="store_name">Store Name</span> | <span id="location">location</span>
                            </small>
                            <div style="font-size:12px" id="star_rating">
                                <!-- <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i> -->
                                <span id="badge-delivery" class="badge badge-pill badge-white text-success float-right">
                                    <i class="fas fa-truck"></i>&nbsp;Delivery
                                </span>
                                <span id="badge-promo" class="badge badge-pill badge-white text-danger float-right">
                                    <i class="fas fa-fire"></i>&nbsp;Hot
                                </span>
                                <span id="badge-liked" class="badge badge-pill badge-white text-warning float-right">
                                    <i class="fas fa-heart"></i>&nbsp;Favourite
                                </span>
                            </div>
                            <div class="card-header border-light" style="height:120px">
                                <span id="price-slash" class="text-secondary" style="font-size:10px">
                                    <s>
                                        RM&nbsp;300.00
                                    </s>&nbsp;
                                </span>
                                <span id="price-selling">
                                    <b>
                                        RM&nbsp;<span id="exact_price">150.00</span>
                                    </b>
                                    &nbsp;<small class="text-primary">-50%</small>
                                </span>
                                <p id="price-slash" class="text-secondary" style="font-size:10px">
                                    <span id="price-slash-cond1">
                                        [ End: <span id="">[21/32/2132]</span> ]&nbsp;
                                        <span id="badge-promo" class="badge badge-pill badge-info">
                                            <i class="fas fa-tag"></i>&nbsp;Promo
                                        </span>
                                    </span>
                                    <br>
                                    <span id="price-slash-cond2">
                                        [ Limited to 10 unit(s) only ]&nbsp;
                                        <span id="badge-promo" class="badge badge-pill badge-info">
                                            <i class="fas fa-tag"></i>&nbsp;Promo
                                        </span>
                                    </span>
                                </p>
                                <p class="col-12 text-center" style="font-size:10px">
                                    tag1, tag2, tag3, tag4, tag5
                                </p>
                            </div>
                            <div class="row mt-1 d-none">
                                <div class="col-12 text-right">
                                    <label><small>Variation 1 :</small></label>
                                    <select class="form-control-sm">
                                        <option>Default select</option>
                                    </select>
                                </div>
                                <div class="col-12 text-right">
                                    <label><small>Variation 2 :</small></label>
                                    <select class="form-control-sm">
                                        <option>Default select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-6 text-right">
                                    <label><small>Quantity :</small></label>
                                </div>
                                <div class="col-6">
                                    <input class="form-control-sm" id="quantity" type="number" value="0" min="0" max="100" step="1" />
                                </div>
                            </div>
                            <div class="mt-2 text-right">
                                <button type="button" id="add_to_backet_btn" data-toggle="modal" data-target=".modal-grab-item" class="btn btn-sm text-white" style="background:#FC9732">
                                    <input class="pbm_id" type="hidden" >
                                    Add to basket&nbsp;<i class="fas fa-shopping-basket"></i>
                                </button>
                                <button class="btn btn-sm btn-dark d-none">
                                    <input class="pbm_id" type="hidden" >
                                    Fast Checkout&nbsp;&nbsp;<i class="fas fa-fighter-jet"></i>
                                </button>
                            </div>
                            <script>
                                $("#add_to_backet_btn").on('click',function(){
                                    if(!$_USER['cid'])
                                    {
                                        alert("Please Login");
                                        window.location.href = "../login.php?d="+url_encode("backpath="+$_USER['path']);

                                    }
                                    let pbm_id = $(this).find('input').val();
                                    let cust_id = $_USER['cid'];
                                    let quantity = $("#quantity").val();

                                    if(parseInt(quantity) > 0)
                                    {
                                        $.post(oderje_url+"api/customer_basket",
                                        {
                                            function:"insert_basket",
                                            pbm_id:pbm_id,
                                            cid:cust_id,
                                            quantity:quantity
                                        },
                                        function(data){
                                            if(data.status == "ok")
                                            {
                                                //alert("Succesfully add to basket");
                                                window.location.href = "../basket/";
                                            }
                                            else{
                                                alert("Try again, check internet connection");
                                            }
                                        },"json");
                                    }
                                    
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("input[type='number']").inputSpinner();


</script>