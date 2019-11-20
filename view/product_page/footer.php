<footer class="container-fluid fixed-bottom " id="footer">

<div class="text-secondary ">
  <div class="row">
    <div class="col-12">
      <button id="footer-button-filter" class="btn btn-sm btn-info fas fa-chevron-up" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
        &nbsp;Filter <i class="fas fa-filter"></i>
      </button>
      <button id="footer-button-search" class="btn btn-sm btn-dark fas fa-chevron-up"" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
        &nbsp;Search <i class="fas fa-search"></i>
      </button>
      <button  id="close_filter_btn" class="btn btn-sm btn-danger fas float-right " type="button" >
        Close <i class="fas fa-cancel"></i>
      </button>
      <div class="collapse" id="collapseSearch">
        <div class="card card-body border-light">
          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
              <form class="form-group mt-n1 mb-n2">
                <div class="input-group">
                  <input type="text" class="form-control form-control-sm" placeholder="search"
                  style="border-color:#FC9732">
                  <div class="input-group-append">
                    <button id="search-oderje" class="btn btn-sm text-white" style="background:#FC9732" type="button">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-3">
            </div>
          </div>
        </div>
      </div>
      <div class="collapse" id="collapseFilter">
        <div class="card card-body border-light">
          <div class="row">
            <div class="col-md-4">
              <form>
                <div class="row">
                  <div class="col-12 text-center">
                    <p style="margin-bottom:1px"><small>Sort by</small></p>
                  </div>
                  <div class="col-3 text-right mt-1">
                    <span style="font-size:10px">Price :</span>
                  </div>
                  <div class="col-9 mb-2">
                    <select class="custom-select custom-select-sm">
                      <option value="0" selected>Relevance</option>
                      <option value="1"> low to high </option>
                      <option value="2"> high to low </option>
                    </select>
                  </div>
                  <div class="col-3 text-right mt-1">
                    <span style="font-size:10px">Rating :</span>
                  </div>
                  <div class="col-9 mb-2">
                    <select class="custom-select custom-select-sm">
                      <option value="0" selected>Relevance</option>
                      <option value="1"> low to high </option>
                      <option value="2"> high to low </option>
                    </select>
                  </div>
                  <div class="col-3 text-right mt-1">
                    <span style="font-size:10px">Distance :</span>
                  </div>
                  <div class="col-9 mb-2">
                    <select class="custom-select custom-select-sm">
                      <option value="0" selected>Relevance</option>
                      <option value="1"> near to far </option>
                      <option value="2"> far to near </option>
                    </select>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-4 pt-2">
              <form>
                <div class="col-12 text-center">
                  <p style="margin-bottom:1px"><small>Price range (RM)</small></p>
                </div>
                <div class="form-row">
                  <div class="col-2 text-right mt-1">
                    <label><small>min:</small></label>
                  </div>
                  <div class="col-4">
                    <input type="number" class="form-control form-control-sm" placeholder="0.00">
                  </div>
                  <div class="col-2 text-right mt-1">
                    <label><small>max:</small></label>
                  </div>
                  <div class="col-4">
                    <input type="number" class="form-control form-control-sm" placeholder="0.00">
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="col-12 text-center">
                  <p style="margin-bottom:1px"><small>Show only</small></p>
                  <button id="footer-filter-show-fav" type="button" style="font-size:10px" class="btn btn-sm btn-outline-warning mx-1 my-1">
                    <i class="fas fa-heart"></i>&nbsp;Favourite
                  </button>
                  <button id="footer-filter-show-hot" type="button" style="font-size:10px" class="btn btn-sm btn-outline-danger mx-1 my-1">
                    <i class="fas fa-fire"></i>&nbsp;Hot
                  </button>
                  <button id="footer-filter-show-del" type="button" style="font-size:10px" class="btn btn-sm btn-outline-success mx-1 my-1">
                    <i class="fas fa-truck"></i>&nbsp;Delivery
                  </button>
                  <button id="footer-filter-show-pro" type="button" style="font-size:10px" class="btn btn-sm btn-outline-info mx-1 my-1">
                    <i class="fas fa-tag"></i>&nbsp;Promo
                  </button>
                </div>
              </div>
            
            </div>
            <div class="col-md-4 pt-2">
             <div class="row">
              <div class="col-12 text-center" style="margin-bottom:1px">
                <small>Categories</small>
              </div>
              <div class="col-12 text-center overflow-auto" style="height:110px">
                <button id="footer-filter-category-Food" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Food </button>
                <button id="footer-filter-category-Beverage" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beverage  </button>
                <button id="footer-filter-category-Health" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Health </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;"  class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty  </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;"  class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty  </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty</button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty</button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty</button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;"  class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;" class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
                <button id="footer-filter-category-Beauty" type="button" style="font-size:10px;"  class="btn btn-sm btn-outline-dark mx-1 my-1">Beauty </button>
              </div>
            </div>
           
            </div>
          </div>
          <div class="row mx-auto mt-2 mb-n3">
            <button id="search-oderje" class="btn btn-sm btn-info" type="submit" value="submit">
              Apply
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row text-center py-2 d-none" style="background-color: #EDF1FF">
    <div class="col-md-6 text-md-right mb-n1">
      <p>Your location is <a id="location"><span class="text-danger">not set</a></span></p>
    </div>
    <div class="col-md-6 text-md-left ">
      <button class="btn btn-sm text-light" id="btn_location" style="background-color:#FF6E0E">
        Set location <i class="fas fa-map-marker-alt"></i>
      </button>
    </div>
  </div>
</div>
</footer>

<script>
  $("#close_filter_btn").on("click",function(){

    if($("#collapseFilter").hasClass("show")){
      $("#footer-button-filter").click();
    }
    if($("#collapseSearch").hasClass("show")){
      $("#footer-button-search").click();
    }
  });
  
</script>