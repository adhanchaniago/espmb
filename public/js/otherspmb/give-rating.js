var spmb_detail_id = 0;
$(document).ready(function() {
	$('.give-rating-spmb-item').click(function() {
		spmb_detail_id = $(this).data('detail-id');

		clearModalRatings();
		loadModalRating(spmb_detail_id);
    	$('#modalGiveRatingVendor').modal();
    });

    $('.btn-save-give-rating-vendor-modal').click(function() {
    	$.ajax({
			url: base_url + 'otherspmb/api/loadModalRating',
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
	        	var vendor_id = data.detail_vendor.vendor_id;

				$.each(data.detail_vendor.vendor.ratings, function(key, value) {
					$.ajax({
						url: base_url + 'otherspmb/api/saveRating',
						dataType: 'json',
						type: 'POST',
						data: { 
								_token: myToken,
				                spmb_detail_id: spmb_detail_id,
				                rating_id: value.rating_id,
				                vendor_id: vendor_id,
				                score: $('#' + value.rating_name + '_' + value.rating_id).val()
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

				swal("Success!", "Rating has been added.", "success");
			    $('.btn-close-give-rating-vendor-modal').click();
	        }
		});
    });
});

function loadModalRating(spmb_detail_id)
{
	$.ajax({
		url: base_url + 'otherspmb/api/loadModalRating',
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

        	$('#modal_vendor').val(data.detail_vendor.vendor.vendor_name);

			$.each(data.detail_vendor.vendor.ratings, function(key, value) {
				html += value.rating_name + '&nbsp;:&nbsp;<select class="select-rating" id="' + value.rating_name + '_' + value.rating_id + '"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select><br/>';
			});

			$('#modal_rating').append(html);

			$('.select-rating').barrating({
					theme: 'fontawesome-stars'
				});
        }
	});
}

function clearModalRatings()
{
	$('#modal_vendor').val('');
	$('#modal_rating').empty();
}