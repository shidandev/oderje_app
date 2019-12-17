class ProductBasket{
	
	constructor(p)
	{
<<<<<<< HEAD
		this.pbm_id= p.pbm_id;
                this.p_id = p.p_id;
                this.p_name = p.p_name;
                this.p_price = p.p_price;
                this.p_img = p.p_image;
                this.p_quantity = p.p_quantity;
                this.type = p.type;
                this.cb_id = p.cb_id;
		
	}

	ProductBasketView()
	{       
		var html = '';
        html += '<div class="col-xl-3 col-md-6">';
		html  += '  <div class="card border-light">';
        html  += '    <div class="card-body">';
        html  += '      <div class="form-check text-center">';
        html  += '        <input class="form-check-input child-check" type="checkbox" value="" id="defaultCheck1">';
        html  += '      </div>';
        html  += '    </div>';
        html  += '    <img src="https://app.oderje.com/images/product/'+this.p_img+'" class="card-img-top mx-auto" style="width:200px" alt="Product Name">';
        html  += '    <div class="card-body">';
        html  += '      <div class="card-title overflow-hidden" style="height:20px">';
        html  += '        <span>'+this.p_name+'</span>';
        html  += '      </div>';
        html  += '      <div class="row">';
        html  += '        <div class="col-12 text-center text-secondary">';
        html  += '          <input value="'+this.cb_id+'" class="cb_id" type="hidden">';
        html  += '          <small id="productQuantity">'+this.p_quantity+'</small>&times;';
        html  += '          <small>RM&nbsp;<span id="productPrice">'+this.p_price+'</span></small>';
        html  += '        </div>';
        html  += '      </div>';
        html  += '      <div class="row">';
        html  += '        <div class="col-12 text-center" style="color:#FF9933">';
        html  += '          <span>RM '+(this.p_quantity*this.p_price)+'</span>';
        html  += '        </div>';
        html  += '      </div>';
        html  += '      <div class="row">';
        html  += '        <div class="col-12 text-center btn btn-sm btn-light edit_btn" data-toggle="modal" data-target="#editQuantityModal">';
        html  += '          <input class="pbm_id" value="'+this.pbm_id+'" type="hidden"><small class="">Edit</small>';
        html  += '        </div>';
        html  += '      </div>';
        html  += '    </div>';
        html  += '  </div>';
        html += '</div>';

        return html;
=======
		this.p_id= p.p_id;
		this.p_code = p.category_code;
		this.p_name = p.p_name;
		this.p_price = p.p_price;
		this.p_brand = p.p_brand;
		this.p_img = p.p_image;
        this.pbm_id = p.pbm_id;
        this.store_name = p.store_name;
        this.location = p.location;
        this.longitude = p.longitude;
        this.latitude = p.latitude;
        this.rating = p.rating;
        this.promotion_list = p.promotion_list;
        this.exact_price = 0.0;
	}

	ProductBasketView()
	{

		var html = "";
		// <div class="card border-light">
  //                 <div class="card-body">
  //                     <div class="form-check text-center">
  //                         <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  //                     </div>
  //                 </div>
  //                 <img src="http://localhost/oderje.com/img/products/generic-product.jpg" class="card-img-top mx-auto"
  //                     style="width:200px" alt="Product Name">
  //                 <div class="card-body">
  //                     <div class="card-title overflow-hidden" style="height:20px">
  //                         <span>
  //                             Sample Product Name Sample Product Name Sample Product Name Sample Product Name
  //                         </span>
  //                     </div>
  //                     <div class="row">
  //                         <div class="col-12 text-center text-secondary">
  //                             <small id="productQuantity">
  //                                 3
  //                             </small>
  //                             &times;
  //                             <small>
  //                                 RM&nbsp;<span id="productPrice">150.00</span>
  //                             </small>
  //                         </div>
  //                     </div>
  //                     <div class="row">
  //                         <div class="col-12 text-center" style="color:#FF9933">
  //                             <span>
  //                                 RM 450.00
  //                             </span>
  //                         </div>
  //                     </div>
  //                     <div class="row">
  //                         <div class="col-12 text-center btn btn-sm btn-light" data-toggle="modal"
  //                             data-target="#editQuantityModal">
  //                             <small>
  //                                 Edit
  //                             </small>
  //                         </div>
  //                     </div>
  //                 </div>
  //             </div>
  //         </div>
>>>>>>> 46e199ce84dad53cd3676494765ed78f0dca92cc
	}
}