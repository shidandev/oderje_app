var oderje_home = "https://www.oderje.com/";

//development
// var oderje_url = "https://dev1.oderje.com/";
// var typ_url = "https://dev2.toyyibpay.com/";

//production
var oderje_url = "https://app.oderje.com/";
var typ_url = "https://app.toyyibpay.com/";


var typ_url_dev = "https://dev2.toyyibpay.com/";

var root_path = "/www.oderje.com/";
// var root_path = "/dev2.oderje.com/";

var base_home = "/www.oderje.com/";
// var base_home = "/dev2.oderje.com/";

var api_home = "https://app.oderje.com/";
var ajax_url = "api/";
var customer = "customer";

function home() {
    return this.base_home;

}

function api_home() {
    return this.api_home;

}

function ajax_customer() {
    return (this.home + this.ajax_url + this.customer);
}