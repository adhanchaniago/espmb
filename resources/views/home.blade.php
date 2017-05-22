@extends('vendor.material.layouts.app')

@section('vendorcss')
<link href="{{ url('css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{ url('css/announcement-home.css') }}" rel="stylesheet">
<link href="{{ url('css/monthly.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if(count($announcements) > 0)
    <div id="announcement-container" class="alert alert-info" role="alert">
        <div id="text">
            <!-- 1 Lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="zmdi zmdi-info"></span>&nbsp;&nbsp;&nbsp;&nbsp;
            2 Lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="zmdi zmdi-info"></span>&nbsp;&nbsp;&nbsp;&nbsp;
            3 Lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum lorem itsum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="zmdi zmdi-info"></span>&nbsp;&nbsp;&nbsp;&nbsp; -->
            @foreach($announcements as $announcement)
                {!! $announcement->announcement_detail . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="zmdi zmdi-info"></span>&nbsp;&nbsp;&nbsp;&nbsp;' !!}
            @endforeach
        </div>
    </div>
    @endif
	<div class="block-header">
        <h2>Dashboard</h2>
    </div>
    <!-- <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body card-padding">
            You are logged in!
        </div>
    </div> -->
    <div class="row">
        <div class="col-sm-8 col-md-4">
            <div class="mini-charts-item bgm-cyan">
                <div class="clearfix">
                    <div class="chart stats-bar"><canvas style="display: inline-block; width: 83px; height: 45px; vertical-align: top;" width="83" height="45"></canvas></div>
                    <div class="count">
                        <small>{{ date('Y') }}'s Total SPMB</small>
                        <h2>{{ $total_year }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-8 col-md-4">
            <div class="mini-charts-item bgm-lightgreen">
                <div class="clearfix">
                    <div class="chart stats-bar-2"><canvas style="display: inline-block; width: 83px; height: 45px; vertical-align: top;" width="83" height="45"></canvas></div>
                    <div class="count">
                        <small>{{ date('F') }}'s Total SPMB</small>
                        <h2>{{ $total_month }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-8 col-md-4">
            <div class="mini-charts-item bgm-gray">
                <div class="clearfix">
                    <div class="chart stats-bar"><canvas style="display: inline-block; width: 85px; height: 45px; vertical-align: top;" width="85" height="45"></canvas></div>
                    <div class="count">
                        <small>Today's Total SPMB</small>
                        <h2>{{ $total_today }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8 col-md-4">
            <div class="mini-charts-item bgm-pink">
                <div class="clearfix">
                    <div class="chart stats-bar"><canvas style="display: inline-block; width: 83px; height: 45px; vertical-align: top;" width="83" height="45"></canvas></div>
                    <div class="count">
                        <small>{{ date('Y') }}'s Total PO Belakang</small>
                        <h2>{{ $total_po_belakang_month }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-8 col-md-4">
            <div class="mini-charts-item bgm-indigo">
                <div class="clearfix">
                    <div class="chart stats-bar-2"><canvas style="display: inline-block; width: 83px; height: 45px; vertical-align: top;" width="83" height="45"></canvas></div>
                    <div class="count">
                        <small>{{ date('F') }}'s Total PO Belakang</small>
                        <h2>{{ $total_po_belakang_month }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-8 col-md-4">
            <div class="mini-charts-item bgm-purple">
                <div class="clearfix">
                    <div class="chart stats-bar"><canvas style="display: inline-block; width: 85px; height: 45px; vertical-align: top;" width="85" height="45"></canvas></div>
                    <div class="count">
                        <small>Today's Total PO Belakang</small>
                        <h2>{{ $total_po_belakang_today }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>SPMB per Item Category in {{ date('Y') }}</h2>
                </div>
                
                <div class="card-body card-padding">
                    <div id="pie-chart-item-category" class="flot-chart-pie"></div>
                    <div class="flc-pie-item-category hidden-xs"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>SPMB per Unit in {{ date('Y') }}</h2>
                </div>
                
                <div class="card-body card-padding">
                    <div id="pie-chart-unit" class="flot-chart-pie"></div>
                    <div class="flc-pie-unit hidden-xs"></div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('vendorjs')
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('js/jquery.marquee.min.js') }}"></script>
<script src="{{ url('js/jquery.sparkline.min.js') }}"></script>
<script src="{{ url('js/monthly.js') }}"></script>
@endsection

@section('customjs')
<script type="text/javascript">
var dataTotal = [];
var pieDataDivision = [];
var pieDataItemCategory = [];
var monthName = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var color = [
                '#F44336', 
                '#03A9F4', 
                '#8BC34A', 
                '#FFEB3B', 
                '#009688', 
                '#f89E17', 
                '#fFDBD6', 
                '#584DC3', 
                '#FC7CB2', 
                '#ffff99',
                '#ff9966',
                '#ff6666',
                '#990033',
                '#99ccff',
                '#666699',
                '#0077b3'
            ];

function loadSPMBDataPerDivision() {
    $.ajax({
        url: base_url + 'report/api/getSPMBPerDivision',
        type: 'GET',
        dataType: 'json',
        error: function(data) {
            console.log(data);
        },
        success: function(data) {
            $.each(data.result, function(key, value){
                x = {};
                x.data = value.total;
                x.color = color[key];
                x.label = value.division_name;

                pieDataDivision.push(x);
            });
        }
    });   
}

function loadSPMBDataPerItemCategory() {
    $.ajax({
        url: base_url + 'report/api/getSPMBPerItemCategory',
        type: 'GET',
        dataType: 'json',
        error: function(data) {
            console.log(data);
        },
        success: function(data) {
            $.each(data.result, function(key, value){
                x = {};
                x.data = value.total;
                x.color = color[key];
                x.label = value.item_category_name;

                pieDataItemCategory.push(x);
            });
        }
    });   
}

loadSPMBDataPerDivision();
loadSPMBDataPerItemCategory();

$(document).ready(function() {
    $('#text').marquee({
        duration: 60000,
        startVisible: true,
        duplicated: true
    });
});

$(document).ajaxSuccess(function(){
    //Pie Chart Division
    if($('#pie-chart-unit')[0]){
        $.plot('#pie-chart-unit', pieDataDivision, {
            series: {
                pie: {
                    show: true,
                    stroke: { 
                        width: 2,
                    },
                },
            },
            legend: {
                container: '.flc-pie-unit',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0
            },
            grid: {
                hoverable: true,
                clickable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false,
                cssClass: 'flot-tooltip'
            }
            
        });
    }

    //Pie Chart Item Category
    if($('#pie-chart-item-category')[0]){
        $.plot('#pie-chart-item-category', pieDataItemCategory, {
            series: {
                pie: {
                    show: true,
                    stroke: { 
                        width: 2,
                    },
                },
            },
            legend: {
                container: '.flc-pie-item-category',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0
            },
            grid: {
                hoverable: true,
                clickable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false,
                cssClass: 'flot-tooltip'
            }
            
        });
    }
    
    /* Tooltips for Flot Charts */
    
    if ($(".flot-chart")[0]) {
        $(".flot-chart").bind("plothover", function (event, pos, item) {
            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(0),
                    m = item.dataIndex;
                $(".flot-tooltip").html(item.series.label + " at " + monthName[m] + " : " + y + " person").css({top: item.pageY+5, left: item.pageX+5}).show();
            }
            else {
                $(".flot-tooltip").hide();
            }
        });
        
        $("<div class='flot-tooltip' class='chart-tooltip'></div>").appendTo("body");
    } 
});
</script>
@endsection