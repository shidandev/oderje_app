<div class="container-fluid">
    <div class="col-12 text-center">
        <label class="font-weight-bold h4"> Order List</label>
    </div>

    <table class="w-100 order_table">
        <!-- <tr>
            <td class="border p-1">
                <small>
                    <table class="w-100 p-0">
                        <tr>
                            <td class="text-center "><label class="font-weight-bold order_merchant">Merchant Name</label></td>

                            <td class="text-center bill_group_status "><label class="font-weight-bold order_status">Completed</label></td>

                        </tr>
                        <tr>
                            <td class="text-center "><label class="font-weight-bold order_date">10/14/2020</label></td>
                            <td class="text-center bill_group_status"><button type="button" class=" btn btn-outline-info detail_btn py-0">Detail <i class="fa fa-caret-down"></i></button></td>
                        </tr>
                        
                    </table>
                </small>
                <small>
                    <table class="w-100 p-0 order_item d-none">
                        <tr>
                            <td style="vertical-align:top;" rowspan="2" width="20%"><img src="https://app.oderje.com/images/product/2.png" class="img-fluid"></td>
                            <td style="vertical-align:top;" class="text-left">Coffee Latte</td>
                            <td style="vertical-align:top;" class="text-center">RM 0000.00</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;" class="text-left">Quantity : 00</td>
                            <td style="vertical-align:top;" class="text-center">Completed</td>
                        </tr>
                    </table>
                </small>
                <small>
                    <table class="w-100 p-0 order_item d-none">
                        <tr>
                            <td style="vertical-align:top;" rowspan="2" width="20%"><img src="https://app.oderje.com/images/product/2.png" class="img-fluid"></td>
                            <td style="vertical-align:top;" class="text-left">Coffee Latte</td>
                            <td style="vertical-align:top;" class="text-center">RM 0000.00</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;" class="text-left">Quantity : 00</td>
                            <td style="vertical-align:top;" class="text-center">Completed</td>
                        </tr>
                    </table>
                </small>
            </td>
        </tr> -->
        <!-- <tr>
            <td class="border p-1">
                <small>
                    <table class="w-100 p-0">
                        <tr>
                            <td class="text-center "><label class="font-weight-bold order_merchant">Merchant Name</label></td>

                            <td class="text-center bill_group_status "><label class="font-weight-bold order_status">Completed</label></td>

                        </tr>
                        <tr>
                            <td class="text-center "><label class="font-weight-bold order_date">10/14/2020</label></td>
                            <td class="text-center bill_group_status"><button type="button" class=" btn btn-outline-info detail_btn py-0">Detail <i class="fa fa-caret-down"></i></button></td>
                        </tr>
                        
                    </table>
                </small>
                <small>
                    <table class="w-100 p-0 order_item">
                        <tr>
                            <td style="vertical-align:top;" rowspan="2" width="20%"><img src="https://app.oderje.com/images/product/2.png" class="img-fluid"></td>
                            <td style="vertical-align:top;" class="text-left">Coffee Latte</td>
                            <td style="vertical-align:top;" class="text-center">RM 0000.00</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;" class="text-left">Quantity : 00</td>
                            <td style="vertical-align:top;" class="text-center">Completed</td>
                        </tr>
                    </table>
                </small>
                <small>
                    <table class="w-100 p-0 order_item ">
                        <tr>
                            <td style="vertical-align:top;" rowspan="2" width="20%"><img src="https://app.oderje.com/images/product/2.png" class="img-fluid"></td>
                            <td style="vertical-align:top;" class="text-left">Coffee Latte</td>
                            <td style="vertical-align:top;" class="text-center">RM 0000.00</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;" class="text-left">Quantity : 00</td>
                            <td style="vertical-align:top;" class="text-center">Completed</td>
                        </tr>
                    </table>
                </small>
            </td>
        </tr> -->
    </table>


</div>

