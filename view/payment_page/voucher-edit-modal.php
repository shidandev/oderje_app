<div class="modal fade" id="editVoucher" tabindex="-1" role="dialog" aria-labelledby="editVoucher"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="exampleModalLabel">
                    Voucher
                </span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="col-12"><label>Balance to use</label></div>
                <div class="col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" > RM </span>
                        </div>
                        <input type="hidden" class="vh_balance" value="">
                        <input type="text" class="vh_balance form-control voucher_to_use_input" value="" >
                    </div>
                    
                </div>
                <div class="col-12 mt-2 text-right">
                    <button class="btn btn-sm btn-light select_voucher_btn">
                        <input type="hidden" class="vh_id" value="">
                        <input type="hidden" class="vh_balance" value="">
                        YES
                    </button>
                    <button type="button" class="btn btn-sm text-light" data-dismiss="modal" style="background:#FF9933">
                        NO
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
