var input_no_asset_spmb_detail_id = 0;

$(document).ready(function() {
	$('.input-no-asset-spmb-item').click(function() {
		input_no_asset_spmb_detail_id = $(this).data('detail-id');
		$('#modal_asset_no').val('');

    	$('#modalInputNoAsset').modal();
    });

    $('.btn-save-input-no-asset-modal').click(function() {
    	var isValid = false;
        if($('#modal_asset_no').val() == '') {
            $('#modal_asset_no').parents('.form-group').addClass('has-error').find('.help-block').html('Masukan No Asset.');
            $('#modal_asset_no').focus();
            isValid = false;
        }else{
        	$('#modal_asset_no').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            isValid = true;

	    	$.ajax({
				url: base_url + 'spmb/api/updateAssetDetails',
				dataType: 'json',
				type: 'POST',
				data: { 
						_token: myToken,
		                spmb_detail_id: input_no_asset_spmb_detail_id,
		                spmb_detail_asset_no: $('#modal_asset_no').val()
		               },
		        error: function(data) {
		        	console.log('error loading data..');
		        	alert('Error loading data...');
		        },
		        success: function(data) {
					if(data.status == '200') {
                        swal("Success!", "Data has been updated.", "success");
                        $('.btn-close-input-no-asset-modal').click();
                    }else{
                        swal("Failed!", "Order payment failed.", "error");
                    }
		        }
			});
        }
    });
});