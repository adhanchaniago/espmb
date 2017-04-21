<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    
<!-- Mirrored from byrushan.com/projects/ma/1-5-2/jquery/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 11 May 2016 10:20:14 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{!! Cache::get('setting_headtitle') !!} Tracker</title>
        
        <!-- Vendor CSS -->
        <link href="{{ url('css/sweet-alert.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/material-design-iconic-font.min.css') }}" rel="stylesheet">
        
            
        <!-- CSS -->
        <link href="{{ url('css/app.min.1.css') }}" rel="stylesheet">
        <link href="{{ url('css/app.min.2.css') }}" rel="stylesheet">

        <style type="text/css">
        body.login-content::before{
            background: #adc6c9;
        }
        </style>

    </head>
    
    <body class="login-content">
        <!-- Login -->
        <div class="lc-block toggled" id="l-login" style="margin-top:180px;">
            <form method="POST" role="form" action="{{ url('/public/tracker') }}" id="form-login">
            {{ csrf_field() }}
            <div>
                <h3>{!! Cache::get('setting_app_name') !!} Tracker</h3><br/>
            </div>
            <div class="clearfix"></div>
            <div class="input-group m-b-20 {{ $errors->has('spmb_no') ? ' has-error' : '' }}">
                <span class="input-group-addon"><i class="zmdi zmdi-file"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="SPMB No" name="spmb_no" autocomplete="off">
                </div>
                @if ($errors->has('spmb_no'))
                    <span class="help-block">
                        <strong>{{ $errors->first('spmb_no') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="input-group m-b-20 {{ $errors->has('spmb_token') ? ' has-error' : '' }}">
                <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Token" name="spmb_token" maxlength="6" autocomplete="off">
                </div>
                @if ($errors->has('spmb_token'))
                    <span class="help-block">
                        <strong>{{ $errors->first('spmb_token') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="clearfix"></div>
            
            <br/>
            
            <div class="form-group m-b-20">
                <center><button type="submit" class="btn btn-login btn-info">Track SPMB&nbsp;<i class="zmdi zmdi-arrow-forward"></i></button></center>
            </div>

            </form>
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
        <script src="{{ url('js/waves.min.js') }}"></script>

        <script src="{{ url('js/sweet-alert.min.js') }}"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="{{ url('js/functions.js') }}"></script>

        <!-- for notification -->
        @if(Session::has('error_tracker'))
        <script type="text/javascript">
        $(window).load(function(){
            swal("Warning", "{{ Session::get('error_tracker') }}", "error");
        });
        </script>
        @endif
        
    </body>

<!-- Mirrored from byrushan.com/projects/ma/1-5-2/jquery/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 11 May 2016 10:20:14 GMT -->
</html>