<script>
    $(document).ready(function() {

        $(".detail_btn").click(function() {

            var root = $(this).parent().parent().parent().parent().parent().parent();
            console.log(root);
            var items = root.find(".order_item");
            if (items.hasClass("d-none")) {
                items.removeClass("d-none");
                $(this).find("i").removeClass("fa-caret-down").addClass("fa-caret-up");
            } else {
                items.addClass("d-none");
                $(this).find("i").removeClass("fa-caret-up").addClass("fa-caret-down");
            }
        });

        $.post(oderje_url + "api/customer_order", {
            function: "get_current_order_customer",
            c_id: $_USER['cid']
                // c_id: 8
        }, function(data) {
            var html = "";
            try {
                if (data) {

                    var html = "";
                    for (var i = 0; i < data.length; i++) {
                        // html += '<tr class="btn_detail"><input value="' + data[i].BG_ID + '">';
                        // html += '<td class="text-center">' + (i + 1) + '</td>';
                        // html += '<td class="text-center">' + data[i].BILL_CODE + '</td>';
                        // html += '<td class="text-center">' + ((data[i].ORDER_STATUS == "PAID") ? "Paid" : (data[i].ORDER_STATUS == "ORDER") ? "Order" : (data[i].ORDER_STATUS == "accept_order") ? "Accept Order" : (data[i].ORDER_STATUS == "order_ready") ? "Order Ready" : (data[i].ORDER_STATUS == "completed") ? "Completed" : "") + '</td>';
                        // html += '</tr>';

                        html +='    <tr>';
                        html +='        <td class="border p-1">';
                        html +='            <small>';
                        html +='                <table class="w-100 p-0">';
                        html +='                     <tr>';
                        html +='                         <td class="text-center "><label class="font-weight-bold order_merchant">'+data[i].merchant_name+'</label></td>';
                        html +='                         <td class="text-center bill_group_status "><label class="font-weight-bold order_status">'+((data[i].ORDER_STATUS == "accept_order")?"Order Processing":(data[i].ORDER_STATUS == "order_ready")?"Please Collect":(data[i].ORDER_STATUS == "completed")?"Completed":"Paid")+'</label></td>';
                        html +='                     </tr>';
                        html +='                     <tr>';
                        html +='                         <td class="text-center "><label class="font-weight-bold order_date">'+data[i].ORDER_DATE+'</label></td>';
                        html +='                         <td class="text-center bill_group_status"><button type="button" class=" btn btn-outline-info detail_btn py-0">Detail <i class="fa fa-caret-down"></i></button></td>';
                        html +='                     </tr>';
                        html +='                 </table>';
                        html +='             </small>';
                        
                        try {
                        for(var j = 0 ; j < data[i].product.length; j++)
                        {
                            var date = new Date();
                            var temp = date.toString();

                        html +='             <small>';
                        html +='                 <table class="w-100 p-0 order_item ">';
                        html +='                     <tr>';
                        html +='                         <td style="vertical-align:top;" rowspan="2" width="20%"><img src="'+oderje_url+'images/product/'+data[i].product[j].P_IMAGE+'?'+temp+'" class="img-fluid"></td>';
                        html +='                         <td style="vertical-align:top;" class="text-left">'+data[i].product[j].P_NAME+'</td>';
                        html +='                       <td style="vertical-align:top;" class="text-center">RM '+(data[i].product[j].PRICE/100).toFixed(2)+'</td>';
                        html +='                     </tr>';
                        html +='                     <tr>';
                        html +='                         <td style="vertical-align:top;" class="text-left">Quantity : '+data[i].product[j].QUANTITY+'</td>';
                        html +='                         <td style="vertical-align:top;" class="text-center">'+((data[i].product[j].ORDER_STATUS == "accept_order")?"Order Processing":(data[i].product[j].ORDER_STATUS == "order_ready")?"Please Collect":(data[i].product[j].ORDER_STATUS == "completed")?"Completed":"Paid")+'</td>';
                        html +='                     </tr>';
                        html +='                 </table>';
                        html +='             </small>';
                        }
                        } catch (error) {
                            console.log("error",j);
                        }
                        
                        
                        html +='        </td>';
                        html +='    </tr>';


                    }

                    $(".order_table").append(html);
                } else {
                    html += '<tr><td colspan="3">No Order has been made</td></tr>';
                }
            } catch (e) {

                html += '<tr><td colspan="3">No Order has been made</td></tr>';
            }
        }, "json").
        done(function(){
            $(".detail_btn").click(function() {

                var root = $(this).parent().parent().parent().parent().parent().parent();
                console.log(root);
                var items = root.find(".order_item");
                if (items.hasClass("d-none")) {
                    items.removeClass("d-none");
                    $(this).find("i").removeClass("fa-caret-down").addClass("fa-caret-up");
                } else {
                    items.addClass("d-none");
                    $(this).find("i").removeClass("fa-caret-up").addClass("fa-caret-down");
                }
            });
        });

    });
</script>