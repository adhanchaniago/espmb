var myToken = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function() {
	$('.view-detail-spmb-item').click(function() {
		clearDetail();
		loadDetail($(this).data('detail-id'));
		loadDetailPayment($(this).data('detail-id'));
		loadDetailReceipt($(this).data('detail-id'));
		loadDetailRating($(this).data('detail-id'));
		$('#modalViewDetailSPMB').modal();
	});
});

function loadDetail(id) 
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
        	//console.log(data);
 			$('#span_item_category_name').append(data.detail.itemcategory.item_category_name);
			$('#span_spmb_detail_account_no').append(data.detail.spmb_detail_account_no);
			$('#span_spmb_detail_item_name').append(data.detail.spmb_detail_item_name);
			$('#span_unit_name').append(data.detail.unit.unit_name);
			$('#span_spmb_detail_qty').append(data.detail.spmb_detail_qty);
			$('#span_spmb_detail_note').append(data.detail.spmb_detail_note);    

			var tbl = '';
			$.each(data.detail.spmbdetailvendors, function(key, value) {
				tbl += '<tr>';
				tbl += '<td>' + value.vendor.vendor_name + '</td>';
				tbl += '<td>' + convertNumber(value.spmb_detail_vendor_offer_price) + '</td>';
				tbl += '<td>' + convertNumber(value.spmb_detail_vendor_deal_price) + '</td>';
				tbl += '<td>' + ((value.spmb_detail_vendor_status=='1') ? 'DEAL' : 'WAITING') + '</td>';
				tbl += '<td>' + ((value.spmb_detail_vendor_note==null) ? '-' : value.spmb_detail_vendor_note) + '</td>';
				tbl += '</tr>';
			});

			$('#vendor-tables').append(tbl);
        }
	});
}

function loadDetailPayment(spmb_detail_id)
{
	$.ajax({
		url: base_url + 'spmb/api/loadDetailPayment',
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
				html += '<td>' + ((value.spmb_detail_payment_status=='1') ? convertDate(value.spmb_detail_payment_finish_date) : '-') + '</td>';
				html += '<td>' + convertNumber(value.spmb_detail_payment_amount) + '</td>';
				html += '<td>' + ((value.spmb_detail_payment_status=='1') ? 'COMPLETED' : 'WAITING PAYMENT') + '</td>';
				html += '<td>' + value.spmb_detail_payment_note + '</td>';
				html += '</tr>';
			});

			$('#order-payment-tables tbody').append(html);
        }
	});

	//return html;
}

function loadDetailReceipt(spmb_detail_id)
{
	$.ajax({
		url: base_url + 'spmb/api/loadDetailReceipt',
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

			$.each(data.detail_receipt, function(key, value) {
				html += '<tr>';
				html += '<td>' + value.spmb_detail_receipt_no + '</td>';
				html += '<td>' + convertDate(value.spmb_detail_receipt_date) + '</td>';
				html += '<td>' + value.spmb_detail_receipt_name + '</td>';
				html += '<td>' + value.spmb_detail_receipt_note + '</td>';
				html += '</tr>';
			});

			$('#receipt-tables tbody').append(html);
        }
	});

	//return html;
}

function loadDetailRating(spmb_detail_id)
{
	$.ajax({
		url: base_url + 'spmb/api/loadModalRating',
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

			$.each(data.detail_vendor.vendor.ratings, function(key, value) {
				html += value.rating_name + '&nbsp;:&nbsp;<select class="select-rating" id="view_' + value.rating_name + '_' + value.rating_id + '"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select><br/>';
			});

			$('#rating-container').append(html);

			$('.select-rating').barrating({
					theme: 'fontawesome-stars'
				});

			$.each(data.detail_vendor.vendor.ratings, function(key, value) {
				$.ajax({
					url: base_url + 'spmb/api/loadDetailRating',
					dataType: 'json',
					type: 'POST',
					data: { 
							_token: myToken,
			                spmb_detail_id: spmb_detail_id,
			                rating_id: value.rating_id,
			                vendor_id: data.detail_vendor.vendor_id },
			        error: function(data) {
			        	console.log('error loading data..');
			        	alert('Error loading data...');
			        },
			        success: function(data) {
			        	console.log(data.score.score);
			  			$('#view_' + value.rating_name + '_' + value.rating_id).barrating('set', data.score.score);      	
			        }
				});		
			});
			//$('#' + value.rating_name + '_' + value.rating_id).barrating('set', 2);
			//$('.select-rating').barrating('set', 2);
        }
	});
}

function clearDetail()
{
	$('#span_item_category_name').empty();
	$('#span_spmb_detail_account_no').empty();
	$('#span_spmb_detail_item_name').empty();
	$('#span_unit_name').empty();
	$('#span_spmb_detail_qty').empty();
	$('#span_spmb_detail_note').empty();

	$('#vendor-tables tbody').empty();
	$('#order-payment-tables tbody').empty();
	$('#receipt-tables tbody').empty();
	$('#rating-container').empty();
}