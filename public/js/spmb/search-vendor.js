var spmb_detail_id = '';
$(document).ready(function() {
        $('.search-vendor-spmb-item').click(function() {
        	var item_category_id = $(this).data('item-id');
        	spmb_detail_id = $(this).data('detail-id');
        	load_recommended_vendors(item_category_id);
        	$('#modalSearchVendor').modal();
        });

        $('body').on('click', '.btn-select-vendor', function() {
        	var vendor_id = $(this).data('vendor-id');
        	var vendor_name = $(this).data('vendor-name');
                clear_modal_select_vendor();

        	$('input[name=modal_select_vendor_spmb_detail_id]').val(spmb_detail_id);
        	$('input[name=modal_select_vendor_vendor_id]').val(vendor_id);
        	$('#modal_select_vendor_vendor_name').val(vendor_name);

        	//alert(vendor_id);
        	$('#modalSelectVendor').modal();
        });

        $('.btn-save-select-vendor-modal').click(function() {
                save_spmb_detail_vendor();
        });

        $('#modal_select_vendor_offer_price').keypress(function(evt) {
                return isNumberKey(evt);
        });
});

function load_recommended_vendors(item_category_id)
{
	$.ajax({
		url: base_url + 'vendor/api/search-recommended',
		dataType: 'json',
		type: 'POST',
		data: { 
				_token: myToken,
				item_category_id: item_category_id },
        error: function(data) {
        	console.log('error loading data..');
        	alert('Error loading data...');
        },
        success: function(data) {
        	console.log(data);

        	var items = '';
        	$('#recommended-vendor-table tbody').empty();

        	$.each(data.vendors, function(key, value) {
        		items += '<tr>';
        		items += '<td>';
        			items += '<b>' + value.vendor_name + '</b><br/>';
        			items += '<small>' + value.vendortype.vendor_type_name + '</small><br/>';
        			items += '<small><i>';
        			$.each(value.itemcategories, function(k, v) {
        				items += v.item_category_name;
        				if((k+1)!=value.itemcategories.length) {
        					items += ', ';
        				}
        			});
        			items += '</i></small>';
        		items += '</td>';
        		items += '<td>';
	        		$.each(value.ratings, function(k, v) {
	        			items += v.rating_name + '<br/>';
	        		});
        		items += '</td>';
        		items += '<td></td>';
        		items += '<td><center><a href="javascript:void(0)" class="btn btn-success btn-select-vendor" data-vendor-name="' + value.vendor_name + '" data-vendor-id="' + value.vendor_id + '">Pilih</a></center></td>';
        		items += '</tr>';
        	});

        	$('#recommended-vendor-table tbody').append(items);
        }
	});
}

function clear_modal_select_vendor()
{
        $('input[name="modal_select_vendor_spmb_detail_id"]').val('');
        $('input[name="modal_select_vendor_vendor_id"]').val('');
        $('#modal_select_vendor_vendor_name').val('');
        $('#modal_select_vendor_offer_price').val('');
        $('#modal_select_vendor_note').val('');
}

function save_spmb_detail_vendor()
{
        var isValid = false;
        if($('#modal_select_vendor_vendor_name').val() == '') {
                $('#modal_select_vendor_vendor_name').parents('.form-group').addClass('has-error').find('.help-block').html('Vendor harus dipilih.');
                $('#modal_select_vendor_vendor_name').focus();
                isValid = false;
        }else if($('#modal_select_vendor_offer_price').val() == '') {
                $('#modal_select_vendor_offer_price').parents('.form-group').addClass('has-error').find('.help-block').html('Harga harus diisi.');
                $('#modal_select_vendor_offer_price').focus();
                isValid = false;
        }else{
                $('#modal_select_vendor_vendor_name').parents('.form-group').removeClass('has-error').find('.help-block').html('');
                $('#modal_select_vendor_offer_price').parents('.form-group').removeClass('has-error').find('.help-block').html('');
                isValid = true;

                $.ajax({
                        url: base_url + 'spmb/api/storeDetailVendor',
                        dataType: 'json',
                        data: {
                                spmb_detail_id : $('input[name=modal_select_vendor_spmb_detail_id]').val(),
                                vendor_id : $('input[name=modal_select_vendor_vendor_id]').val(),
                                spmb_detail_vendor_offer_price : $('#modal_select_vendor_offer_price').val(),
                                spmb_detail_vendor_note : $('#modal_select_vendor_note').val(),
                                _token: myToken
                            },
                        type: 'POST',
                        error: function(data) {
                            swal("Failed!", "Adding data failed.", "error");
                        },
                        success: function(data) {
                            if(data.status == '200') {
                                swal("Success!", "Your item has been added.", "success");
                                $('.btn-close-select-vendor-modal').click();
                            }else{
                                swal("Failed!", "Adding data failed.", "error");
                            }
                        }
                });
        }
}