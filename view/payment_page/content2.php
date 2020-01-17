<?php include_once("voucher-edit-modal.php");?>
<div class="container-fluid" style="margin-bottom:100px">
  <div class="card border-white">
    <div class="card-header bg-white border-light">
      <h4 class="text-center">Order Confirmation</h4>
      <h5 class="text-center">In-Store Purchase</h5>
    </div>
    <div class="row">
      <div class="col-xl-6">
        <div class="row d-none">
          <div class="col-12 text-center">
            <div class="card-body">
              <b>Item list</b>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div id="accordionItemList">
              <div class="card">
                <div class="card-header" id="headingItemList1" data-toggle="collapse" data-target="#collapseItemList"
                  aria-expanded="true" aria-controls="collapseItemList1">
                  <span id="merchant_name">
                    Store Name
                  </span>
                  </label>
                  <br>
                  <span id="store-location">
                    <small id="merchant_location">Location</small>
                  </span>
                  <i class="fas fa-chevron-down fa-xs float-right text-secondary"></i>
                </div>
                <div id="collapseItemList1" class="collapse" aria-labelledby="headingItemList1"
                  data-parent="#accordionItemList">
                  <div class="card-body">
                    <div class="row">
                      <div class="card border-white">
                        <div class="card-body">
                          <div class="row">
                            <!-- <?php include '../../inc/orderConfirmProductCard.php'; ?>
                            <?php include '../../inc/orderConfirmProductCard.php'; ?>
                            <?php include '../../inc/orderConfirmProductCard.php'; ?>
                            <?php include '../../inc/orderConfirmProductCard.php'; ?>
                            <?php include '../../inc/orderConfirmProductCard.php'; ?>
                            <?php include '../../inc/orderConfirmProductCard.php'; ?> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6">
        <?php include 'paymentMethodOCPanel.php'; ?>
      </div>
      <div class="col-xl-6 text-center">
        <button class="btn btn-outline-success font-weight-bold" id="request_pin">Pay</button>

        <input id="key" class="form-control mt-3 text-center font-weight-bold d-none" placeholder="X X X X X X">
        <button class="btn btn-outline-success font-weight-bold mt-1 d-none" id="proceed_payment">Pay</button>
      </div>
    </div>
  </div>
</div>

