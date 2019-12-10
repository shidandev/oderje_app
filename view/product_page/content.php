
<?php include_once("../view/product_page/grab-item-modal.php");?>
<div id="loading" class="bg-dark" style="width: 100%;height: 100%"></div>

<div id="content" class="container-fluid pb-5 d-none" style="margin-bottom:100px">
	<div class="accordion" id="accordian_div" style="position: sticky;" >
		<div class="card ">
			<div class="card-header p-0 m-0 bg-warning" id="product_div">
				<button class="btn btn-link col-12" type="button" data-toggle="collapse" data-target="#collapse1" >
					<span class="text-white text-outline-success"><b>Product</b></span><i class="float-right fas fa-th" style="font-size:24px"></i>
				</button>
			</div>

			<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordian_div" style="max-height: 100px;overflow-y: scroll;">
				<div class="card-body parent_product p-1">
					<!-- <div class="row parent_product"> -->
						<?php //include("product-card.php")?>
					<!-- </div> -->
				</div>
			</div>
		</div>
		<div class="card">
			<div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordian_div" style="max-height: 100px;overflow-y: scroll;">
				<div class="card-body ">
					
				</div>
			</div>
			<div class="card-header p-0 m-0 bg-warning" id="package_div">
				<button class="btn btn-link col-12" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
					<span class="text-white text-outline-success"><b>Package</b></span><i class="float-right fas fa-th" style="font-size:24px"></i>
				</button>
			</div>

			
		</div>
	</div>
</div>



<script>
	$(document).ready(function(){
		var product_list = new Array();

		var paging = 1;
		var row_count = 0;
		var prod_count = 0;

		let port_height = window.screen.height;
		let header_height = $("nav").outerHeight(true);
		let footer_height = $("footer").outerHeight(true);
		let product_div_height = $("#product_div").outerHeight(true);
		let package_div_height = $("#package_div").outerHeight(true);
		
		if(!$(".fixed-bottom").hasClass("d-none"))
		{	
			//console.log("ade footer");
			last_height = port_height - header_height - footer_height - product_div_height - package_div_height - 5;

		}
		else
		{
			//console.log("xde footer");
			last_height = port_height - header_height - product_div_height - package_div_height - 5;
		}

		$("#collapse1").css("max-height",last_height);
		$("#collapse2").css("max-height",last_height);

		$(window).resize(function () {
			let port_height = window.screen.height;
			let header_height = $("nav").outerHeight(true);
			let footer_height = $("footer").outerHeight(true);
			let product_div_height = $("#product_div").outerHeight(true);
			let package_div_height = $("#package_div").outerHeight(true);

			if(!$(".fixed-bottom").hasClass("d-none"))
			{	
				
				last_height = port_height - header_height - footer_height - product_div_height - package_div_height - 5;

			}

			$("#collapse1").css("max-height",last_height);
			$("#collapse2").css("max-height",last_height);
		});


		screenChange();
		initialize();

		function screenChange() {
			window.onscroll = function () {
				
			}
		}

		function initialize(){
			$.post(oderje_url+"api/package_product",
			{ 
				function: "get_list",
				search:$_GET['search']

			}, 
			function (data) {
				// console.log(data);
				if(data.list_product){
					prod_count = data.list_product.length;
					var setView = 0;
	      			// prod_count = 5;
	      			for (var i = 0; i < prod_count; i++) {
				        if (i % 4 == 0) //create div row that hold 4 view of product card
				        {
				        	setView = row_count;
				        	var html = '<div class="row ' + row_count + ' p-1"></div>';
				        	$(".parent_product").append(html);
				        	row_count++;
				        }

				        var temp = new Product(data.list_product[i]);
				        product_list.push(temp);

				        $(".row." + setView).append(temp.productView()); 

	    			}
				}
			}, "json").
			done(function(){

				let max = 0;
				$(".grab_btn").on('click',function(){
					grabItem($(this));
		        });
		        $(".product_card").each(function(){
		        	
		        	if(max < $(this).outerHeight(true))
		        	{
		        		max = $(this).outerHeight(true);
		        	}
		        	
		        });
		        console.log(max);
		        $(".product_card").css("min-height",310);
		        // alert("ui");
				$("#loading").addClass("d-none");
				$("#content").removeClass("d-none");
			});


		}

		function grabItem(btn)
		{
			var pbm_id = btn.find("input").val();
			//console.log(z);

			
			let cur_product = find(product_list,pbm_id);
			
			modal_setup(cur_product);
			//console.table(cur_product.getpbm_id());
		}	

		function find(list,pbm_id)
		{
			function check(node)
			{
				return node.pbm_id == pbm_id;
			}

			return product_list.find(check);
		}

		function modal_setup(p)
		{
			var temp = (new Date()).toString();
			$("#p_name").text((p.p_name)?p.p_name:"Not Available");
			$("#store_name").text((p.store_name)?p.store_name:"Not Available");
			$("#location").text((p.location)?p.location:"Not Available");
			$("#exact_price").text((p.exact_price)?p.exact_price:"0.00");
			$(".pbm_id").val((p.pbm_id)?p.pbm_id:"null");
			$("#quantity").val("0");
			let img_url = (p.p_img)?"https://app.oderje.com/images/product/"+p.p_img+"?"+temp:"https://www.oderje.com/img/products/generic-product.jpg?"+temp;
			$("#image_slider").find('img').attr('src',img_url);
			if(p.rating)
			{
				console.log(p.rating);
				let yellow = p.rating;
				let black = 5 - yellow;

				for(var i = 0 ; i < yellow;i++)
				{	
					$("#star_rating").append('<i class="fas fa-star text-warning"></i>');
				}
				for(var i = 0 ; i < black;i++)
				{
					$("#star_rating").append('<i class="fas fa-star"></i>');
				}

			}

		}

	});




</script>


