
	var base_home = "/www.oderje.com/";
	var api_home = "https://app.oderje.com/";
	var ajax_url = "api/";
	var customer = "customer";

	function home()
	{
		return this.base_home;

	}
	
	function api_home()
	{
		return this.api_home;

	}
	function ajax_customer()
	{
		return (this.home+this.ajax_url+this.customer);
}
