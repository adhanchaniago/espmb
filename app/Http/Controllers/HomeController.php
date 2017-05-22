<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use Gate;
use Mail;
use Log;
use Notification;

use App\Announcement;
use App\SPMB;
use Carbon\Carbon;
use App\Mail\TestMail;

use App\Ibrol\Libraries\UserLibrary;

//use Illuminate\Support\Facades\Redis;
use App\Notifications\TestNotif;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$later = Carbon::now()->addMinutes(2);

        //dd($later);

        Mail::to('soni@gramedia-majalah.com')->later($later, new TestMail());

        //dd('ok');

        
        /*$user = User::find(1);
        foreach($user->unreadNotifications as $notif) {
            echo $notif->type;
        }

        dd('mail');*/

        /*$user = User::find(1);
        Notification::send($user, new TestNotif());*/

        $data = array();

        $today = date('Y-m-d');

        $data['announcements'] = Announcement::where(function($query) use($today) {
                                                    $query->where('announcement_startdate', '>=', $today)
                                                            ->where('announcement_enddate', '<=', $today);
                                                })->orWhere(function($query) use($today) {
                                                    $query->where('announcement_startdate', '<=', $today)
                                                            ->where('announcement_enddate', '>=', $today);
                                                })->where('active', '=', '1')->get();

        $year_start = date('Y') . '-01-01 00:00:00';
        $year_end = date('Y') . '-12-31 23:59:59';
        $month_start = date('Y-m') . '-01 00:00:00';
        $lastdate = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $month_end = date('Y-m-') . $lastdate . ' 23:59:59';
        $today_start = date('Y-m-d') . ' 00:00:00';
        $today_end = date('Y-m-d') . ' 23:59:59';

        $data['total_year'] = SPMB::where('active','1')->whereBetween('spmb.created_at', [$year_start, $year_end])->count();
        $data['total_month'] = SPMB::where('active','1')->whereBetween('spmb.created_at', [$month_start, $month_end])->count();
        $data['total_today'] = SPMB::where('active','1')->whereBetween('spmb.created_at', [$today_start, $today_end])->count();

        $data['total_po_belakang_year'] = SPMB::where('spmb_method', 'ABNORMAL')->where('active','1')->whereBetween('spmb.created_at', [$year_start, $year_end])->count();
        $data['total_po_belakang_month'] = SPMB::where('spmb_method', 'ABNORMAL')->where('active','1')->whereBetween('spmb.created_at', [$month_start, $month_end])->count();
        $data['total_po_belakang_today'] = SPMB::where('spmb_method', 'ABNORMAL')->where('active','1')->whereBetween('spmb.created_at', [$today_start, $today_end])->count();


        return view('home', $data);
    }

}
