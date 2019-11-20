<div class="container-fluid pb-5" style="margin-bottom:100px">
	<div class="accordion" id="accordian_div" style="position: sticky;" >
		<div class="card ">
			<div class="card-header p-0 m-0 bg-warning" id="product_div">
				<button class="btn btn-link col-12" type="button" data-toggle="collapse" data-target="#collapse1" >
					<span class="text-white text-outline-success"><b>Product</b></span><i class="float-right fas fa-th" style="font-size:24px"></i>
				</button>
			</div>

			<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordian_div" style="max-height: 100px;overflow-y: scroll;">
				<div class="card-body parent_product p-1">
					<div class="row  p-1">
						
						
					</div>




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
				console.log("here");
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
			$.post("https://app.oderje.com/api/package_product",
			{ 
				function: "get_list"
			}, 
			function (data) {

				if(data){
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
				        $(".row." + setView).append(temp.productView()); 
	    			}
				}
			}, "json");
		}		
	});




</script>


