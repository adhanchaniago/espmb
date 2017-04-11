var accept_spmb_detail_id = 0;

$(document).ready(function() {
	$('.accept-spmb-item').click(function() {
		accept_spmb_detail_id = $(this).data('detail-id');

		clearAccept();
		loadAccept(accept_spmb_detail_id);
    	$('#modalAccept').modal();
    });

    /*$('body').on('keypress', '#modal_amount', function(evt) {
    	return isNumberKey(evt);
    });*/

    $('.btn-save-accept-modal').click(function() {
    	var isValid = false;
        if($('#modal_accept_receipt_no').val() == '') {
            $('#modal_accept_receipt_no').parents('.form-group').addClass('has-error').find('.help-block').html('No Surat Jalan harus diisi.');
            $('#modal_accept_receipt_no').focus();
            isValid = false;
        }else if($('#modal_accept_receipt_name').val() == '') {
            $('#modal_accept_receipt_name').parents('.form-group').addClass('has-error').find('.help-block').html('Nama Penerima harus diisi.');
            $('#modal_accept_receipt_name').focus();
            isValid = false;
        }else{
            $('#modal_accept_receipt_no').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            $('#modal_accept_receipt_name').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            isValid = true;

	    	$.ajax({
				url: base_url + 'spmb/api/storeAcceptance',
				dataType: 'json',
				type: 'POST',
				data: { 
						_token: myToken,
		                spmb_detail_id: accept_spmb_detail_id,
		                spmb_detail_receipt_no: $('#modal_accept_receipt_no').val(),
		                spmb_detail_receipt_name: $('#modal_accept_receipt_name').val(),
		                spmb_detail_receipt_note: $('#modal_accept_note').val(),
		               },
		        error: function(data) {
		        	console.log('error loading data..');
		        	alert('Error loading data...');
		        },
		        success: function(data) {
					if(data.status == '200') {
                        swal("Success!", "This item has been accepted.", "success");
                        $('.btn-close-accept-modal').click();
                    }else{
                        swal("Failed!", "Item accepted failed.", "error");
                    }
		        }
			});
		}
    });
});

function loadAccept(id) 
{
	$.ajax({
		url: base_url + 'spmb/api/loadOrderPayment',
		dataType: 'json',
		type: 'POST',
		data: { 
				_token: myToken,
                spmb_detail_id: id },
        error: function(data) {
        	console.log('error loading data..');
        	alert('Error loading data...');
        },
        success: function(data) {
			$('#modal_accept_vendor').val(data.vendor);
			$('#modal_accept_nama_barang').val(data.item_name);
			$('#modal_accept_qty').val(data.qty);
        }
	});
}

function clearAccept()
{
	$('#modal_accept_vendor').val('');
	$('#modal_accept_nama_barang').val('');
	$('#modal_accept_qty').val('');

	$('#modal_accept_receipt_no').val('');
	$('#modal_accept_note').val('');
	$('#modal_accept_receipt_name').val('');
}