<script>
  
  $(document).ready(function(){
    var cid = $_USER['cid'];
    var key = $_USER['key'];
    var cur_vh_id = 0;
    var deduction_for_voucher = 0;
    var prepaid_balance = 0;
    var use_pin = true;
    var dom_prepaid_balance = $(".prepaid_balance");
    var payment_method = "";


    initializer();

    $("#oderjePrepaid").change(function(e){
     
      payment_method = ($(this).is(":checked"))? "oderje_wallet":"";

      $(this).attr("checked",($(this).is(":checked"))? false:true);
    });
    $("#request_pin").on("click",function(e){

      if(payment_method == "")
      {
        alert("Please pick payment method");
        return;
      }
            
      let vt_id = "";
      let vt_idArr = new Array();
      let t_id = "";
      let t_idArr = new Array();

      let total_transfer = $("#total_transfer").val();

      // if(isNaN(total_transfer))
      // {
      //   console.log("N/A");
      // }
      // else
      // {
        let mid = $_GET['MID'];
        let u_mid = $_GET['UID'];
        let c_uid = $_USER['uid'];
        //let key = $_USER['key'];

        $("#input_price").attr("disabled",true);
        $("#vbalance").attr("disabled",true);
        $("#total_transfer").attr("disabled",true);

        if(mid != "" && u_mid != "" && cid != "" && key != "")
        {
          console.log(deduction_for_voucher);
          var formData = new FormData();
          formData.append("function","customer_make_payment");
          formData.append("bill_id",$_GET['bill_id']);
          formData.append("sender",c_uid);
          formData.append("receiver",u_mid);
          formData.append("mid",mid);
          if(cur_vh_id > 0)
          {
            formData.append("vh_id",cur_vh_id);
            formData.append("voucher_deduction",(deduction_for_voucher*100));
          }
          
          // for (var pair of formData.entries()) {
          //     console.log(pair[0]+ ', ' + pair[1]); 
          // }
          $.ajax({
            url:oderje_url+"api/customer_payment",
            data:formData,
            processData: false,
              contentType: false,
            type:"POST",
            success:function(data)
            {
              //console.log("ui");
              console.log(data);
              if(data.status=="Amount not enough")
              {
                if(confirm("Please Top Up Balance Account\nProceed?"))
                {
                  window.location.href = "../reload/?d="+url_encode("amount="+dom_prepaid_balance.text()+"&backpath="+$_GET['path']+"&"+get_hash_param());

                }

              }
              if(data.status == "Failed to deduct price using voucher")
              {
                alert("voucher are not applicable, contact voucher provider");
                var root = $(".vh_id").parent().parent().parent();
                root.addClass("blur");
                root.parent().find("button").attr("disabled",true);
                
                $(".voucher_use_div").addClass("d-none");
                $(".prepaid_balance").text(parseFloat($(".prepaid_balance").text())+parseFloat(deduction_for_voucher));
                cur_vh_id = -1;
                // $(".vh_id").parent().parent().parent().blur();
              }
              if(data.status == "ok")
              {

                if(use_pin == 'yes')
                {
                  $("#key").removeClass("d-none");
                  $("#proceed_payment").removeClass("d-none");



                  //$(".pin_div").removeClass("d-none");
                  //$("#request_pin").attr("disabled",true);

                  if(Array.isArray(data.vt_id))
                  {
                    vt_idArr = data.vt_id;
                    console.log(vt_idArr);
                  }
                  else
                  {
                    vt_id = data.vt_id;
                    console.log(vt_id);
                  }

                  if(Array.isArray(data.t_id))
                  {
                    t_idArr = data.t_id;
                    console.log(t_idArr);
                  }
                  else
                  {
                    t_id = data.t_id;
                    //console.log(t_id);
                  }


                  $("#proceed_payment").on('click',function(){
                    let pin = $("#key").val().trim();

                    if(Array.isArray(data.vt_id))
                    {
                      $.post("https://app.oderje.com/api/transfer",
                      {
                        function:"confirm_payment",
                        pin:pin,
                        vt_id:vt_idArr,
                        tid:t_idArr

                      },function(data){

                        if(data.status == "ok")
                        {
                          console.log(data);
                          alert("Successfully paid");
                          $.post("https://app.oderje.com/api/customer_order",
                          {
                            function:"customer_make_instant_order",
                            c_id:$_USER['cid'],
                            bill_id:$_GET['bill_id']
                          },
                          function(data){
                            console.log(data);

                             window.location.href = "../receipt/?d="+url_encode("bill_id="+$_GET['bill_id']+"&type=single");
                          },"json");
                          
                        }
                        else
                        {
                          alert("Failed transfer");
                        }
                      },"json");
                    }
                    else
                    {
                      $.post("https://app.oderje.com/api/transfer",
                      {
                        function:"confirm_payment",
                        pin:pin,
                        vt_id:vt_id,
                        tid:t_id

                      },function(data){

                        if(data.status == "ok")
                        {
                          alert("Successfully paid");
                          $.post("https://app.oderje.com/api/customer_order",
                          {
                            function:"customer_make_instant_order",
                            c_id:$_USER['cid'],
                            bill_id:$_GET['bill_id']
                          },
                          function(data){
                            //console.log(data);
                            //alert("oi");
                            //console.log("../receipt/?d="+url_encode("bill_id="+$_GET['bill_id']));
                             window.location.href = "../receipt/?d="+url_encode("bill_id="+$_GET['bill_id']+"&type=single");
                          },"json");
                          
                        }
                        else
                        {
                          alert("Failed transfer");
                        }
                      },"json");
                    }
                    
                  });
                }
                else
                {
                  alert("Succesfully paid");
                  $.post("https://app.oderje.com/api/customer_order",
                  {
                    function:"customer_make_instant_order",
                    c_id:$_USER['cid'],
                    bill_id:$_GET['bill_id']
                  },
                  function(data){
                    //console.log(data);
                    //console.log("../receipt/?d="+url_encode("bill_id="+$_GET['bill_id']+"&type=single"));
                    window.location.href = "../receipt/?d="+url_encode("bill_id="+$_GET['bill_id']+"&type=single");
                  },"json");
                  
                }
              }
            }

          });
        }
      //}
    });

    function initializer()
    {
      $.post("https://app.oderje.com/api/customer",
      {
        function:"customer_to_merchant_voucher",
        cid:$_USER['cid'],
        mid:$_GET['MID']
      },
      function(data){
        set_merchant_detail(data.customer,data.merchant);
        if(data.voucher)
        {
          create_voucher_card(data.voucher);

        }
      },"json");

      $.post(oderje_url+"api/customer",
        {
            function:"user_typ_key",
            u_id:$_USER['uid']
        },
        function(data){
            if(data.status == "ok")
            {
                $.post(typ_url+"api/typ_accountBalance",
                {
                    function:"vab_amount",
                    key:data.typ_key
                },function(data2){
                  //$(".prepaid_balance").text(data2.vab_amount);
                  prepaid_balance = data2.vab_amount;

                },"json");
            }

        },"json");

      $.post("https://app.oderje.com/api/customer_bill",
      {
        function:"get_bill_amount",
        bill_id:$_GET['bill_id']

      },function(data){
        if(data.status == "ok")
        {
          $("#input_price").text(data.amount);
          $(".prepaid_balance").text(data.amount);
          $("#sign").text(" Use ");

        }
        else
        {

          alert("invalid payment");
        }

      },"json");

      $.post("https://app.oderje.com/api/customer",
      {
        function:"customer_use_pin",
        c_id:$_USER['cid']

      },function(data){
        if(data.status == "ok")
        {

          use_pin = data.use_pin;
          //console.log(use_pin);

         
        }
        else
        {

          alert("invalid user");
        }

      },"json");
    }
  
    function set_merchant_detail(cust,data){
      $("#merchant_name").text(data.M_NAME);
      $("#merchant_location").text(data.LOCATION);

      //$("#merchant_regno").text(data.M_REG_NO);

      $("#customerName").text(cust.C_FULLNAME);
      $("#total_item").addClass("d-none");
    }


    function create_voucher_card(list){

      if(list.length > 0)
      {
        $(".list_voucher").empty();
        var html = "";
        for(var i = 0 ; i < list.length; i++)
        {
          if(list[i].type=="specific")
          {
            var bal = (list[i].V_BALANCE != null)?list[i].V_BALANCE:list[i].AMOUNT;
            html += ' <div class="col-md-4 my-1 voucher_card">';
            html += '   <div class="card border-light">';
            html += '     <div class="card-body" style="background-color:lightgoldenrodyellow">';
            html += '       <div class="row">';
            html += '         <div class="col-4 ">';
            html += '           <label class="font-weight-bold text-outline text-white">Balance:</label>';
            html += '           <label class="font-weight-bold text-outline text-white" id="balance">RM '+bal+'</label>';
            html += '         </div>';
            html += '         <div class="col-8 text-right">';
            html += '           <small style="color:#FF6600">';
            html += '             Cash Voucher';
            html += '           </small>';
            html += '           <p>';
            html += '             RM <span id="cashVoucherValue">'+list[i].AMOUNT+'</span>';
            html += '           </p>';
            html += '           <p class="text-secondary mt-n3" style="font-size:10px">';
            html += '             Valid till : <span id="cashVoucherEnd">'+list[i].END_DATE+'</span>';
            html += '           </p>';
            html += '         </div>';
            html += '       </div>';
            html += '       <div class="row mt-1 border-top border-white">';
            html += '         <div class="col-8" style="height:20px">';
            html += '           <p class="text-secondary mt-1 invisible" style="font-size:10px">';
            html += '             By: <span id="cashVoucherFrom">Business 1</span>';
            html += '             <br>';
            html += '             Redeem at: <span id="cashVoucherFrom">Business 2</span>';
            html += '           </p>';
            html += '         </div>';
            html += '         <div class="col-4 mt-2 mb-n2 text-center">';
            html += '           <input class="vh_id" type="hidden" value="'+list[i].VH_ID+'" >';
            html += '           <input class="amount" type="hidden" value="'+list[i].AMOUNT+'" >';
            html += '           <input class="balance" type="hidden" value="'+bal+'" >';
            html += '           <button class="btn btn-sm text-white voucher_btn" style="background-color:#FF6600" data-toggle="modal" data-target="#editVoucher">';
            //html += '             <small>';
            html += '               Claim';
            //html += '             </small>';
            html += '           </button>';
            html += '         </div>';
            html += '       </div>';
            html += '     </div>';
            html += '   </div>';
            html += ' </div>';
          }

        }
        $(".list_voucher").append(html);
        voucher_listener();
      }
    }

    function reset_voucher_selection(){
      $(".voucher_card").each(function(){
        ($(this).hasClass("bg-info"))?$(this).removeClass("bg-info").addClass("bg-warning "):$(this).addClass("bg-info");
        ($(this).find(".v_name").hasClass("text-outline-info"))?$(this).find(".v_name").addClass("text-outline-info"):$(this).find(".v_name").addClass("text-outline-info");
        ($(this).find(".v_amount").hasClass("bg-warning"))?$(this).find(".v_amount").removeClass("bg-warning ").addClass("bg-info"):$(this).find(".v_amount").removeClass("bg-warning");

      });
    }

    function voucher_listener(){

      $(".voucher_btn").on("click",function(){
        var root = $(this).parent();
        var vh_id = root.find(".vh_id").val();
        var balance = root.find(".balance").val();

        // console.log((balance>parseFloat($("#input_price").text()))? parseFloat($("#input_price").text()):balance);
        $(".vh_balance").val((balance>parseFloat($("#input_price").text()))? parseFloat($("#input_price").text()):balance);
        // $(".vh_balance").val(balance);
        $(".vh_id").val(vh_id);
        modal_listener();
        // reset_voucher_selection();
        // ($(this).hasClass("bg-warning"))? $(this).removeClass("bg-warning").addClass("bg-info"):null;
        // ($(this).find(".v_name").hasClass("text-outline-info"))?$(this).find(".v_name").removeClass("text-outline-info"):null;
        // ($(this).find(".v_amount").hasClass("bg-info"))?$(this).find(".v_amount").removeClass("bg-info").addClass("bg-warning text-outline-info"):null;

        // vh_id = $(this).find(".vh_id").val();
        // amount = $(this).find(".amount").val();
        // balance = $(this).find(".balance").val();

        // cur_vh_id = vh_id;
        // cur_voucher_use = vh_id;
        
        // cur_voucher_balance = parseFloat(balance);
        // $("#vbalance").val((balance > cur_price_need_topay)? cur_price_need_topay:balance);


      });
    }

    function modal_listener(){
      var counter = 0;
      $(".voucher_to_use_input").keyup(function(){
        var myInterval = setInterval(function () {
          ++counter;
        }, 1000);


        if(myInterval > 5)
        {
          checkVoucherMax($(this));
        }
       
      });

      $(".select_voucher_btn").on("click",function(){
        cur_vh_id = $(this).find(".vh_id").val();
        
        
        if($(".voucher_to_use_input").val() <= $(".voucher_to_use_input").parent().find(".vh_balance").val() && parseFloat($(".voucher_to_use_input").val()) > 0 && !isNaN($(".voucher_to_use_input").val()))
        {
          // console.log(parseFloat($("#input_price").text()) < parseFloat($(".voucher_to_use_input").parent().find(".vh_balance").val()));
          if(parseFloat($("#input_price").text()) < parseFloat($(".voucher_to_use_input").parent().find(".vh_balance").val()))
          {
           
            deduction_for_voucher = $("#input_price").text();
            
            $(".voucher_use_div").removeClass("d-none");
            $(".voucher_use_div").find("#voucher_span").text(" RM "+ deduction_for_voucher);
            $('#editVoucher').modal('hide');
            $("#collapseVouchers").removeClass("show");
            //dom_prepaid_balance.text($("#input_price").text());

            $(".prepaid_balance").text($("#input_price").text() - deduction_for_voucher );
            $("#sign").text(" Use ");
          }
          else
          {
            
            deduction_for_voucher = $(".voucher_to_use_input").val();
            $(".voucher_use_div").removeClass("d-none");
            $(".voucher_use_div").find("#voucher_span").text(" RM "+ $(".voucher_to_use_input").val());
            $('#editVoucher').modal('hide');
            $("#collapseVouchers").removeClass("show");
            //dom_prepaid_balance.text($("#input_price").text());

            $(".prepaid_balance").text($("#input_price").text() - $(".voucher_to_use_input").val() );
            $("#sign").text(" Use ");
          }
          
        }
        else
        {
          alert("invalid amount");
        }
        

        
      });
    }

    function checkVoucherMax(input)
    {
        if(isNaN(input.val()))
        {
          alert("Not a Number");
          input.val("0.00");
        }
        else if(input.val() > input.parent().find(".vh_balance").val())
        {
          alert("Maximum: " + input.parent().find(".vh_balance").val());
          input.val("0.00");
        }
    }

    
  });

</script>