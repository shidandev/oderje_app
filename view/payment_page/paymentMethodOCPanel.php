<div class="card-body" style="background-color:azure">
    <div class="row">
        <div class="col-12">
            <table>
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>&nbsp;&#58;&nbsp;<span id="customerName"></span></td>
                    </tr>
                    <tr id="total_item" >
                        <th>Total Item</th>
                        <td>&nbsp;&#58;&nbsp;<span id="total-item">1</span></td>
                    </tr>
                    <tr>
                        <th>Total Price</th>
                        <td>&nbsp;&#58;&nbsp;RM&nbsp;<span id="input_price">0</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 mt-3">
            <form>
                <div class="form-group">
                    <label for="orderNote"><b>Remarks</b>&nbsp;&#58;</label>
                    <textarea type="text" class="form-control" id="orderNote" rows="1"></textarea>
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="accordian" id="paymentVoucher">
                <div class="card">
                    <div class="card-header collapsed" id="headingVouchers" data-toggle="collapse"
                        data-target="#collapseVouchers" aria-expanded="false" aria-controls="collapseVouchers"
                        style="border-color:#EDF1FF">
                        <b>Vouchers&nbsp;&nbsp;</b><i class="float-right mt-2 fas fa-chevron-down fa-xs"></i>
                    </div>
                    <div id="collapseVouchers" class="collapse" aria-labelledby="headingVouchers"
                        data-parent="#paymentVoucher">
                        <div class="card-body">
                            <div class="row list_voucher" >
                                <label align="center">No Voucher Available</label>
                                <!-- <?php include '../../inc/voucherCash.php' ?>
                                <?php include '../../inc/voucherPercent.php' ?>
                                <?php include '../../inc/voucherDelivery.php' ?>
                                <?php include '../../inc/voucherDelivery.php' ?>
                                <?php include '../../inc/voucherCash.php' ?>
                                <?php include '../../inc/voucherPercent.php' ?> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row voucher_use_div d-none">
        <div class="col-12 mt-3 mb-1">
            <b>Voucher Use</b>&nbsp;&#58; <span id="voucher_span"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3 mb-1">
            <b>Payment Method</b>&nbsp;&#58;
        </div>
        <div class="col-12">
            <div class="accordion" id="paymentMethod">
                <div class="card">
                    <div class="card-header">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="oderjePrepaid"
                                value="oderje">
                            <label class="form-check-label" for="oderjePrepaid">
                                <img src="../img/oderje-prepaid.png" class="img-fluid" alt="oderje prepaid" width="150px">
                            </label>

                        </div>
                        <label class="float-right"><span id="sign"></span>RM <span class="prepaid_balance">0</span></label>
                    </div>
                </div>
                <div class="card d-none">
                    <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        <img src="../img/Logo-FPX.png" class="img-fluid" alt="online banking" width="60px">
                        (Online Banking)<i class="float-right mt-2 fas fa-chevron-down fa-xs"></i>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#paymentMethod">
                        <div class="card-body">
                            <div class="row">
                                <?php include '../../inc/paymentBankLogoMB2U0227.php'; ?>
                                <?php include '../../inc/paymentBankLogoBCBB0235.php'; ?>
                                <?php include '../../inc/paymentBankLogoBIMB0340.php'; ?>
                                <?php include '../../inc/paymentBankLogoRHB0218.php'; ?>
                                <?php include '../../inc/paymentBankLogoPBB0233.php'; ?>
                                <?php include '../../inc/paymentBankLogoAMBB0209.php'; ?>
                                <?php include '../../inc/paymentBankLogoMBB0228.php'; ?>
                                <?php include '../../inc/paymentBankLogoBKRM0602.php'; ?>
                                <?php include '../../inc/paymentBankLogoBMMB0341.php'; ?>
                                <?php include '../../inc/paymentBankLogoBSN0601.php'; ?>
                                <?php include '../../inc/paymentBankLogoABB0233.php'; ?>
                                <?php include '../../inc/paymentBankLogoHLB0224.php'; ?>
                                <?php include '../../inc/paymentBankLogoABMB0212.php'; ?>
                                <?php include '../../inc/paymentBankLogoUOB0226.php'; ?>
                                <?php include '../../inc/paymentBankLogoOCBC0229.php'; ?>
                                <?php include '../../inc/paymentBankLogoSCB0216.php'; ?>
                                <?php include '../../inc/paymentBankLogoKFH0346.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card d-none">
                    <div class="card-header">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod3"
                                value="card">
                            <label class="form-check-label" for="paymentMethod3">
                                <img src="../img/visa-mastercard.png" class="img-fluid" alt="card" width="100px">
                                (Card)
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>