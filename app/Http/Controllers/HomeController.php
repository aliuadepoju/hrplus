<?php

/*
Project: Humna Resources Management Software - NOUN HR-Plus
File Name: Home Controller 
Description: Dashboard and Report functionalities.
Author: Umoru Godfrey, E. 
Address: Natview Technology, Abuja Nigeria
godfrey.umoru@natviewtechnology.com
Date Created: 29th January, 2017.
*/


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\State;
use Illuminate\Database\Eloquent\Model;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


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

        $param['personnel'] = \App\Personnel::all();
        $param['depts'] = \App\Department::all();
        $param['branches'] = \App\Branch::where('status', '!=', '')->orderBy('branch_name', 'ASC')->get();
        $param['states'] = \App\State::all();
        $param['male'] = \App\Personnel::where('gender', '=', 1)->get();
        $param['female'] = \App\Personnel::where('gender', '=', 2)->get();
        $param['seniorNonAcadStaff'] = DB::select("SELECT count(distinct `unique_id` )as Nos from personnels, noun_infos n, salary_scales ss where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and ss.salary_scale_category_id = 2 and ss.grouping = 2");
        $param['juniorNonAcadStaff'] = DB::select("SELECT count(distinct `unique_id` )as Nos from personnels, noun_infos n, salary_scales ss where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and ss.salary_scale_category_id = 1 and ss.grouping = 2");

        $param['Hstates'] = DB::select("SELECT state_id, state, count(distinct personnels.unique_id) as Nos from Personnels, states s where s.id = personnels.state_id group by state_id order by Nos  desc LIMIT 5");
        $param['Lstates'] = DB::select("SELECT state_id, state, count(distinct personnels.unique_id) as Nos from Personnels, states s where s.id = personnels.state_id group by state_id order by Nos asc LIMIT 5");

        // $param['jS'] = \DB::select('unique_id as Nos from personnels, noun_infos n, salary_scales ss where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and ss.salary_scale_category_id = 1 and ss.grouping = 2')->distinct()->get(['salary_scale_id']);
        // dd($param['jS']);
        //SELECT count(distinct `unique_id` )as Nos from personnels, noun_infos n, salary_scales ss where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and ss.salary_scale_category_id = 1 and ss.grouping = 2
        // dd($param['juniorStaff']);
        $param['fullTimeStaff'] = \App\NounInfo::where('status_id', '=', 1);
        $param['partTimeStaff'] = \App\NounInfo::where('status_id', '!=', 1)->get();
        $param['acadStaff'] = DB::select("SELECT count(distinct personnels.id) as Nos from personnels, noun_infos n, salary_scales ss, salary_scale_categories sc where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and ss.salary_scale_category_id = sc.id and sc.Type = 1  LIMIT 1");
        $param['nonAcadStaff'] = DB::select("SELECT count(distinct personnels.id) as Nos from personnels, noun_infos n, salary_scales ss, salary_scale_categories sc where personnels.id = n.personnel_id and n.salary_scale_id = ss.id and ss.salary_scale_category_id = sc.id and sc.Type = 2  LIMIT 1");

        $param['transientStaff'] = \App\NounInfo::where('status_id', '>', 1)->get();


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

    public function geopolzones()
    {
        $param['zones'] = \App\GeoPolZone::all();
        flash()->success('Welcome to Geo Political Zones Index');
        ActivityLog('Geo Political Zones Data', 'Geo Political Zones Data', \Auth::user()->surname. ' viewed Geo Political Zones and all their related record' ,$_SERVER['REMOTE_ADDR']);
        return view('geopolzones.index', $param);
    }

    public function oneZone($id)
    {
        $id = \Crypt::decrypt($id);
        $param['zone'] = \App\GeoPolZone::find($id);
        ActivityLog('Geo Political Zones Data', 'Geo Political Zones Data', \Auth::user()->surname. ' viewed '.$param['zone']->zone_name.' zone and its related record' ,$_SERVER['REMOTE_ADDR']);
        flash()->success('Welcome to '.$param['zone']->zone_name. ' zone\'s profile');
        return view('geopolzones.onezone', $param);
    }


    // public function domail($event)
    // {
    //     Mail::to('gesumayor@gmail.com')->send(new Welcome());
    // }

}
