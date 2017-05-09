var myToken = $('meta[name="csrf-token"]').attr('content');
var report_type = '';
var period_daily = '';
var period_month = '';
var period_year = '';
var period_start = '';
var period_end = '';
var division_ids = [];
var payment_types = [];
var payment_status = '';

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
		payment_types = $('#payment_types').val();
		payment_status = $('#payment_status').val();

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
			name: "Report FICO SPMB",
			filename: "report_fico_spmb"
		});
	});
});

function generate_report() {
	$.ajax({
		url: base_url + 'report/api/generate-fico',
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
			payment_types:payment_types,
			payment_status:payment_status
		},
		error: function(data) {
			console.log('error');
		},
		success: function(data) {
			console.log(data);

			var html = '';
			var sum_spmb = 0;
			var sum_total_amount = 0;
			$('#grid-data-result tbody').empty();
			$.each(data.result, function(key, value){
				var payment_amount = (value.spmb_detail_payment_amount==null) ? '-' : 'Rp ' + convertNumber(value.spmb_detail_payment_amount);
				var payment_status = (value.spmb_detail_payment_status==0) ? 'Waiting Payment' : 'Completed';
				html += '<tr>';
				html += '<td>'  + value.company_name + '</td>';
				html += '<td>'  + value.division_name + '</td>';
				html += '<td>'  + value.created_at + '</td>';
				html += '<td>'  + value.spmb_no + '</td>';
				html += '<td>'  + payment_amount + '</td>';
				html += '<td>'  + value.payment_type_name + '</td>';
				html += '<td>'  + payment_status + '</td>';
				html += '<td>'  + value.spmb_detail_payment_request_date + '</td>';
				html += '<td>'  + value.spmb_detail_payment_transfer_date + '</td>';
				html += '<td>'  + value.spmb_detail_payment_finish_date + '</td>';
				html += '<td>'  + value.spmb_detail_payment_request_name + '</td>';
				html += '</tr>';
				sum_spmb += 1;
				sum_total_amount += value.spmb_detail_payment_amount;
			});

			html += '<tr>';
			html += '<td colspan="4">Total</td>';
			html += '<td>Rp '  + convertNumber(sum_total_amount) + '</td>';
			html += '<td colspan="5"></td>';
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
	$('#payment_types').selectpicker('deselectAll');
	$('#payment_status').val('');
	$('#report_type').val('');

	$('#division_ids').selectpicker('refresh');
	$('#payment_types').selectpicker('refresh');
	$('#payment_status').selectpicker('refresh');
	$('#report_type').selectpicker('refresh');

	report_type = '';
	period_daily = '';
	period_month = '';
	period_year = '';
	period_start = '';
	period_end = '';
	division_ids = [];
	payment_types = [];
	payment_status = '';

	$('#grid-data-result tbody').empty();
}