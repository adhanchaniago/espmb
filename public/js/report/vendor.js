var myToken = $('meta[name="csrf-token"]').attr('content');
var report_type = '';
var period_daily = '';
var period_month = '';
var period_year = '';
var period_start = '';
var period_end = '';
var division_ids = [];
var item_categories = [];
var vendors = [];
var pics = [];

$(document).ready(function() {
	clear_filter();

	$('#report_type').change(function() {
		if($(this).val()=='daily') {
			refresh_period_container();

			$('#container_daily').show();
		}else if($(this).val()=='monthly') {
			refresh_period_container();

			$('#container_month').show();
			$('#container_year').show();
		}else if($(this).val()=='yearly') {
			refresh_period_container();

			$('#container_year').show();
		}else if($(this).val()=='period') {
			refresh_period_container();

			$('#container_period_start').show();
			$('#container_period_end').show();
		}else{
			refresh_period_container();
		}
	});

	$('#btn_generate_report').click(function() {
		report_type = $('#report_type').val();
		period_daily = $('#period_daily').val();
		period_month = $('#period_month').val();
		period_year = $('#period_year').val();
		period_start = $('#period_start').val();
		period_end = $('#period_end').val();
		division_ids = $('#division_ids').val();
		item_categories = $('#item_categories').val();
		vendors = $('#vendors').val();
		pics = $('#pics').val();

		if(report_type=='daily') {
			if(period_daily=='') {
				swal("Failed!", "Date must be filled.", "error");
			}else{
				generate_report();
			}
		}else if(report_type=='monthly') {
			if(period_month=='') {
				swal("Failed!", "Month must be selected.", "error");
			}else if(period_year==''){
				swal("Failed!", "Year must be filled.", "error");
			}else{
				generate_report();
			}
		}else if(report_type=='yearly') {
			if(period_year=='') {
				swal("Failed!", "Year must be filled.", "error");
			}else{
				generate_report();
			}
		}else if(report_type=='period') {
			if(period_start=='') {
				swal("Failed!", "Period start must be filled.", "error");
			}else if(period_end==''){
				swal("Failed!", "Period end must be filled.", "error");
			}else{
				generate_report();
			}
		}else{
			generate_report();
		}
	});

	$('#btn_clear_report').click(function() {
		clear_filter();
	});

	$('#btn_export_report').click(function() {
		$('#grid-data-result').table2excel({
			exclude: ".noExl",
			name: "Report SPMB Time Process",
			filename: "report_spmb_time_process"
		});
	});
});

function generate_report() {
	$.ajax({
		url: base_url + 'report/api/generate-vendor',
		dataType: 'json',
		type: 'POST',
		data: {
			_token: myToken,
			report_type: report_type,
			period_daily: period_daily,
			period_month: period_month,
			period_year:period_year,
			period_start:period_start,
			period_end:period_end,
			division_ids:division_ids,
			item_categories:item_categories,
			vendors:vendors,
			pics:pics
		},
		error: function(data) {
			console.log('error');
		},
		success: function(data) {
			console.log(data);

			var html = '';
			var sum_spmb = 0;
			var sum_total_price = 0;
			$('#grid-data-result tbody').empty();
			$.each(data.result, function(key, value){
				var total_price = (value.total_price==null) ? '-' : 'Rp ' + convertNumber(value.total_price);
				var pic_name = (value.pic_firstname ==null) ? '-' : value.pic_firstname + ' ' + value.pic_lastname;
				html += '<tr>';
				html += '<td>'  + value.company_name + '</td>';
				html += '<td>'  + value.division_name + '</td>';
				html += '<td>'  + value.created_at + '</td>';
				html += '<td>'  + value.spmb_no + '</td>';
				html += '<td>'  + value.vendor_name + '</td>';
				html += '<td>'  + value.item_category_name + '</td>';
				html += '<td>'  + pic_name + '</td>';
				html += '<td>'  + value.spmb_detail_vendor_offer_price + '</td>';
				html += '<td>'  + value.spmb_detail_vendor_deal_price + '</td>';
				html += '<td>'  + value.spmb_detail_qty + '</td>';
				html += '<td>'  + total_price + '</td>';
				html += '</tr>';
				sum_spmb += 1;
				sum_total_price += value.total_price;
			});

			html += '<tr>';
			html += '<td colspan="9">Total</td>';
			html += '<td>'  + sum_spmb + '</td>';
			html += '<td>Rp '  + convertNumber(sum_total_price) + '</td>';
			html += '</tr>';

			$('#grid-data-result tbody').append(html);
		}
	});
}

function refresh_period_container() {
	$('#container_daily').hide();
	$('#container_month').hide();
	$('#container_year').hide();
	$('#container_period_start').hide();
	$('#container_period_end').hide();

	$('#period_daily').val('');
	$('#period_month').val('');
	$('#period_year').val('');
	$('#period_start').val('');
	$('#period_end').val('');

	$('#container_month').selectpicker('refresh');
}

function clear_filter(){
	refresh_period_container();

	$('#division_ids').selectpicker('deselectAll');
	$('#item_categories').selectpicker('deselectAll');
	$('#vendors').selectpicker('deselectAll');
	$('#pics').selectpicker('deselectAll');
	$('#report_type').val('');

	$('#division_ids').selectpicker('refresh');
	$('#item_categories').selectpicker('refresh');
	$('#pics').selectpicker('refresh');
	$('#vendors').selectpicker('refresh');
	$('#report_type').selectpicker('refresh');

	report_type = '';
	period_daily = '';
	period_month = '';
	period_year = '';
	period_start = '';
	period_end = '';
	division_ids = [];
	vendors = [];
	item_categories = [];
	pics = [];

	$('#grid-data-result tbody').empty();
}