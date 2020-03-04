<?php include_once("../view/product_page/grab-item-modal.php");?>
<div id="loading" class="bg-dark" style="width: 100%;height: 100%"></div>

<div id="content" class="container-fluid pb-5 d-none" style="margin-bottom:100px">
    <div class="accordion" id="accordian_div" style="position: sticky;">
        <div id="merchant_display" class="col-12 bg-warning card-header d-none">
            <label class="font-weight-bold">Merchant Name</label> :
            <label class="font-weight-bold" id="merchant_name"></label>
        </div>
        <div class="card ">
            <!-- <div class="card-header p-0 m-0 bg-warning" id="product_div">
                <button class="btn btn-link col-12" type="button" data-toggle="collapse" data-target="#collapse1">
					<span class="text-white text-outline-success"><b>Product</b></span><i class="float-right fas fa-th" style="font-size:24px"></i>
				</button>
            </div> -->

            <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordian_div">
                <div class="card-body parent_product p-1">
                    <!-- <div class="row parent_product"> -->
                    <?php //include("product-card.php")?>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <div class="card">
            <!-- <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordian_div" style="max-height: 100px;overflow-y: scroll;">
				<div class="card-body parent_package">
					
				</div>
			</div>
			<div class="card-header p-0 m-0 bg-warning" id="package_div">
				<button class="btn btn-link col-12" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
					<span class="text-white text-outline-success"><b>Package</b></span><i class="float-right fas fa-th" style="font-size:24px"></i>
				</button>
			</div> -->


        </div>

    </div>
</div>


