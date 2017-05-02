<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    
<!-- Mirrored from byrushan.com/projects/ma/1-5-2/jquery/invoice.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 11 May 2016 10:20:09 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{!! Cache::get('setting_headtitle') !!} Tracker</title>
    
        <!-- Vendor CSS -->
        <link href="{{ url('css/fullcalendar.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/sweet-alert.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">  
        <link href="{{ url('css/material-design-iconic-font.min.css') }}" rel="stylesheet">
            
        <!-- CSS -->
        <link href="{{ url('css/app.min.1.css') }}" rel="stylesheet">
        <link href="{{ url('css/app.min.2.css') }}" rel="stylesheet">
    </head>
    
    <body>
       

        <div class="container invoice">

            <div class="block-header">
                
        
            </div>
            
            <div class="card">
                <div class="card-header ch-alt text-center">
                    <h3>{!! Cache::get('setting_app_name') !!} Tracker</h3><br/>
                </div>
                
                <div class="card-body card-padding">
                    <div class="row m-b-25">
                        <div class="col-xs-12">
                            <div class="text-center">
                                <p class="c-gray">Detail of {{ $spmb->spmb_no }}</p>
                                
                                <span class="text-muted">
                                    Tipe : {{ $spmb->spmbtype->spmb_type_name }}<br/>
                                    No PR : {{ $spmb->spmb_no_pr_sap }}<br/>
                                    PT : {{ $spmb->division->company->company_name }}<br/>
                                    Divisi : {{ $spmb->division->division_name }}<br/>
                                    Bagian : {{ $spmb->spmb_cost_center }}<br/>
                                    No I/O DIPK : {{ $spmb->spmb_no_io }}<br/>
                                    Pemesan : {{ $spmb->spmb_applicant_name }}<br/>
                                    Email Pemesan : {{ $spmb->spmb_applicant_email }}<br/>
                                </span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    <div class="row m-t-25 p-0 m-b-25">
                        <div class="col-xs-3">
                            <div class="bgm-amber brd-2 p-15">
                                <div class="c-white m-b-5">SPMB No</div>
                                <h2 class="m-0 c-white f-300">{{ $spmb->spmb_no }}</h2>
                            </div>
                        </div>
                        
                        <div class="col-xs-3">
                            <div class="bgm-blue brd-2 p-15">
                                <div class="c-white m-b-5">Tanggal Dibuat</div>
                                <h2 class="m-0 c-white f-300">{{ $created_at }}</h2>
                            </div>
                        </div>
                        
                        <div class="col-xs-3">
                            <div class="bgm-green brd-2 p-15">
                                <div class="c-white m-b-5">Status</div>
                                <h2 class="m-0 c-white f-300">{{ $spmb->_currentflow($spmb->flow_no, $flow_group_id) }}</h2>
                            </div>
                        </div>
                        
                        <div class="col-xs-3">
                            <div class="bgm-red brd-2 p-15">
                                <div class="c-white m-b-5">PIC Saat Ini</div>
                                <h2 class="m-0 c-white f-300">{{ $spmb->_currentuser->user_firstname . ' ' . $spmb->_currentuser->user_lastname }}</h2>
                            </div>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>

                    <table id="tabel_detail_spmb" class="table i-table m-t-25 m-b-25">
                        <thead class="text-uppercase">
                            <th class="c-gray"><center>No. Acc<center></th>
                            <th class="c-gray"><center>No.</center></th>
                            <th class="c-gray"><center>Nama Barang</center></th>
                            <th class="c-gray"><center>Satuan</center></th>
                            <th class="c-gray"><center>Qty</center></th>
                            <th class="c-gray"><center>Keterangan</center></th>
                        </thead>
                        <tbody>
                        @foreach($spmb->spmbdetails as $detail)
                            <tr>
                                <td><center>{{ $detail->spmb_detail_account_no }}</center></td>
                                <td><center>{{ $detail->spmb_detail_sequence_no }}<center/></td>
                                <td>{{ $detail->spmb_detail_item_name }}</td>
                                <td><center>{{ $detail->unit->unit_code }}</center></td>
                                <td><center>{{ $detail->spmb_detail_qty }}<center></td>
                                <td>{{ $detail->spmb_detail_note }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                    <div class="clearfix"></div>
                    
                    <div class="p-25">
                        <h4 class="c-green f-400">History</h4>
                        
                        <table id="tabel_history_spmb" class="table i-table m-t-25 m-b-25">
                            <thead class="text-uppercase">
                                <th class="c-gray"><center>Waktu<center></th>
                                <th class="c-gray"><center>Status</center></th>
                            </thead>
                            <tbody>
                            @foreach($spmb->spmbhistories as $history)
                                <tr>
                                    <td><center>{{ $history->created_at }}</center></td>
                                    <td>{{ $history->_flow($history->flow_no, $flow_group_id) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="clearfix"></div>

                    <div class="p-25">
                        <center>
                            <a href="{{ url('/public/tracker') }}" class="btn btn-danger waves-effect">Tracking Again</a>
                        </center>
                    </div>
                </div>
                
                <footer class="m-t-15 p-20">
                    <ul class="list-inline text-center list-unstyled">
                        <li class="m-l-5 m-r-5"><small>it@gramedia-majalah.com</small></li>
                        <li class="m-l-5 m-r-5"><small>021-5330150/70</small></li>
                        <li class="m-l-5 m-r-5"><small>{{ url('/') }}</small></li>
                    </ul>
                </footer>
            </div>
            
        </div>
        
        <button class="btn btn-float bgm-red m-btn" data-action="print"><i class="zmdi zmdi-print"></i></button>
  


        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>

        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
        <![endif]-->

         <!-- Javascript Libraries -->
        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>

        <script src="{{ url('js/moment.min.js') }}"></script>
        <script src="{{ url('js/waves.min.js') }}"></script>
        <script src="{{ url('js/bootstrap-notify.min.js') }}"></script>
        <script src="{{ url('js/jquery.bootstrap-growl.js') }}"></script>
        <script src="{{ url('js/sweet-alert.min.js') }}"></script>
        <script src="{{ url('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="{{ url('js/functions.js') }}"></script>
        <script src="{{ url('js/demo.js') }}"></script>
    
    
    </body>

<!-- Mirrored from byrushan.com/projects/ma/1-5-2/jquery/invoice.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 11 May 2016 10:20:14 GMT -->
</html>