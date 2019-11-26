<!DOCTYPE html>
<html>
<?php include_once("head/head.php");?>
<body style="background-color:#FF6E0E">
	
    <?php include_once("controller/user.php");?>
	<div class="container-fluid">
		<div class="row" style="margin-top:80px">
			<div class="col-md-2 col-1"></div>

			<div class="col-md-8 col-10 box bg-light bubble-high p-3" id="success_div">
				
				<div class="col-md-12 col-12 mt-2 text-center  " id="img_btn">
					<img src="img/oderje-logo.png?" class="img-fluid w-50 ">
				</div>
				<div class="col-12 text-center font-weight-bold mt-3">Thank you for choosing us as your platform</div>
				<div class="col-12 text-center mt-3 font-weight-bold d-none">gif</div>
				<div class="col-12 mt-3 font-weight-bold mt-3">
					<label>Full Name</label>
				</div>
				<div class="col-12 mt-1">
					<input id="fullname" type="text" class="form-control" placeholder="User Full Name" required="true">
				</div>
				<div class="col-12 mt-3 font-weight-bold mt-3">
					<label>Contact Number</label>
				</div>
				<div class="col-12 mt-1">
					<input id="phone" type="text" class="form-control" placeholder="Contact Number" required="true">
				</div>
				<div class="col-12 mt-3 font-weight-bold mt-3">
					<label>Gender</label>
				</div>
				<div class="col-12 mt-1">
					<select id="gender" class="form-control" >
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
				<div class="col-12 mt-3 font-weight-bold mt-3">
					<label>Date of birth</label>
				</div>
				<div class="col-12 mt-1">
					<input type="text" class="form-control" id="dob" required="true">
				</div>
				<div class="col-12 mt-3 row mx-auto">
					<button class="col-6 btn btn-outline-danger">Cancel</button>
					<button class="col-6 btn btn-success" id="submit_btn">Submit</button>

				</div>
			</div>
			<div class="col-md-2 col-1 "></div>
		</div>
	</div>
</body>



<script>
		
		
		$( "#dob" ).datepicker({ dateFormat: 'dd/mm/yy' });

		$("#submit_btn").on('click',function(){
			let fullname = $("#fullname").val().trim();
			let phone = $("#phone").val().trim();
			let gender = $("#gender").val().trim();
			let dob = $("#dob").val();

			dob = dob.split("/").reverse().join("-");

			if(fullname != "" && phone != "" && gender != "" && dob != "")
			{
				$.post("https://app.oderje.com/api/customer",
				{
					function:"confirm_register",
					c_id:$_GET['specialID'],
					fullname:fullname,
					phone:phone,
					gender:gender,
					dob:dob
				},
				function(data){
					if(data.status=="ok")
					{
						alert("Your account successfully Activated");
						window.location.href = "login.php";
					}
					else
					{
						alert("Please Try again");
					}
				},"json");
			}
			else
			{
				let html = "";
				if(fullname == "")
				{
					html += "Username\n";
				}
				if(phone == "")
				{
					html += "Phone Number\n";
				}
				if(gender == "")
				{
					html += "Gender\n";
				}
				if(dob == "")
				{
					html += "Date of borth\n";
				}


				alert("Please enter\n"+html);
			}
		});
		/*$.post("https://app.oderje.com/api/customer",
		{
			function:"confirm_register",
			c_id:$_GET['specialID']
		},
		function(data){
			if(data.status=="ok")
			{
				//alert("Your account successfully Activated");
				//window.location.href = "login.php";
			}
			else
			{
				alert("Please Try again");
			}
		},"json");*/
	
</script>
</html>