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
              <div class="card">
                <div class="card-header" id="headingItemList1" data-toggle="collapse" data-target="#collapseItemList1"
                  aria-expanded="true" aria-controls="collapseItemList1">
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
                <div id="collapseItemList1" class="collapse" aria-labelledby="headingItemList1"
                  data-parent="#accordionItemList">
                  <div class="card-body">
                    <div class="row">
                      <div class="card border-white">
                        <div class="card-body">
                          <div class="row">
                            <?php include 'orderConfirmProductCard.php'; ?>
                            <?php include 'orderConfirmProductCard.php'; ?>
                            <?php include 'orderConfirmProductCard.php'; ?>
                            <?php include 'orderConfirmProductCard.php'; ?>
                            <?php include 'orderConfirmProductCard.php'; ?>
                            <?php include 'orderConfirmProductCard.php'; ?>
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
    </div>
  </div>
</div>