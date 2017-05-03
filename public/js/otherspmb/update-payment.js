var update_payment_spmb_detail_id = 0;

$(document).ready(function() {
	$('.update-payment-spmb-item').click(function() {
		update_payment_spmb_detail_id = $(this).data('detail-id');

		clearUpdatePayment();
		loadPayment(update_payment_spmb_detail_id);
    	$('#modalUpdatePaymentVendor').modal();
    });

    $('.btn-save-update-payment-vendor-modal').click(function() {
    	$.ajax({
			url: base_url + 'otherspmb/api/loadDetailPayment',
			dataType: 'json',
			type: 'POST',
			data: { 
					_token: myToken,
	                spmb_detail_id: update_payment_spmb_detail_id },
	        error: function(data) {
	        	console.log('error loading data..');
	        	alert('Error loading data...');
	        },
	        success: function(data) {
	        	var html = '';

				$.each(data.detail_payments, function(key, value) {
					$.ajax({
						url: base_url + 'otherspmb/api/updatePayment',
						dataType: 'json',
						type: 'POST',
						data: { 
								_token: myToken,
				                spmb_detail_payment_id: value.spmb_detail_payment_id,
				                spmb_detail_payment_finish_date: $('#finish_date_' + value.spmb_detail_payment_id).val(),
				                spmb_detail_payment_note: $('#note_' + value.spmb_detail_payment_id).val()
				               },
				        error: function(data) {
				        	console.log('error loading data..');
				        	alert('Error loading data...');
				        },
				        success: function(data) {
							if(data.status == '200') {
			                    console.log('Success update payment data');
			                }else{
			                    console.log('Failed to update payment data');
			                }
				        }
					});
				});

				swal("Success!", "Payment has been updated.", "success");
			    $('.btn-close-update-payment-vendor-modal').click();
	        }
		});
    });
});

function loadPayment(spmb_detail_id)
{
	$.ajax({
		url: base_url + 'otherspmb/api/loadDetailPayment',
		dataType: 'json',
		type: 'POST',
		data: { 
				_token: myToken,
                spmb_detail_id: spmb_detail_id },
        error: function(data) {
        	console.log('error loading data..');
        	alert('Error loading data...');
        },
        success: function(data) {
        	var html = '';

			$.each(data.detail_payments, function(key, value) {
				html += '<tr>';
				html += '<td>' + value.paymenttype.payment_type_name + '</td>';
				html += '<td>' + convertDate(value.spmb_detail_payment_request_date) + '</td>';
				html += '<td>' + convertDate(value.spmb_detail_payment_transfer_date) + '</td>';
				html += '<td>' + '<input type="text" name="finish_date_' + value.spmb_detail_payment_id + '" id="finish_date_' + value.spmb_detail_payment_id + '" class="input-sm form-control input-mask-date" maxlength="10" autocomplete="off" data-mask="00/00/0000" value="' + convertDate(value.spmb_detail_payment_finish_date) + '"></td>';
				html += '<td>' + convertNumber(value.spmb_detail_payment_amount) + '</td>';
				html += '<td>' + ((value.spmb_detail_payment_status=='1') ? 'COMPLETED' : 'WAITING PAYMENT') + '</td>';
				html += '<td><textarea name="note_' + value.spmb_detail_payment_id + '" id="note_' + value.spmb_detail_payment_id + '" class="input-sm form-control">' + value.spmb_detail_payment_note + '</textarea></td>';
				html += '</tr>';
			});

			$('#update-payment-tables tbody').append(html);

			$('.input-mask-date').mask('00/00/0000');
        }
	});

	//return html;
}

function clearUpdatePayment()
{
	$('#update-payment-tables tbody').empty();
}