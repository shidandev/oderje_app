var lat = 0;
var long = 0;

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
    $.post("externalAPI/location.php", {
        function: "get_cur_location",
        lat: lat,
        long: long
    }, function (data) {
        $("#location").empty();
        $("#location").append(data.data);
    }, "json");

});