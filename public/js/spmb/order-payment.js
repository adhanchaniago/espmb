var order_payment_spmb_detail_id = 0;

$(document).ready(function() {
	$('.order-payment-spmb-item').click(function() {
		order_payment_spmb_detail_id = $(this).data('detail-id');

		clearOrderPayment();
		loadOrderPayment(order_payment_spmb_detail_id);
    	$('#modalOrderPaymentVendor').modal();
    });

    $('body').on('keypress', '#modal_amount', function(evt) {
    	return isNumberKey(evt);
    });

    $('.btn-save-order-payment-vendor-modal').click(function() {
    	var isValid = false;
        if($('#modal_payment_type').val() == '') {
            $('#modal_payment_type').parents('.form-group').addClass('has-error').find('.help-block').html('Pilih tipe pembayaran.');
            $('#modal_payment_type').focus();
            isValid = false;
        }else if($('#modal_transfer_date').val() == '') {
            $('#modal_transfer_date').parents('.form-group').addClass('has-error').find('.help-block').html('Tanggal Pembayaran harus diisi.');
            $('#modal_transfer_date').focus();
            isValid = false;
        }else if($('#modal_amount').val() == '') {
            $('#modal_amount').parents('.form-group').addClass('has-error').find('.help-block').html('Total Pembayaran harus diisi.');
            $('#modal_amount').focus();
            isValid = false;
        }else if($('#modal_request_name').val() == '') {
            $('#modal_request_name').parents('.form-group').addClass('has-error').find('.help-block').html('Penanggung Jawab harus diisi.');
            $('#modal_request_name').focus();
            isValid = false;
        }else{
            $('#modal_payment_type').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            $('#modal_transfer_date').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            $('#modal_amount').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            $('#modal_request_name').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            isValid = true;

	    	$.ajax({
				url: base_url + 'spmb/api/storeOrderPayment',
				dataType: 'json',
				type: 'POST',
				data: { 
						_token: myToken,
		                spmb_detail_id: order_payment_spmb_detail_id,
		                payment_type_id: $('#modal_payment_type').val(),
		                spmb_detail_payment_transfer_date: $('#modal_transfer_date').val(),
		                spmb_detail_payment_amount: $('#modal_amount').val(),
		                spmb_detail_payment_note: $('#modal_note').val(),
		                spmb_detail_payment_request_name: $('#modal_request_name').val()
		               },
		        error: function(data) {
		        	console.log('error loading data..');
		        	alert('Error loading data...');
		        },
		        success: function(data) {
					if(data.status == '200') {
                        swal("Success!", "Your order payment has been added.", "success");
                        $('.btn-close-order-payment-vendor-modal').click();
                    }else{
                        swal("Failed!", "Order payment failed.", "error");
                    }
		        }
			});
		}
    });
});

function loadOrderPayment(id) 
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
			$('#modal_vendor').val(data.vendor);
			$('#modal_nama_barang').val(data.item_name);
			$('#modal_qty').val(data.qty);
			$('#modal_price').val(convertNumber(data.price));
			$('#modal_total').val(convertNumber(data.total));
        }
	});
}

function clearOrderPayment()
{
	$('#modal_vendor').val('');
	$('#modal_nama_barang').val('');
	$('#modal_qty').val('');
	$('#modal_price').val('');
	$('#modal_total').val('');
	
	$('#modal_payment_type').val('');
	$('#modal_payment_type').selectpicker('refresh');
	$('#modal_transfer_date').val('');
	$('#modal_amount').val('');
	$('#modal_note').val('');
	$('#modal_request_name').val('');
}