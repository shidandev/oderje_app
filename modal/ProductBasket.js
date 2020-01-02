class ProductBasket {

    constructor(p) {
        this.pbm_id = p.pbm_id;
        this.p_id = p.p_id;
        this.p_name = p.p_name;
        this.p_price = p.p_price;
        this.p_img = p.p_image;
        this.p_quantity = p.p_quantity;
        this.type = p.type;
        this.cb_id = p.cb_id;

    }

    ProductBasketView() {
        var html = '';
        html += '<div class="col-xl-3 col-md-6">';
        html += '  <div class="card border-light">';
        html += '    <div class="card-body">';
        html += '      <div class="form-check text-center">';
        html += '        <input class="form-check-input child-check" type="checkbox" value="" id="">';
        html += '      </div>';
        html += '    </div>';
        html += '    <img src="https://app.oderje.com/images/product/' + this.p_img + '" class="card-img-top mx-auto" style="width:200px" alt="Product Name">';
        html += '    <div class="card-body">';
        html += '      <div class="card-title overflow-hidden" style="height:20px">';
        html += '        <span>' + this.p_name + '</span>';
        html += '      </div>';
        html += '      <div class="row">';
        html += '        <div class="col-12 text-center text-secondary">';
        html += '          <input value="' + this.cb_id + '" class="cb_id" type="hidden">';
        html += '          <small id="productQuantity">' + this.p_quantity + '</small>&times;';
        html += '          <small>RM&nbsp;<span id="productPrice">' + this.p_price + '</span></small>';
        html += '        </div>';
        html += '      </div>';
        html += '      <div class="row">';
        html += '        <div class="col-12 text-center" style="color:#FF9933">';
        html += '          <span>RM ' + (this.p_quantity * this.p_price) + '</span>';
        html += '        </div>';
        html += '      </div>';
        html += '      <div class="row">';
        html += '        <div class="col-12 text-center btn btn-sm btn-light edit_btn" data-toggle="modal" data-target="#editQuantityModal">';
        html += '          <input class="pbm_id" value="' + this.pbm_id + '" type="hidden"><small class="">Edit</small>';
        html += '        </div>';
        html += '      </div>';
        html += '    </div>';
        html += '  </div>';
        html += '</div>';

        return html;
    }
}