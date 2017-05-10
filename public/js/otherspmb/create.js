var myToken = $('meta[name="csrf-token"]').attr('content');
var numberOfRules = 0;

$(document).ready(function() {
    load_spmb_detail();
    append_spmb_rules($('#spmb_type_id').val());

    $('#spmb_type_id').change(function() {
        var spmb_type_id = $(this).val();

        append_spmb_rules(spmb_type_id);
    });

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
            		dr += '<option data-costcenter="' + value.division_code + '" value="' + value.division_id + '">' + value.division_name + '</option>';
            	});
            	$('#division_id').append(dr);

            	$('#division_id').selectpicker('refresh');

                $('#spmb_cost_center').val($('#division_id option:selected').data('costcenter'));
            }
    	});
	});

    $('#division_id').change(function() {
        $('#spmb_cost_center').val($('#division_id option:selected').data('costcenter'));
    });

    //on change rules
    var clicked_rules = [];
    $('body').on('click','.rule_items',function() {
        clicked_rules = [];
        $.each($('.rule_items'), function(k,v) {
            if(v.checked)
                clicked_rules.push(v.value);
        });
    });

    //modal
    $(".command-add-spmb-detail").click(function(){
        clearModalAdd();
        $('#modalAddDetailSPMB').modal();
    });

    $('.btn-add-spmb-detail').click(function() {
        save_spmb_detail();
    });

    $('body').on('click','.btn-delete-spmb-detail', function(){
        var key = $(this).data('key');

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false
        },
        function(){
            delete_spmb_detail(key);
        });
    });


    function append_spmb_rules(spmb_type_id) {
        $.ajax({
            url: base_url + 'master/spmbtype/api/getRules',
            dataType: 'json',
            type: 'POST',
            data: { 
                    _token: myToken,
                    id: spmb_type_id },
            error: function(data) {
                console.log('error loading data..');
            },
            success: function(data) {
                var html = '';
                numberOfRules = data.length;
                $('#spmb_rules_container').empty();
                $.each(data, function(key,value) {
                    html += '<input type="checkbox" name="spmb_rules[]" class="rule_items" value="' + value.rule_id + '">&nbsp;' + value.rule_name + '<br/>';
                });

                $('#spmb_rules_container').append(html);
                //alert(numberOfRules);
            }
        });
    }


    function clearModalAdd() {
        $('#modal_add_item_category_id').val('');
        $('#modal_add_item_category_id').selectpicker('refresh');
        $('#modal_add_spmb_detail_account_no').val('');
        $('#modal_add_spmb_detail_sequence_no').val('');
        $('#modal_add_spmb_detail_item_name').val('');
        $('#modal_add_unit_id').val('');
        $('#modal_add_unit_id').selectpicker('refresh');
        $('#modal_add_spmb_detail_qty').val('');
        $('#modal_add_spmb_detail_item_price').val('');
        $('#modal_add_spmb_detail_asset_no').val('');
        $('#modal_add_vendor_id').val('');
        $('#modal_add_vendor_id').selectpicker('refresh');
        $('#modal_add_spmb_detail_note').val('');
    }

    function save_spmb_detail() {
        var isValid = false;
        if($('#modal_add_item_category_id').val() == '') {
            $('#modal_add_item_category_id').parents('.form-group').addClass('has-error').find('.help-block').html('Kategori harus dipilih.');
            $('#modal_add_item_category_id').focus();
            isValid = false;
        }else if($('#modal_add_spmb_detail_account_no').val() == '') {
            $('#modal_add_spmb_detail_account_no').parents('.form-group').addClass('has-error').find('.help-block').html('No. ACC harus diisi.');
            $('#modal_add_spmb_detail_account_no').focus();
            isValid = false;
        }else if($('#modal_add_spmb_detail_sequence_no').val() == '') {
            $('#modal_add_spmb_detail_sequence_no').parents('.form-group').addClass('has-error').find('.help-block').html('No. Urut harus diisi.');
            $('#modal_add_spmb_detail_sequence_no').focus();
            isValid = false;
        }else if($('#modal_add_spmb_detail_item_name').val() == '') {
            $('#modal_add_spmb_detail_item_name').parents('.form-group').addClass('has-error').find('.help-block').html('Nama Barang harus diisi.');
            $('#modal_add_spmb_detail_item_name').focus();
            isValid = false;
        }else if($('#modal_add_unit_id').val() == '') {
            $('#modal_add_unit_id').parents('.form-group').addClass('has-error').find('.help-block').html('Satuan harus dipilih.');
            $('#modal_add_unit_id').focus();
            isValid = false;
        }else if($('#modal_add_spmb_detail_qty').val() == '') {
            $('#modal_add_spmb_detail_qty').parents('.form-group').addClass('has-error').find('.help-block').html('Qty harus diisi.');
            $('#modal_add_spmb_detail_qty').focus();
            isValid = false;
        }else if($('#modal_add_spmb_detail_item_price').val() == '') {
            $('#modal_add_spmb_detail_item_price').parents('.form-group').addClass('has-error').find('.help-block').html('Harga satuan harus diisi.');
            $('#modal_add_spmb_detail_item_price').focus();
            isValid = false;
        }else if($('#modal_add_vendor_id').val() == '') {
            $('#modal_add_vendor_id').parents('.form-group').addClass('has-error').find('.help-block').html('Vendor harus dipilih.');
            $('#modal_add_vendor_id').focus();
            isValid = false;
        }else{
            $('#modal_add_item_category_id').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            $('#modal_add_spmb_detail_account_no').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            $('#modal_add_spmb_detail_sequence_no').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            $('#modal_add_spmb_detail_item_name').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            $('#modal_add_unit_id').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            $('#modal_add_spmb_detail_qty').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            $('#modal_add_spmb_detail_item_price').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            $('#modal_add_vendor_id').parents('.form-group').removeClass('has-error').find('.help-block').html('');
            isValid = true;

            $.ajax({
                url: base_url + 'otherspmb/api/storeDetail',
                dataType: 'json',
                data: {
                        item_category_id : $('#modal_add_item_category_id').val(),
                        item_category_name : $('#modal_add_item_category_id option:selected').text(),
                        spmb_detail_account_no : $('#modal_add_spmb_detail_account_no').val(),
                        spmb_detail_sequence_no : $('#modal_add_spmb_detail_sequence_no').val(),
                        spmb_detail_item_name : $('#modal_add_spmb_detail_item_name').val(),
                        unit_id : $('#modal_add_unit_id').val(),
                        unit_name : $('#modal_add_unit_id option:selected').text(),
                        spmb_detail_qty : $('#modal_add_spmb_detail_qty').val(),
                        spmb_detail_item_price : $('#modal_add_spmb_detail_item_price').val(),
                        spmb_detail_asset_no : $('#modal_add_spmb_detail_asset_no').val(),
                        vendor_id : $('#modal_add_vendor_id').val(),
                        vendor_name : $('#modal_add_vendor_id option:selected').text(),
                        spmb_detail_note : $('#modal_add_spmb_detail_note').val(),
                        _token: myToken
                    },
                type: 'POST',
                error: function(data) {
                    swal("Failed!", "Adding data failed.", "error");
                },
                success: function(data) {
                    if(data.status == '200') {
                        swal("Success!", "Your item has been added.", "success");
                        load_spmb_detail();
                        $('.btn-close-spmb-detail').click();
                    }else{
                        swal("Failed!", "Adding data failed.", "error");
                    }
                }
            });
        }
    }

    function delete_spmb_detail(key) {
        $.ajax({
            url: base_url + 'otherspmb/api/deleteDetail',
            dataType: 'json',
            data: {
                    key : key,
                    _token: myToken
                },
            type: 'POST',
            error: function(data) {
                swal("Failed!", "Deleting data failed.", "error");
            },
            success: function(data) {
                if(data.status == '200') {
                    swal("Success!", "Your data has been deleted.", "success");
                    load_spmb_detail();
                }else{
                    swal("Failed!", "Deleting data failed.", "error");
                }
            }
        });
    }

    function load_spmb_detail() {
        $.ajax({
            url: base_url + 'otherspmb/api/loadDetails',
            dataType: 'json',
            type: 'GET',
            error: function(data) {
                alert('error');
            },
            success: function(data) {
                var html = '';
                $.each(data.details, function(key, value) {
                    console.log(value);
                    html += '<tr>';
                    html += '<td>' + value.spmb_detail_account_no + '</td>';
                    html += '<td>' + value.spmb_detail_sequence_no + '</td>';
                    html += '<td>' + value.spmb_detail_item_name + '</td>';
                    html += '<td>' + value.unit_name + '</td>';
                    html += '<td>' + value.spmb_detail_qty + '</td>';
                    html += '<td>' + value.spmb_detail_note + '</td>';
                    html += '<td><a title="Delete Item" href="javascript:void(0);" class="btn btn-icon btn-delete-spmb-detail waves-effect waves-circle" type="button" data-key="' + key + '"><span class="zmdi zmdi-delete"></span></a></td>';
                    html += '</tr>';
                });

                $('#tabel_detail_spmb tbody').empty();
                $('#tabel_detail_spmb tbody').append(html);
            }
        });
    }

});