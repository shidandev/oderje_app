class Product{
	
	constructor(p)
	{
		this.p_id= p.P_ID;
		this.p_code = p.P_CATEGORY_CODE;
		this.p_name = p.P_NAME;
		this.p_price = p.P_PRICE;
		this.p_sku = p.P_SKU;
		this.p_brand = p.P_BRAND;
		this.p_img = p.P_IMAGE;
	}

    setp_id(p_id){this.p_id = p_id;}
	setp_code(p_code){this.p_code = p_code;}
    setp_name(p_name){this.p_name = p_name;}
    setp_price(p_price){this.p_price = p_price;}
    setp_sku(p_sku){this.p_sku = p_sku;}
    setp_brand(p_brand){this.p_brand = p_brand;}
    setp_image(p_img){this.p_img = p_img;}

    getp_id(){return this.p_id;}
    getp_code(){return this.p_code;}
    getp_name(){return this.p_name;}
    getp_price(){return this.p_price;}
    getp_sku(){return this.p_sku;}
    getp_brand(){return this.p_brand;}
    getp_img(){return this.p_img;}

	productView(){
        var html = '    <div class="col-md-3 col-sm-6 ">';
        html += '           <div class="row mx-auto box box-warning bubble-high p-1">';
        html += '           <div class="d-md-none d-block col-2 d-block"></div>';
        html += '           <div class="col-md-12 col-8  text-center p-0">';
        html += '               <img src="https://';
        html += (!this.p_img)?'www.oderje.com/img/products/generic-product.jpg':'app.oderje.com/images/product/'+this.p_img;
        html += '?" class="card-img-top float-center">';
        html += '           </div>';
        html += '           <div class="d-md-none d-block col-2 d-block"></div>';
        html += '               <div class="col-md-12 px-2">';
        html += '                   <label class="col-10 h6">';
        html += (!this.p_name)?'Product Name N/A':this.p_name;
        html +='                    </label>';
        html += '               </div>';
        html += '               <div class="col-md-12 px-2">';
        html += '                   <div class="row mx-auto">';
        html += '                       <div class="col-12 ">';
        html += '                           <small>Store Name - location</small>';
        html += '                       </div>';
        html += '                       <div class="col-md-12 col-4 mt-1">';
        html += '                           <small>';
        html += '                               <small>';
        html += '                                   <i class="fas fa-star text-warning"></i>';
        html += '                                   <i class="fas fa-star text-warning"></i>';
        html += '                                   <i class="fas fa-star"></i>';
        html += '                                   <i class="fas fa-star"></i>';
        html += '                                   <i class="fas fa-star"></i>';
        html += '                               </small>';
        html += '                           </small>';
        html += '                       </div>';
        html += '                       <div class="col-md-12 col-8  mt-1 my-auto">';
        html += '                           <small>';
        html += '                               <small>';
        html += '                                   <i class="fas fa-heart text-warning"></i>';
        html += '                                   <span class="text-warning">Favourite</span>';
        html += '                               </small>&nbsp;';
        html += '                               <small>';
        html += '                                   <i class="fas fa-fire text-danger"></i>';
        html += '                                   <span class="text-danger">Hot</span>';
        html += '                               </small>&nbsp;';
        html += '                               <small>';
        html += '                                   <i class="fas fa-truck text-success"></i>';
        html += '                                   <span class="text-success">Delivery</span>';
        html += '                               </small>';
        html += '                           </small>';
        html += '                       </div>';
        html += '                       <div class="col-md-12 col-12 ">';
        html += '                           <small><s>RM 300</s></small> - <small class="text-primary">50%</small> <b class="float-right">RM 125.00</b>';
        html += '                       </div>';
        html += '                       <div class="col-md-12 col-12 ">';
        html += '                           <small style="font-size:10px">[Promo End: 31/12/2019]</small>';
        html += '                       </div>';
        html += '                       <div class="col-md-12 col-12 text-right mt-2">';
        html += '                           <button class="btn btn-outline-info btn-sm"><input type="hidden" value="'+this.p_id+'">More Info <i class="fas fa-info-circle"></i></button>.';
        html += '                           <button class="btn btn-grab-item btn-sm text-white"><input type="hidden" value="'+this.p_id+'">Grab item <i class="fas fa-shopping-basket"></i></button>';
        html += '                       </div>';
        html += '                   </div>';
        html += '               </div>';
        html += '           </div>';
        html += '       </div>';

        return html;
    }

	// productView(){
	// 	var html = '	<div class="col-md-3 my-2">';
 //    	html += '			<div class="card border-light">';
 //        html += '			<img src="https://www.oderje.com/img/products/generic-product.jpg?" class="card-img-top mx-auto" style="width:200px" alt="Product Name">';
 //        html += ' 			<div class="card-body">';
 //        html += '    			<div class="card-title overflow-hidden" style="height:40px">';
 //        html += '        			<h6>';
 //        html +=             			(this.p_name)?this.p_name:"Product Name Invalid";
 //        html += '        			</h6>';
 //        html += '   			</div>';
 //        html += '    			<small class="text-secondary">';
 //        html += '       	 		Store Name - location';
 //        html += '    			</small>';
 //        html += '				<div style="font-size:12px">';
 //        html += '        			<i class="fas fa-star text-warning"></i>';
 //        html += '        			<i class="fas fa-star text-warning"></i>';
 //        html += '        			<i class="fas fa-star"></i>';
 //        html += '        			<i class="fas fa-star"></i>';
 //        html += '        			<i class="fas fa-star"></i>';
 //        html += '        			<div class="float-right">';
 //        html += '        				<span id="badge-liked" class="badge badge-pill badge-white text-warning">';
 //        html += '                    		<i class="fas fa-heart"></i>&nbsp;Favourite';
 //        html += '            			</span>';
 //        html += '            			<span id="badge-promo" class="badge badge-pill badge-white text-danger">';
 //        html += '							<i class="fas fa-fire"></i>&nbsp;Hot';
 //        html += '						</span>';
 //        html += '           			<span id="badge-delivery" class="badge badge-pill badge-white text-success">';
 //        html += '							<i class="fas fa-truck"></i>&nbsp;Delivery';
 //        html += '            			</span>';
 //        html += '	        		</div>';
 //        html += '				</div>';
 //        html += '   			<div class="card-header border-light">';
 //        html += '					<span id="price-slash" class="text-secondary hidden" style="font-size:10px">';
 //        html += '            			<s>';
 //        html += '                			RM&nbsp;300.00';
 //        html += '            			</s>&nbsp;';
 //        html += '        			</span>';
 //        html += '        			<span id="price-selling">';
 //        html += '            			<b>';
 //        html += '                			RM&nbsp;150.00';
 //        html += '            			</b>';
 //        html += '            			&nbsp;<small class="text-primary">-50%</small>';
 //        html += '        			</span>';
 //        html += '        			<span id="price-slash" class="text-secondary hidden mt-n5" style="font-size:10px">';
 //        html += '		            <br>[Promo End: 31/12/2019]';
 //        html += '        			</span>';
 //        html += '    			</div>';
 //        html += '    			<div class="float-right mt-2 mb-n2">';
 //        html += '			        <button class="btn btn-sm btn-outline-info" style="font-size:14px">';
 //        html += '			            More info&nbsp;<i class="fas fa-info-circle"></i>';
 //        html += '        			</button>';
 //        html += '			        <button type="button" data-toggle="modal" data-target=".modal-grab-item" class="btn btn-sm text-light" style="background:#FC9732; font-size:14px">';
 // 		html += '         	        	Grab item&nbsp;<i class="fas fa-shopping-basket"></i>';
 //        html += '			        </button>';
 //        html += '			    </div>';
 //        html += '			</div>';
 //    	html += '		</div>';
	// 	html += '	</div>';

	// 	return html;
	// }



}