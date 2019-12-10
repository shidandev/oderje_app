<div class="container-fluid" style="margin-bottom:120px">
  <div class="accordion" id="accordianGeneralStore">
    <div class="card border-white">
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
            
            </div>
          </div>
        </div>
      </div>
      <div class="card border-white">
        <div class="card-header border-light" id="headingStore2" data-toggle="collapse" data-target="#collapseStore2"
          aria-expanded="false" aria-controls="collapseStore2" style="background-color:#EDF1FF">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="storeCheck2">
            <label class="form-check-label" for="storeCheck2">
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
        <div id="collapseStore2" class="collapse" aria-labelledby="headingStore2" data-parent="#accordianGeneralStore">
          <div class="card-body">
            <div class="row">
              <?php include '../inc/basketProductCard.php'; ?>
              <?php include '../inc/basketProductCard.php'; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="card border-white">
        <div class="card-header border-light" id="headingStore3" data-toggle="collapse" data-target="#collapseStore3"
          aria-expanded="false" aria-controls="collapseStore3" style="background-color:#EDF1FF">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="storeCheck3">
            <label class="form-check-label" for="storeCheck3">
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
        <div id="collapseStore3" class="collapse" aria-labelledby="headingStore3" data-parent="#accordianGeneralStore">
          <div class="card-body">
            <div class="row">
             <!--  <?php include '../inc/basketProductCard.php'; ?>
              <?php include '../inc/basketProductCard.php'; ?>
              <?php include '../inc/basketProductCard.php'; ?>
              <?php include '../inc/basketProductCard.php'; ?>
              <?php include '../inc/basketProductCard.php'; ?>
              <?php include '../inc/basketProductCard.php'; ?> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card border-white">
      <div class="card-body" style="background-color:#EDF1FF">
        <div class="row">
          <div class="col-8">
            Total selected items&#58;
          </div>
          <div class="col-4 text-right">
            4
          </div>
        </div>
        <div class="row">
          <div class="col-5">
            Total Price&#58;
          </div>
          <div class="col-7 text-right" style="font-size:larger">
            RM&nbsp;<span id="totalPrice">500,000.00</span>
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
                      <option value="1">In-store</option>
                      <option value="2">Self Collect</option>
                      <option value="3">Delivery</option>
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