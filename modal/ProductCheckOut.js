class ProductCheckOut {

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

    ProductCheckOutView() {
        var html = '';

        html += '<div class="col-xl-4 col-md-6 border p-3 my-1 bg-light">';
        html += '   <div class="col-12 text-center border p-3">';
        html += '       <img src=" https://app.oderje.com/images/product/' + this.p_img + '" class="card-img-top mx-auto " style="width:200px;min-height:200px;max-height: 100px;" alt="Product Name ">';
        html += '   </div>';
        html += '   <div class="p-0 w-100 border p-1">';
        html += '       <div class="col-12 text-center">' + this.p_name + '</div>';
        html += '       <div class="col-12 text-center text-primary font-weight-bold"><small>' + this.p_quantity + ' x RM ' + (this.p_price / 100) + '</small></div>';
        html += '       <div class="col-12 text-center font-weight-bold" style="color:#FF9933">RM ' + (this.p_quantity * (this.p_price / 100)) + '</div>';
        html += '   </div>';
        html += '</div>';

        return html;
    }
}