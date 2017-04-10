function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
}

function convertNumber(value) { return value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."); }

function convertDate(value) {
	var d = value.substring(8, 10);
	var m = value.substring(5, 7);
	var y = value.substring(0, 4);

	return d + '/' + m + '/' + y;
}