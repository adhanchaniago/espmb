var negotiation_spmb_detail_id = 0;

$(document).ready(function() {
	$('.negotiation-vendor-spmb-item').click(function() {
		negotiation_spmb_detail_id = $(this).data('detail-id');

		clearDetailNegotiation();
		loadDetailNegotiation(negotiation_spmb_detail_id);
    	$('#modalNegotiationVendor').modal();
    });

    $('body').on('keypress', '.input_deal_price', function(evt) {
    	return isNumberKey(evt);
    });

    $('.btn-save-negotiation-vendor-modal').click(function() {
    	var id = $(this).data('spmb-detail-id');

    	$.ajax({
			url: base_url + 'spmb/api/loadDetail',
			dataType: 'json',
			type: 'POST',
			data: { 
					_token: myToken,
	                spmb_detail_id: negotiation_spmb_detail_id },
	        error: function(data) {
	        	console.log('error loading data..');
	        	alert('Error loading data...');
	        },
	        success: function(data) {
				var tbl = '';
				$.each(data.detail.spmbdetailvendors, function(key, value) {
					console.log($('#spmb_detail_vendor_deal_price-' + value.spmb_detail_vendor_id).val());
					var update_spmb_detail_vendor_id = value.spmb_detail_vendor_id;
					var update_spmb_detail_vendor_deal_price = $('#spmb_detail_vendor_deal_price-' + value.spmb_detail_vendor_id).val();
					var update_spmb_detail_vendor_status = $('#spmb_detail_vendor_status-' + value.spmb_detail_vendor_id).val();
					var update_spmb_detail_vendor_note = $('#spmb_detail_vendor_note-' + value.spmb_detail_vendor_id).val();

					$.ajax({
						url: base_url + 'spmb/api/updateDetailVendor',
						dataType: 'json',
						type: 'POST',
						data: { 
								_token: myToken,
				                spmb_detail_vendor_id: update_spmb_detail_vendor_id,
				                spmb_detail_vendor_deal_price: update_spmb_detail_vendor_deal_price,
				                spmb_detail_vendor_status: update_spmb_detail_vendor_status,
				                spmb_detail_vendor_note: update_spmb_detail_vendor_note
				                },
				        error: function(data) {
				        	console.log('error loading data..');
				        	alert('Error loading data...');
				        },
				        success: function(data) {
				        	if(data.status == '200') {
                                console.log('update data spmb detail vendor success');
                            }else{
                                console.log('update data spmb detail vendor failed');
                            }
				        }
					});

					$('.btn-close-negotiation-vendor-modal').click();
					/*tbl += '<tr>';
					tbl += '<td>' + value.vendor.vendor_name + '<input type="hidden" name="spmb_detail_vendor_id" value="-' + value.spmb_detail_vendor_id + '"></td>';
					tbl += '<td>' + convertNumber(value.spmb_detail_vendor_offer_price) + '</td>';
					tbl += '<td><input name="spmb_detail_vendor_deal_price" id="spmb_detail_vendor_deal_price-' + value.spmb_detail_vendor_id + '" class="input_deal_price input-sm form-control" value="' + value.spmb_detail_vendor_deal_price + '"></td>';
					tbl += '<td><select name="spmb_detail_vendor_status" id="spmb_detail_vendor_status-' + value.spmb_detail_vendor_id + '" class="input_vendor_status input-sm form-control"><option value="0" ' + ((value.spmb_detail_vendor_status=='0') ? 'selected' : '') + '>WAITING</option><option value="1" ' + ((value.spmb_detail_vendor_status=='1') ? 'selected' : '') + '>DEAL</option></select></td>';
					tbl += '<td><textarea name="spmb_detail_vendor_note" id="spmb_detail_vendor_note-' + value.spmb_detail_vendor_id + '" class="input_vendor_note input-sm form-control">' + ((value.spmb_detail_vendor_note==null) ? '-' : value.spmb_detail_vendor_note) + '</textarea></td>';
					tbl += '</tr>';*/
				});
	        }
		});
    });
});

function loadDetailNegotiation(id) 
{
	$.ajax({
		url: base_url + 'spmb/api/loadDetail',
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
			var tbl = '';
			$.each(data.detail.spmbdetailvendors, function(key, value) {
				tbl += '<tr>';
				tbl += '<td>' + value.vendor.vendor_name + '<input type="hidden" name="spmb_detail_vendor_id" value="-' + value.spmb_detail_vendor_id + '"></td>';
				tbl += '<td>' + convertNumber(value.spmb_detail_vendor_offer_price) + '</td>';
				tbl += '<td><input name="spmb_detail_vendor_deal_price" id="spmb_detail_vendor_deal_price-' + value.spmb_detail_vendor_id + '" class="input_deal_price input-sm form-control" value="' + value.spmb_detail_vendor_deal_price + '"></td>';
				tbl += '<td><select name="spmb_detail_vendor_status" id="spmb_detail_vendor_status-' + value.spmb_detail_vendor_id + '" class="input_vendor_status input-sm form-control"><option value="0" ' + ((value.spmb_detail_vendor_status=='0') ? 'selected' : '') + '>WAITING</option><option value="1" ' + ((value.spmb_detail_vendor_status=='1') ? 'selected' : '') + '>DEAL</option></select></td>';
				tbl += '<td><textarea name="spmb_detail_vendor_note" id="spmb_detail_vendor_note-' + value.spmb_detail_vendor_id + '" class="input_vendor_note input-sm form-control">' + ((value.spmb_detail_vendor_note==null) ? '-' : value.spmb_detail_vendor_note) + '</textarea></td>';
				tbl += '</tr>';
			});

			$('#negotiation-vendor-tables').append(tbl);
        }
	});
}

function clearDetailNegotiation()
{
	$('#negotiation-vendor-tables tbody').empty();
}