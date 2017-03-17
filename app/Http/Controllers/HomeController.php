<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\State;
use Illuminate\Database\Eloquent\Model;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;


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

    function TotalEmployeeByState($StateID)
    {
        $query = mysql_query("
            SELECT count(distinct personnels.id) as Nos from personnels, noun_infos n, salary_scales ss where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and state_id = '".$StateID."' LIMIT 1
        ");
        $data = mysql_fetch_array($query);
        return $data['Nos'];
    }
    
    public function index()
    {
        $sId = array(1, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 30, 31, 32, 33, 34, 35, 36, 37);

        $param['personnel'] = \App\Personnel::all();
        $param['depts'] = \App\Department::all();
        $param['branches'] = \App\Branch::where('status', '!=', '')->orderBy('branch_name', 'ASC')->get();
        $param['state'] = \App\Personnel::where('state_id', \App\State::find('id'));
        $param['states'] = \App\State::all();
        $param['MaxStateCount'] = \App\Personnel::join('states', 'personnels.state_id', '=', 'states.id')->groupBy('states.id')->get(['states.id', \DB::raw('count(personnels.id) as persons')]);//\App\Personnel::where('state_id', '$id')->get();
        // dd(count($param['MaxStateCount']));
        // foreach ($param['MaxStateCount'] as $key) {
        //      dd(count($key));
        //  } 
        $param['Lstates'] = \App\State::all()->take(5);
        $param['Hstates'] =  State::all()->take(5);
        $param['male'] = \App\Personnel::where('gender', '=', 1)->get();
        $param['female'] = \App\Personnel::where('gender', '=', 2)->get();
        $param['seniorStaff'] = \App\NounInfo::where('salary_scale_id', '<=', 20)->get();
        $param['juniorStaff'] = \App\NounInfo::where('salary_scale_id', '>=', 20)->get();
        $param['fullTimeStaff'] = \App\NounInfo::where('status_id', '=', 1);
        $param['partTimeStaff'] = \App\NounInfo::where('status_id', '=', 6)->get();
        $param['acadStaff'] = \App\NounInfo::where('status_id', '=', 6)->get();
        $param['nonAcadStaff'] = \App\NounInfo::where('status_id', '=', 6)->get();
        $param['transientStaff'] = \App\NounInfo::where('status_id', '=', 3)->orWhere('status_id', '=', 4)->orWhere('status_id', '=', 5)->orWhere('status_id', '=', 6)->orWhere('status_id', '=', 7)->orWhere('status_id', '=', 8)->orWhere('status_id', '=', 9)->get();


        $param['pageName'] = "Integrated Dashboard";

        ActivityLog('Dashboard', 'Viewed Dashboard', \Auth::user()->surname.' viewed the dashboard',$_SERVER['REMOTE_ADDR']);
        return view('home', $param);
    }

    function ShowEmployerClass($ID)
    {
        $query = mysql_query("
            SELECT count(distinct personnels.id) as Nos from personnels, nou_infos n, salary_scalings ss where personnels.id = n.personnel_id and n.salary_scaling_id = ss.id '".$ID."'  LIMIT 1
        ");
        $data = mysql_fetch_array($query);
        return $data['Nos'];
    }

    public function SMS()
    {
        $sender = "NOUN HR-Plus"; 
        $sendto = "08165420728";
        $username = "GESUMAYOR";
        $pass = "Godfreyneedle85";
        $msg = "You have been enrolled on the HR Plus platform of NOUN. Your one time Opt Code is 080808 It is valid for 30 minutes. Make sure you login and update your account details. Thank you";

        fopen("http://api.smartsmssolutions.com/smsapi.php?username=$username&password=$pass&sender=$sender&recipient=$sendto&message=$msg", "r");
    //     $client = new \Nexmo\Client(new \Nexmo\Client\Credentials\Basic(API_KEY, API_SECRET));
    //     $message = $client->message()->send([
    //     'to' => NEXMO_TO,
    //     'from' => NEXMO_FROM,
    //     'text' => 'Test message from the Nexmo PHP Client'
    // ]);
    }

    public function states()
    {
        $param['states'] = \App\State::all();
        $param['branch'] = \App\Branch::all();
        $param['pageName'] = "States Dashboard";

        ActivityLog('States', 'Viewed States Dashboard', \Auth::user()->surname.' viewed states dashboard',$_SERVER['REMOTE_ADDR']);
        return view('states.index', $param);
    }

    public function oneState($id)
    {
        $id = \Crypt::decrypt($id);
        $param['state'] = \App\State::find($id);
        ActivityLog('State Data', 'State Data', \Auth::user()->surname. ' viewed '.$param['state']->state.' state and all its related record' ,$_SERVER['REMOTE_ADDR']);
        flash()->success('Welcome to '.$param['state']->state. ' state\'s profile');
        return view('states.oneState', $param);
    }

    // public function domail($event)
    // {
    //     Mail::to('gesumayor@gmail.com')->send(new Welcome());
    // }

}
