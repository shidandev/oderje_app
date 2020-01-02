<footer class="fixed-bottom d-none" >
<div class="container-fluid page_jumper mb-1" >
    <div class="row">
        <div class="col-md-3 col-d-none"></div>
        <div class="col-md-6 col-12 p-0 page_list text-center">
            <button class="btn btn-warning"> <b> 1</b></button>
            <button class="btn btn-outline-warning"> <b> 2</b></button>
            <button class="btn btn-outline-warning"> <b> 3</b></button>
            <button class="btn btn-outline-warning"> <b> 4</b></button>
            <button class="btn btn-outline-warning"> <b> 5</b></button>
            <button class="btn btn-outline-warning"> <b> 6</b></button>
            <button class="btn btn-outline-warning"> <b> 7</b></button>
            <button class="btn btn-outline-warning"> <b> 8</b></button>
            <button class="btn btn-outline-warning"> <b> >> </b></button>
        </div>
        <div class="col-md-3 col-d-none"></div>
    </div>
</div>
	<div class="container text-center text-secondary" style="background-color: #EDF1FF">
		<div class="row my-1">
			<div class="col-md-6 text-md-right mb-n3">
				<p>Your location is <a id="location"><span class="text-danger">not set</a></span></p>
			</div>
			<div class="col-md-6 text-md-left">
				<button class="btn btn-sm text-light" id="btn_location" style="background-color:#FF6E0E">
					Set location <i class="fas fa-map-marker-alt"></i>
				</button>
				<script >
					

					if (navigator.geolocation) {
					    navigator.geolocation.getCurrentPosition(showPosition);
					} else {
					    x.innerHTML = "Geolocation is not supported by this browser.";
					}

					function getLocation() {
					    if (navigator.geolocation) {
					        navigator.geolocation.getCurrentPosition(showPosition);
					    } else {
					        x.innerHTML = "Geolocation is not supported by this browser.";
					    }
					}

					function showPosition(position) {
					    lat = position.coords.latitude;
					    long = position.coords.longitude;
					}

					$("#btn_location").click(function(){
					    getLocation();
					    $.post("../externalAPI/location.php", {
					        function: "get_cur_location",
					        lat: lat,
					        long: long
					    }, function (data) {
					        $("#location").empty();
					        $("#location").append(data.data);
					    }, "json");

					});
				</script>
			</div>
		</div>
	</div>
</footer>