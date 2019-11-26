class Product{
	
	constructor(p)
	{
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

    setp_id(p_id){this.p_id = p_id;}
	setp_code(p_code){this.p_code = p_code;}
    setp_name(p_name){this.p_name = p_name;}
    setp_price(p_price){this.p_price = p_price;}
    setp_brand(p_brand){this.p_brand = p_brand;}
    setp_image(p_img){this.p_img = p_img;}
    setpbm_id(pbm_id){this.pbm_id = pbm_id;}
    setStoreName(store_name){this.store_name = store_name;}
    setLocation(location){this.location = location;}
    setLongitude(longitude){this.longitude = longitude;}
    setLatitude(latitude){this.latitude = latitude;}
    setRating(rating){this.rating = rating;}
    setPromotion(promotion_list){this.promotion_list = promotion_list;}

    getp_id(){return this.p_id;}
    getp_code(){return this.p_code;}
    getp_name(){return this.p_name;}
    getp_price(){return this.p_price;}
    getp_brand(){return this.p_brand;}
    getp_img(){return this.p_img;}
    getpbm_id(){return this.pbm_id;}
    getStoreName(){return this.store_name;}
    getLocation(){return this.location;}
    getLongitude(){return this.longitude;}
    getLatitude(){return this.latitude;}
    getRating(){return this.rating;}
    getPromotion(){return this.promotion_list;}

	productView(){
        var date = new Date();
        var temp = date.toString();

        var html = '    <div class="col-md-3 col-sm-6 " >';
        html += '           <div class="row mx-auto box box-warning bubble-high p-1 product_card">';
        html += '           <div class="d-md-none d-block col-2 d-block"></div>';
        html += '           <div class="col-md-12 col-8  text-center p-0">';
        html += '               <img style=" display: center;max-width:150px;max-height:150px;width: auto;height: auto;" src="https://';
        html += (!this.p_img)?'www.oderje.com/img/products/generic-product.jpg':'app.oderje.com/images/product/'+this.p_img;
        html += '?'+temp+'" class="card-img-top float-center">';
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
        html += '                           <small> ';
        html += (this.store_name)?this.store_name:"Store Name N/A";
        html += ' - ';
        html += (this.location)?this.location:"Location N/A";
        html +='                            </small>';
        html += '                       </div>';
        html += '                       <div class="col-md-12 col-4 mt-1">';
        html += '                           <small>';
        html += '                               <small>';
        
        let yellow = this.rating;
        let black = 5 - yellow;
        for(var i = 0 ; i < yellow ; i++)
        {
            html += '                                   <i class="fas fa-star text-warning"></i>';
        }
        for(var i = 0 ; i < black ; i++)
        {
            html += '                                   <i class="fas fa-star"></i>';
        }
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

        try{

            if(this.promotion_list[0].DISCOUNT_TYPE == '%')
            {
                this.exact_price = this.p_price - (this.p_price * (this.promotion_list[0].DISCOUNT_VALUE/100));
                html += '                   <small><s>RM '+parseFloat(this.p_price).toFixed(2)+'</s></small> - <small class="text-primary">'+this.promotion_list[0].DISCOUNT_VALUE+'%</small> <b class="float-right">RM '+parseFloat(this.exact_price).toFixed(2);
                html +='</b>';

            }
            else if(this.promotion_list[0].DISCOUNT_TYPE == 'RM')
            {
                this.exact_price = this.promotion_list[0].DISCOUNT_VALUE;
                this.discount_cal = (this.exact_price/this.p_price)*100;
                html += '                   <small><s>RM '+parseFloat(this.p_price).toFixed(2)+'</s></small> - <small class="text-primary">'+this.discount_cal+'%</small> <b class="float-right">RM '+parseFloat(this.exact_price).toFixed(2);
                html +='</b>';
            }
            else
            {
                this.exact_price = this.p_price;
                html += '                   <small><s>RM </s></small> - <small class="text-primary">%</small> <b class="float-right">RM </b>';
            }
        }catch(e)
        {
            this.exact_price = this.p_price
            html += '                       <small><s></s></small>  <small class="text-primary"></small> <b class="float-right">RM '+this.p_price;
            html +='</b>';
        
        }
        
        this.exact_price = parseFloat(this.exact_price).toFixed(2);

        


        html += '                       </div>';
        html += '                       <div class="col-md-12 col-12 ">';
        try{
            if(this.promotion_list.length > 0 && this.promotion_list[0].EDATE)
            {
                html += '                   <small style="font-size:10px">[Promo End: '+this.promotion_list[0].EDATE+']</small>';
            }
        }catch(e){
            html += '                       <small class="invisible" style="font-size:10px">[No Promotion Available]</small>';
        }
        
        html += '                       </div>';
        html += '                       <div class="col-md-12 col-12 text-right mt-2">';
        html += '                           <button class="btn btn-outline-info btn-sm more_info"><input type="hidden" value="'+this.pbm_id+'">More Info <i class="fas fa-info-circle"></i></button>';
        html += '                           <button class="btn btn-grab-item btn-sm text-white grab_btn" type="button" data-toggle="modal" data-target=".modal-grab-item"><input type="hidden" value="'+this.pbm_id+'">Grab item <i class="fas fa-shopping-basket"></i></button>';
        html += '                       </div>';
        html += '                   </div>';
        html += '               </div>';
        html += '           </div>';
        html += '       </div>';

        return html;
        
    }





}