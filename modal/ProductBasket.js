class ProductBasket {

    constructor(p) {
        this.pbm_id = p.pbm_id;
        this.p_id = p.p_id;
        this.p_name = p.p_name;
        this.p_price = p.p_price / 100;
        this.p_img = p.p_image;
        this.p_quantity = p.p_quantity;
        this.type = p.type;
        this.cb_id = p.cb_id;
        try {
            this.variation = JSON.parse(p.variation);
        } catch (e) {}


    }

    ProductBasketView() {

        var date = new Date();
        var temp = date.toString();
        var html = '';
        html += '<div class="col-xl-3 col-md-6 border">';
        html += '  <div class="card border-light">';
        html += '    <div class="card-body ">';
        html += '      <div class="form-check text-center">';
        html += '        <input class="form-check-input child-check" type="checkbox" value="' + this.pbm_id + '">';
        html += '        <input class="form-check-input variation_data" type="hidden" value=\'' + JSON.stringify(this.variation) + '\'>';
        html += '      </div>';
        html += '    </div>';
        html += '    <img src="' + oderje_url + 'images/product/' + this.p_img + '?' + temp + '" class="card-img-top mx-auto" style="width:200px" alt="Product Name">';
        html += '    <div class="card-body">';
        html += '      <div class="card-title overflow-hidden" style="height:60px">';
        html += '        <label>' + this.p_name + ' </label><br> <div class="border text-center">';

        try {
            html += this.variationExtracter(JSON.stringify(this.variation));
            // console.log(this.variationExtracter(JSON.stringify(this.variation)));
        } catch (e) {
            // console.log(e);
        }
        html += '      </div>';
        html += '      </div>';
        html += '      <div class="row">';
        html += '        <div class="col-12 text-center text-secondary">';
        html += '          <input value="' + this.cb_id + '" class="cb_id" type="hidden">';
        html += '          <small id="productQuantity">' + this.p_quantity + '</small>&times;';
        html += '          <small>RM&nbsp;<span id="productPrice">' + parseFloat(this.p_price).toFixed(2) + '</span></small>';
        html += '        </div>';
        html += '      </div>';
        html += '      <div class="row">';
        html += '        <div class="col-12 text-center" style="color:#FF9933">';
        html += '          <span>RM ' + parseFloat(this.p_quantity * this.p_price).toFixed(2) + '</span>';
        html += '        </div>';
        html += '      </div>';
        html += '      <div class="row">';
        html += '        <div class="col-12 text-center btn btn-sm btn-light edit_btn" data-toggle="modal" data-target="#editQuantityModal">';
        html += '          <input class="pbm_id" value="' + this.pbm_id + '" type="hidden"> <input class="form-check-input variation_data" type="hidden" value=\'' + JSON.stringify(this.variation) + '\'><small class="">Edit</small>';
        html += '        </div>';
        html += '      </div>';
        html += '    </div>';
        html += '  </div>';
        html += '</div>';



        return html;
    }

    variationExtracter(variation) {

        var data = JSON.parse(variation);
        var key = Object.keys(JSON.parse(variation));

        key.pop();
        key.pop();

        var temp = "";
        for (var i = 0; i < key.length; i++) {
            temp += key[i];
            temp += ' : ';
            temp += data[key[i]];
            if (i != key.length - 1) {
                temp += ',  ';
            }


        }
        // console.log(temp);

        return temp;


    }
}