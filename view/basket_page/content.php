<?php include_once("basket-quantity-modal.php")?>
<div class="container-fluid" style="margin-bottom:120px">
  <div class="accordion" id="accordianGeneralStore">
    <!-- <div class="card border-white">
        <div class="card-header border-light" id="headingStore1" data-toggle="collapse" data-target="#collapseStore1"
          aria-expanded="false" aria-controls="collapseStore1" style="background-color:#EDF1FF">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="storeCheck1">
            <label class="form-check-label" for="storeCheck1">
              <span id="store-name">
                Store Name
              </span>
            </label>
            <br>
            <span id="store-location">
              <small>Location</small>
            </span>
            <i class="fas fa-chevron-down fa-xs float-right text-secondary"></i>
          </div>
        </div>
        <div id="collapseStore1" class="collapse" aria-labelledby="headingStore1" data-parent="#accordianGeneralStore">
          <div class="card-body">
            <div class="row">
              <div class="col-xl-3 col-md-6">
                <div class="card border-light">
                  <div class="card-body">
                    <div class="form-check text-center">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    </div>
                  </div>
                  <img src="https://app.oderje.com/images/product/'+this.p_img+'" class="card-img-top mx-auto" style="width:200px" alt="Product Name">
                  <div class="card-body">
                    <div class="card-title overflow-hidden" style="height:20px">
                      <span>'+this.p_name+'</span>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center text-secondary">
                        <small id="productQuantity">'+this.p_quantity+'</small>&times;
                        <small>RM&nbsp;<span id="productPrice">'+this.p_price+'</span></small>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center" style="color:#FF9933">
                        <span>RM '+(this.p_quantity*this.p_price)+'</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center btn btn-sm btn-light" data-toggle="modal" data-target="#editQuantityModal">
                        <small>Edit</small>
                      </div>
                    </div>
                  </div>
              </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card border-light">
                  <div class="card-body">
                    <div class="form-check text-center">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    </div>
                  </div>
                  <img src="https://app.oderje.com/images/product/'+this.p_img+'" class="card-img-top mx-auto" style="width:200px" alt="Product Name">
                  <div class="card-body">
                    <div class="card-title overflow-hidden" style="height:20px">
                      <span>'+this.p_name+'</span>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center text-secondary">
                        <small id="productQuantity">'+this.p_quantity+'</small>&times;
                        <small>RM&nbsp;<span id="productPrice">'+this.p_price+'</span></small>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center" style="color:#FF9933">
                        <span>RM '+(this.p_quantity*this.p_price)+'</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center btn btn-sm btn-light" data-toggle="modal" data-target="#editQuantityModal">
                        <small>Edit</small>
                      </div>
                    </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        
      </div> -->
    <div class="card border-white">
      <div class="card-body" style="background-color:#EDF1FF">
        <div class="row">
          <div class="col-8">
            Total selected items&#58;
          </div>
          <div class="col-4 text-right" id="total_product">
            0
          </div>
        </div>
        <div class="row">
          <div class="col-5">
            Total Price&#58;
          </div>
          <div class="col-7 text-right" style="font-size:larger">
            RM&nbsp;<span id="totalPrice">0</span>
          </div>
        </div>
        <div class="row border-top border-dark justify-content-center mt-2 mb-md-n3">
          <div class="col-12 mt-md-4">
            <form action="">
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-3 col-form-label text-md-right">Purchase type:</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                      <option selected>-choose-</option>
                      <option value="1">Self Collect</option>
                      <option value="2" disabled="">Delivery (Coming Soon)</option>
                      <!-- <option value="3">In-store (coming soon)</option> -->
                    </select>
                    <div class="input-group-append">
                      <button class="btn btn-dark" type="button">
                        Checkout&nbsp;&nbsp;<i class="fas fa-shopping-bag"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    var basket_list = new Array();

    $.post(oderje_url + "api/customer_basket", {
      function: "get_basket",
      c_id: $_USER['cid'],
      group: "yes"

    }, function (data) {
      if (data) {
        list = data;
        for (let i = 0; i < data.length; i++) {
          var temp = new BasketByMerchant(data[i]);

          $("#accordianGeneralStore").prepend(temp.BasketByMerchantView());
          for (let j = 0; j < data[i].basket.length; j++) {
            basket_list.push(data[i].basket[j]);

          }
        }
      }
      else {


      }
    }, "json").
      done(function (data) {
        //console.log(basket_list);

        var products = new Array();
        var price = 0;
        var total_product = 0;

        $(".edit_btn").on("click", function () {
          let pbm_id = $(this).find(".pbm_id").val();
          modal_setup(find(basket_list, pbm_id));
        });

        //console.log($(".storeCheck1"));
        // $("#storeCheck1").on("click",function(){
        //   let check_btn = $(this).parent().parent().parent().find(".child-check");

        // });

        $('.storeCheck1:checkbox').change(function (e) {

          e.stopPropagation();

          var check_btn = $(this).parent().parent().parent().find(".child-check");
          var cb_id = new Array();

          if ($(this).is(':checked')) {
            $(this).parent().parent().parent().find(".pbm_id").each(function () {
              var temp = find(basket_list, $(this).val());
              price += (temp['p_price'] * temp['p_quantity']);
              check_btn.prop('checked', true);
              total_product += parseInt(temp['p_quantity'], 10);
            });
          }
          else {
            $(this).parent().parent().parent().find(".pbm_id").each(function () {
              var temp = find(basket_list, $(this).val());
              price -= (temp['p_price'] * temp['p_quantity']);
              $("#totalPrice").text(price);
              check_btn.prop('checked', false);
              // total_product-=check_btn.length;
              total_product -= parseInt(temp['p_quantity'], 10);
            });
          }
          $("#totalPrice").text(price);
          $("#total_product").text(total_product);

        });


      });

    function modal_setup(p) {
      var temp = (new Date()).toString();
      $("#p_name").text((p.p_name) ? p.p_name : "Not Available");
      $("#pbm_id").val((p.pbm_id) ? p.pbm_id : "null");
      $("#cb_id").val((p.cb_id) ? p.cb_id : "null");
      $(".cb_id").val((p.cb_id) ? p.cb_id : "null");
      $("#quantity").val(p.p_quantity);
      let img_url = (p.p_image) ? "https://app.oderje.com/images/product/" + p.p_image + "?" + temp : "https://www.oderje.com/img/products/generic-product.jpg?" + temp;
      $("#image").attr('src', img_url);

      $("#add_item_btn").on("click", function () {

        let cb_id = $(this).parent().find("#cb_id").val().trim();
        let quantity = $("#quantity").val().trim();

        $.post(oderje_url + "api/customer_basket", {
          function: "update_basket",
          cb_id: cb_id,
          quantity: quantity

        }, function (data) {
          if (data.status == "ok") {
            window.location.reload();
          }
        }, "json")

      });
      $(".delete_item_btn").on("click", function () {

        let cb_id = $(this).parent().find(".cb_id").val().trim();


        $.post(oderje_url + "api/customer_basket", {
          function: "delete_basket",
          cb_id: cb_id

        }, function (data) {
          if (data.status == "ok") {
            window.location.reload();
          }
        }, "json")

      });


    }

    function find(list, pbm_id) {
      function check(list) {
        return list.pbm_id == pbm_id;
      }

      return list.find(check);
    }

  });
</script>