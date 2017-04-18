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
use App\Religion;
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


        return view('home', $data);
    }

}