<script>
    $(document).ready(function() {
        var product_list = new Array();

        var paging = 1;
        var row_count = 0;
        var prod_count = 0;

        let port_height = window.screen.height;
        let header_height = $("nav").outerHeight(true);
        let footer_height = $("footer").outerHeight(true);
        let product_div_height = $("#product_div").outerHeight(true);
        let package_div_height = $("#package_div").outerHeight(true);
        var data_var = {};
        var var_array = new Array();
        var cur_var = {};
        var cur_var_list;
        if (!$(".fixed-bottom").hasClass("d-none")) {
            //console.log("ade footer");
            last_height = port_height - header_height - footer_height - product_div_height - package_div_height - 5;

        } else {
            //console.log("xde footer");
            last_height = port_height - header_height - product_div_height - package_div_height - 5;
        }

        $("#collapse1").css("max-height", last_height);
        $("#collapse2").css("max-height", last_height);

        $(window).resize(function() {
            let port_height = window.screen.height;
            let header_height = $("nav").outerHeight(true);
            let footer_height = $("footer").outerHeight(true);
            let product_div_height = $("#product_div").outerHeight(true);
            let package_div_height = $("#package_div").outerHeight(true);

            if (!$(".fixed-bottom").hasClass("d-none")) {

                last_height = port_height - header_height - footer_height - product_div_height - package_div_height - 5;

            }

            $("#collapse1").css("max-height", last_height);
            $("#collapse2").css("max-height", last_height);
        });


        screenChange();
        initialize();

        function screenChange() {
            window.onscroll = function() {

            }
        }

        function initialize() {

            var search = "";
            if ($_GET['merchant_name']) {
                search = $_GET['merchant_name'];
                $("#merchant_display").removeClass("d-none");
                $("#merchant_name").text(search.replace("_", " "););
            } else {
                search = $_GET['search'];
            }
            $.post(oderje_url + "api/package_product", {
                    function: "get_list",
                    search: search
                },
                function(data) {
                    // console.log(data);
                    if (data.list_product) {
                        prod_count = data.list_product.length;
                        var setView = 0;
                        // prod_count = 5;
                        for (var i = 0; i < prod_count; i++) {
                            if (i % 4 == 0) //create div row that hold 4 view of product card
                            {
                                setView = row_count;
                                var html = '<div class="row ' + row_count + ' p-1"></div>';
                                $(".parent_product").append(html);
                                row_count++;
                            }

                            var temp = new Product(data.list_product[i]);
                            product_list.push(temp);

                            $(".row." + setView).append(temp.productView());

                        }

                    } else {
                        $(".parent_product").append("Search product not available");
                        $(".parent_package").append("Search package not available");

                    }
                }, "json").
            done(function() {

                let max = 0;
                $(".grab_btn").on('click', function() {
                    grabItem($(this));
                });
                $(".product_card").each(function() {

                    if (max < $(this).outerHeight(true)) {
                        max = $(this).outerHeight(true);
                    }

                });
                //console.log(max);
                $(".product_card").css("min-height", 310);
                // alert("ui");
                $("#loading").addClass("d-none");
                $("#content").removeClass("d-none");
            });


        }

        function grabItem(btn) {
            var pbm_id = btn.find("input").val();
            //console.log(z);


            let cur_product = find(product_list, pbm_id);

            modal_setup(cur_product);
            //console.table(cur_product.getpbm_id());
        }

        function find(list, pbm_id) {
            function check(node) {
                return node.pbm_id == pbm_id;
            }

            return product_list.find(check);
        }

        function modal_setup(p) {
            // console.log(p);
            // console.log(p);
            var temp = (new Date()).toString();
            $(".options_variation").empty();

            $("#p_name").text((p.p_name) ? p.p_name : "Not Available");
            $("#store_name").text((p.store_name) ? p.store_name : "Not Available");
            $("#location").text((p.location) ? p.location : "Not Available");
            $("#exact_price").text(((parseFloat)(p.exact_price) ? p.exact_price : "0.00").toFixed(2));
            $(".pbm_id").val((p.pbm_id) ? p.pbm_id : "null");
            $("#quantity").val("0");
            let img_url = (p.p_img) ? oderje_url + "images/product/" + p.p_img + "?" + temp : "https://www.oderje.com/img/products/generic-product.jpg?" + temp;
            $("#image_slider").find('img').attr('src', img_url);
            $("#quantity").val("1");
            try {
                if (p.promotion_list[0].DISCOUNT_VALUE) {
                    $(".percentage_value").text(p.promotion_list[0].DISCOUNT_VALUE);
                    $(".discount").removeClass("d-none");
                    $(".exact_price").text(p.p_price.toFixed(2));
                }

            } catch (e) {


            }

            if (p.rating) {
                //console.log(p.rating);
                let yellow = p.rating;
                let black = 5 - yellow;

                for (var i = 0; i < yellow; i++) {
                    $("#star_rating").append('<i class="fas fa-star text-warning"></i>');
                }
                for (var i = 0; i < black; i++) {
                    $("#star_rating").append('<i class="fas fa-star"></i>');
                }

            }

            if (p.variation_list) {

                // console.log(p);
                var label = p.variation_list.type_of_variation;
                for (var j = 0; j < label.length; j++) {

                    try {
                        $(".options_variation").append(createOption(label[j], p.variation_list[label[j]]));
                        data_var[label[j]] = p.variation_list[label[j]][0];


                    } catch (e) {

                    }


                }
                triggerVariation(label);

                cur_var = getVariationDetail(p.variation_opt, data_var);
                cur_var_list = p.variation_opt;
                console.log(cur_var);

                if (cur_var) {
                    $("#exact_price").text((cur_var.actual_price / 100).toFixed(2));
                }

            }

            $("#quantity").val("1");


        }
        $("#add_to_backet_btn").on('click', function() {
            if (!$_USER['cid']) {
                alert("Please Login");
                window.location.href = "../login.php?d=" + url_encode("backpath=" + $_USER['path']);

            }
            let pbm_id = $(this).find('input').val();
            let cust_id = $_USER['cid'];
            let quantity = $("#quantity").val();

            if (parseInt(quantity) > 0) {

                $.post(oderje_url + "api/customer_basket", {
                        function: "insert_basket",
                        pbm_id: pbm_id,
                        cid: cust_id,
                        quantity: quantity,
                        var_option: JSON.stringify(cur_var)
                    },
                    function(data) {
                        if (data.status == "ok") {
                            alert("Succesfully add to basket");
                            //window.location.href = "../basket/";
                        } else {
                            alert("Try again, check internet connection");
                        }
                    }, "json");
            } else {

                alert("Please add quantity, minimum 1 item");
            }

        });

        function createOption(label, option) {
            var html = "";

            html += '	<div class="col-12 my-1 text-right option_list">';
            html += '	<label class="my-auto float-left">' + label + '</label>';
            html += '		<div class="float-right btn-group btn-group-toggle" data-toggle="buttons">';

            for (var i = 0; i < option.length; i++) {



                if (i == 0) {
                    html += '			<label class="btn btn-outline-primary btn-sm active btn-var">';
                    html += '				<input type="radio" name="' + label + '" autocomplete="off" checked>';
                } else {
                    html += '			<label class="btn btn-outline-primary btn-sm btn-var">';
                }
                html += '				<input type="radio" name="' + label + '" autocomplete="off">';
                html += option[i];
                html += '			</label>';

            }

            // html +='			<label class="btn btn-primary btn-sm active">';
            // html +='				<input type="radio" name="options" autocomplete="off" checked> Medium';
            // html +='			</label>';
            // html +='			<label class="btn btn-primary btn-sm">';
            // html +='				<input type="radio" name="options" autocomplete="off"> Large';
            // html +='			</label>';
            html += '		</div>';
            html += '	</div>';


            return html;
        }

        function triggerVariation(label) {
            // data_var = [];

            $(".btn-var").change(function() {
                if (label) {



                    for (var i = 0; i < label.length; i++) {
                        var cur_val = $("input[name='" + label[i] + "']:checked").parent().text().trim();
                        var_array.push(cur_val);
                        data_var[label[i]] = cur_val;
                    }

                    cur_var = getVariationDetail(cur_var_list, data_var);

                    console.log(cur_var);

                    if (cur_var) {
                        $("#exact_price").text((cur_var.actual_price / 100).toFixed(2));
                    }

                    // console.log(data_var);
                }


            });


        }

        function getVariationDetail(var_list, data_var) {
            var value = Object.values(data_var);
            var key = Object.keys(data_var);

            var jima = new Array();
            for (let i = 0; i < key.length; i++) {
                if (i == 0) {
                    jima = filterVariation(var_list, key[i], value[i]);
                } else {
                    jima = filterVariation(jima, key[i], value[i]);
                }
            }
            return jima[0];
        }

        function filterVariation(variation_option, label, value) {
            // console.log(variation_option,label,value);


            var temp_list = variation_option.filter(function(node1) {
                return (node1[label] == value);
            });

            // console.log(temp_list);
            return temp_list;

        }

        function objToArray(data_var) {
            var element = Object.keys(data_var);
            var value = Object.values(data_var);
            var temp = new Array();

            for (var i = 0; i < element.length; i++) {
                temp[element[i]] = value[i];
            }
            temp['length'] = element.length;
            return temp;
        }
    });
</script>