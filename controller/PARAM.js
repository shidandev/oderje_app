


var $_GET = new Array();
var cur_url = "";
//console.log(window.location);
var url = window.location.href.split("?");

//for development
//console.log(url);
var cur_url = window.location.pathname;



if(url.length>1)
{
	// console.log(url[1]);
	
	//window.history.pushState("", "", cur_url);

	var str = url[1].trim().substring(2);
	//console.log(str);
	
	if(str.length==0)
	{
		//window.location.href = "index.php";
		//console.log("xde");
		window.location.href = cur_url;
	}
	else
	{
		var final = url_decode(str);
		if(final.trim()=="" || final.indexOf("=") < 0  )
		{
			//console.log("xde");
			window.location.href = cur_url;
		}
		else
		{
			//console.log(final);

			var param = final.split("&");
		//console.log(param);

			if(param.length==0)
			{
				window.location.href = cur_url;
			}
			else
			{
				
				for(var i = 0 ; i < param.length;i++)
				{
					var pair = param[i].split("=");
					setParam(pair[0],pair[1]);

				}
				setParam("path",cur_url);
				//console.log($_GET);
			}
		}
	}
			

}
else
{

	
}



function setParam(key,value)
{
	if(typeof key === "undefined" || typeof value === "undefined")
	{
		window.location.href = cur_url;
	}
	else
	{
		$_GET[key] = value;
	}
	
}

function SESSION(param)
{
	$.post("../session.php",
	{
		function:"add_param",
		param:param
	},
	function(data){
		if(data)
		{	
			var keys = Object.keys(data);
			
			

			for(let i = 0 ; i < keys.length; i++)
			{
				var temp = keys[i];
				
				$_USER[keys[i]] = data[temp];
			}

		}
	},"json");

}
function UNSET_SESSION(param)
{
	if(param.constructor !== Array)
	{
		let temp = param;
		param = new Array();
		param[0] = temp;
		console.log(param);
	}
	
	$.post("../session.php",
	{
		function:"unset_param",
		param:param
	},
	function(data){
		if(data)
		{	
			
			for(let i = 0 ; i < data.length; i++)
			{
				delete $_USER[data[i]];
			}

		}
	},"json");
}
function ALL_SESSION()
{
	$.post("../session.php",
	{
		function:"get_param"
	},
	function(data){
		console.table(data);
	},"json");
	

}

