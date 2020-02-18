<div class="container-fluid">
    <div class="col-12 text-center">
        <label class="font-weight-bold h4"> Order List</label>
    </div>

    <table class="table table-bordered order_table">
        <tr>
            <td class="text-center">No</td>
            <td class="text-center">Order Number</td>
            <td class="text-center">Status</td>
        </tr>
        <!-- <tr>
            <td class="text-center">1</td>
            <td class="text-center">IS043289489438</td>
            <td class="text-center">Accept</td>
        </tr>
        <tr>
            <td class="text-center">2</td>
            <td class="text-center">IS043289489438</td>
            <td class="text-center">Accept</td>
        </tr>
        <tr>
            <td class="text-center">3</td>
            <td class="text-center">IS043289489438</td>
            <td class="text-center">Accept</td>
        </tr> -->
    </table>

</div>

<script>
    $(document).ready(function() {

        $.post(oderje_url + "api/customer_order", {
            function: "get_current_order_customer",
            c_id: $_USER['c_id']
                // c_id: 8
        }, function(data) {
            var html = "";
            try {
                if (data) {

                    var html = "";
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr class="btn_detail"><input value="' + data[i].BG_ID + '">';
                        html += '<td class="text-center">' + (i + 1) + '</td>';
                        html += '<td class="text-center">' + data[i].BILL_CODE + '</td>';
                        html += '<td class="text-center">' + ((data[i].ORDER_STATUS == "PAID") ? "Paid" : (data[i].ORDER_STATUS == "ORDER") ? "Order" : (data[i].ORDER_STATUS == "accept_order") ? "Accept Order" : (data[i].ORDER_STATUS == "order_ready") ? "Order Ready" : (data[i].ORDER_STATUS == "completed") ? "Completed" : "") + '</td>';
                        html += '</tr>';
                    }

                    $(".order_table").append(html);
                } else {
                    html += '<tr><td colspan="3">No Order has been made</td></tr>';
                }
            } catch (e) {


            }
        }, "json");

    });
</script>