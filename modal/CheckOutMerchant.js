class CheckOutMerchant {
    constructor(n) {
        this.m_id = n.m_id;
        this.m_name = n.m_name;
        this.location = n.m_location;
        this.basket = n.basket;

    }

    CheckOutByMerchantView() {
        var html = '';

        html += ' <div class="card root">';
        html += '   <div class="card-header " id="headingItemList1" data-toggle="collapse" data-target="#collapseItemList1" aria-expanded="true" aria-controls="collapseItemList1">';
        html += '     <div class="row ">';
        html += '       <div class="col-11 ">';
        html += '         ' + this.m_name + ' <br>';
        html += '         <small>' + this.location + '</small>';
        html += '       </div>';
        html += '       <div class="col-1 text-right my-auto pl-0 m-0">';
        html += '         <i class="fas fa-chevron-down  text-secondary"></i>';
        html += '       </div>';
        html += '     </div>';
        html += '   </div>';

        html += '   <div id="collapseItemList1" class="collapse card-header" aria-labelledby="headingItemList1" data-parent="#accordionItemList">';
        html += '     <div class="row">';

        for (let i = 0; i < this.basket.length; i++) {
            var temp = new ProductCheckOut(this.basket[i]);
            html += temp.ProductCheckOutView();
        }

        html += '     </div>';
        html += '   </div>';
        html += ' </div>';








        return html;

    }

}


/*<div class="card root">
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
                           <?php  include_once("orderConfirmProductCard.php")?>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div> */