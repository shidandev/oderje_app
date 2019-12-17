var input = "";
$("#Money").val("0.00");
$("#Money").keydown(function(e) {
    //handle backspace key
    if (e.keyCode == 8 && input.length > 0) {
        input = input.slice(0, input.length - 1); //remove last digit
        $(this).val(formatNumber(input));
    } else {
	if(input.length < 7)
	{
		var key = getKeyValue(e.keyCode);
		if (key) {
			input += key; //add actual digit to the input string
			$(this).val(formatNumber(input)); //format input string and set the input box value to it
		}
	}
    }
    return false;
});

function getKeyValue(keyCode) {
    if (keyCode > 57) { //also check for numpad keys
        keyCode -= 48;
    }
    if (keyCode >= 48 && keyCode <= 57) {
        return String.fromCharCode(keyCode);
    }
}

function formatNumber(input) {
    if (isNaN(parseFloat(input))) {
        return "0.00"; //if the input is invalid just set the value to 0.00
    }
    var num = parseFloat(input);
    return (num / 100).toFixed(2); //move the decimal up to places return a X.00 format
}