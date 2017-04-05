function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
}

function convertNumber(value) { return value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."); }