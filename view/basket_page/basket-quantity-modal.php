<div class="modal fade" id="editQuantityModal" tabindex="-1" role="dialog" aria-labelledby="editQuantityModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="exampleModalLabel">
                    Edit Quantity
                </span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card border-white">
                    <img id="image" src="" class="card-img-top mx-auto"
                        style="width:200px" alt="Product Name">
                    <div class="card-body">
                        <div class="card-title overflow-hidden" style="height:50px">
                            <span id="p_name">
                               
                            </span>
                        </div>
                        <div class="mb-2">
                            <div class="row mt-1">
                                <div class="col-5 text-right">
                                    <label><small>Quantity :</small></label>
                                </div>
                                <div class="col-7">
                                    <input id="quantity" class="form-control-sm" type="number" value="0" min="0" max="100" step="1">
                                </div>
                            </div>
                            
                            <script>
                              $("input[type='number']").inputSpinner()
                            </script>
                        </div>
                        <div class="mt-2 text-right">
                            <input id="cb_id" value="" type="hidden">
                            <input id="pbm_id" value="" type="hidden">
                            <button class="btn btn-sm btn-light" data-toggle="modal" data-target=".removeItem">
                                Remove item&nbsp;&nbsp;<i class="fas fa-eraser"></i>
                            </button>
                            <button type="button" id="add_item_btn" class="btn btn-sm text-light" style="background:#FF9933">
                                Add item&nbsp;&nbsp;<i class="fas fa-shopping-basket"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade removeItem" tabindex="-1" role="dialog" aria-labelledby="removeItem" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <span class="modal-title" id="removeItem">Remove Item</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body text-center">
                Are you sure?
                <div class="mt-2">
                    <input class="cb_id" value="" type="hidden">
                    <button class="btn btn-sm btn-light delete_item_btn">
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