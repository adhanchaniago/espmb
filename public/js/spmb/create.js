var myToken = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function() {
	$('#company_id').change(function() {
		var company_id = $(this).val();

		$.ajax({
    		url: base_url + 'master/division/apiGetPerCompany',
    		dataType: 'json',
    		type: 'POST',
    		data: { 
    				_token: myToken,
                    company_id: company_id },
            error: function(data) {
            	console.log('error loading data..');
            	alert('Error loading data...');
            },
            success: function(data) {
            	var dr = '';
            	$('#division_id').empty();
            	$.each(data, function(key, value) {
            		dr += '<option value="' + value.division_id + '">' + value.division_name + '</option>';
            	});
            	$('#division_id').append(dr);

            	$('#division_id').selectpicker('refresh');
            }
    	});
	});

    $('#btn_add_detail').click(function(){
        return false;
    });
});