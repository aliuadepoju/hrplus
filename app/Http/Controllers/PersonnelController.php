<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
// use \App\NountInfo;
class PersonnelController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function personnel()
    {
        $param['personnel'] = \App\Personnel::all();
        $param['male'] = \App\Personnel::where('gender', '=', 1)->get();
    	$param['female'] = \App\Personnel::where('gender', '=', 2)->get();
    	$param['pageName'] = "Personnel";
        ActivityLog('Personnel Data', 'Viewed Personnel Data', \Auth::user()->surname.' viewed the personnel\s record' ,$_SERVER['REMOTE_ADDR']);
        return view('pim.index', $param);
    }

    public function viewOne($id)
    {
        $id = \Crypt::decrypt($id);
        $param['person'] = \App\Personnel::find($id);
        $param['leavetypes'] = \App\LeaveType::all();
        $param['doctypes'] = \App\DocumentClassification::all();
        // $param['leaves'] = \App\Leave::all();
        $param['branches'] = \App\Branch::all();
        $param['states'] = \App\State::all();
        $param['pageName'] = $param['person']->surname ."'s Profile";
        $param['myTeam'] = \App\NounInfo::where('department_id', '=', $param['person']->getNounInfos->department_id)->get();
        // dd($param['myTeam'], count($param['myTeam']));
        ActivityLog('Personnel Data', 'Personnel Data', \Auth::user()->surname. ' viewed '.$param['person']->surname.' the personal record' ,$_SERVER['REMOTE_ADDR']);
        return view('pim.profile', $param);
    }

     public function deactivate($id)
    {
        $pD = Input::all();
        $person = \App\Personnel::find($pD['personId']);
        $person->status = 2;
        $person->update();

        $IP = new \App\InactivePersonnel;
        $IP->personnel_id = $person->id;
        $IP->user_id = \Auth::user()->id;
        $IP->reason_for_deactivation = $pD['reason'];
        $IP->status = 1;
        $IP->save();  

        ActivityLog('Personnel Data', 'Deativate Personnel', \Auth::user()->surname. ' Deactivated '.$person->surname.'\'s data hence making them floating data & records' ,$_SERVER['REMOTE_ADDR']);
        return redirect('/pim/employees');
    }


    public function editLGA()
    {
        $lData = Input::all();
        $pRS = \App\Personnel::find($lData['personnel_id']);
        $pRS->lga_id = $lData['lga'];
        $pRS->update();
        ActivityLog('Personnel Data', 'Changed Data', \Auth::user()->surname. ' changed '.$param['person']->surname.'\'s Local Government on at the personal record level' ,$_SERVER['REMOTE_ADDR']);
        return redirect()->back(); 
    }

    public function editSCenter()
    {
        $cData = Input::all();
        // dd($cData);
        $NInfo = \App\NountInfo::find($cData['personnel_id']);
        $NInfo->branch_id = $lData['lga'];
        $NInfo->update();
        ActivityLog('Personnel Data', 'Changed Data', \Auth::user()->surname. ' changed '.$param['person']->surname.'\'s Study Center on at the personal record level' ,$_SERVER['REMOTE_ADDR']);
        return redirect()->back(); 
    }


    public function register()
    {
    	$param['states'] = \App\State::all();
    	$param['lgas'] = \App\Lga::all();
        $param['status'] = \App\Status::all();
    	$param['schools'] = \App\School::all();
    	$param['quals'] = \App\Qualification::all();
    	$param['salscale'] = \App\SalaryScale::all();
        $param['depts'] = \App\Department::all();
    	$param['branches'] = \App\Branch::all();
        $param['units'] = \App\Unit::all();
        $param['fos'] = \App\FieldOfStudy::all();
    	$param['subfos'] = \App\SubFieldOfStudy::all();

        $param['uniqueID'] = mt_rand(5, 43210);

    	$sdate = 1981; //Start Year = defined year (1981)
		$edate = date("Y"); //End Year = Current Year
		$years = range ($sdate,$edate);
		$param['years'] = $years;

        $param['pageName'] = "Personnel Registration";
        return view('pim.reg2', $param);
        // return view('pim.register', $param);
    }

    public function doRegister()
    {
        $fD = Input::all();

        dd($fD);
        
        $prsn = new \App\Personnel;

        $prsnNOK = new \App\NextOfKin;

        $prsnNOK->personnel_id = $prsn->id;
        $prsnNOK->relationship_id = $fD['nokRel'];
        $prsnNOK->full_names = $fD['nok_name'];
        if ($dD['nokRel'] == 500) {
            $prsnNOK->relation_other_name = $fD['nok_other_name'];
        } else {
            $prsnNOK->relation_other_name = null;
        }
        $prsnNOK->phone_no = $fD['nok_phone'];
        $prsnNOK->gender = $fD['nokGender'];
        $prsnNOK->residential_address = $fD['nok_res_address'];
        $prsnNOK->status = 1;
        $prsnNOK->save(); //Save the Next of Kin's Data for this personnel

        $prsnFmD = new \App\PersonnelFamilyData;
            $prsnFmD->personnel_id = $prsn->id;
            $prsnFmD->marrital_status = $fD['mStatus'];
            if ($fD['mStatus'] !== 3) {
                $prsnFmD->no_of_children = $fD['no_of_children'];
                $prsnFmD->spouse = $fD['spouse'];
                $prsnFmD->spouse_phone_no = $fD['spouse_phone_no'];
            } else {
                $prsnFmD->no_of_children = null;
                $prsnFmD->spouse = null;
                $prsnFmD->spouse_phone_no = null;
            }
            $prsnFmD->status = 1;
            $prsnFmD->save();

        $prsnNounInfo = new \App\NounInfo;
        
        $prsnQualInfo = new \App\PersonnelQualificationInfo;

    }

    public function uploadDocument()
    {

        $data = Input::all();

        $doc = new \App\Document;

        $uCode = mt_rand(6, 654321);

        $doc->unique_code = $uCode;   
        $doc->personnel_id = $data['personnel_id'];
        $doc->document_classification_id = $data['docType'];
        $doc->title = $data['title'];
        $doc->issuing_authority = $data['issuingauth'];
        $doc->document_no = $data['docNo'];
        $doc->expiration = \Carbon\Carbon::parse($data['expiration']);
        $doc->description = $data['description'];
        $doc->user_id = \Auth::user()->id;
        $doc->status = 1;
        $doc->save();

        $file = Input::file('document');
        if ($data['docType'] == 1) {
                $docType = 'Certificates';
            }
            elseif ($data['docType'] == 2) {
                $docType = 'Letters';
            } else {
                $docType = 'Others';
            }
        
        if ($data['document'] !== "") { //Chekcing if file is not selected.
                $file = $data['document']; // Requiured file
                $destPath = base_path().'\public\documents/personnel/'.$data['personnel_names'].'/'.$data['docType']; //$docType; // Destination Path
                $extension = $data['document']->getClientOriginalExtension(); //File Original Extension
                $fN = $doc->id.".png"; // New png File
              $file->move($destPath, $fN); //Move file to destination path 
        }
    return redirect('pim/employees/document/one/'. $doc->id);


    }

    public function leaves()
    {
    	$param['pageName'] = "Leave Management";
        $param['leaves'] = \App\Leave::where('status', '!=', '')->groupBy('personnel_id')->orderBy('personnel_id', 'ASC')->get();
        $param['types'] = \App\LeaveType::all();
        return view('pim.leaves.index',$param);
        
    }

    public function oneLeave($id)
    {
        $id = \Crypt::decrypt($id);
        $param['leave'] = \App\Leave::find($id);
        $param['pageName'] = "Leaves";
        return view('pim.leaves.oneLeave',$param);
    }

    public function newLeave()
    {
        $ldata = Input::all();
         $alphabet = "1234567890abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789@!"; //
            $uCode = array(); // $pass as an array
            $alphaLength = strlen($alphabet) - 1; //the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
            $uCode[] = $alphabet[$n];
            }

            $leave = new \App\Leave;

            $leave->unique_code = implode($uCode);
            $leave->personnel_id = 1;
            $leave->leave_type_id = $ldata['lType'];
            dd($leave);
            $leave->start_date = $ldata['drdfpl'];
            $leave->end_date = $ldata['drdfpl'];
            $leave->description = $ldata['description'];

            $leave->status = 1;
            $leave->save();

            return redirect('/pim/employees/data/1');
    }


    public function appraisalIndex()
    {
        $param['pageName'] = "Personnel Appraisals";
        return view('pim.appraisals.index',$param);
    }


    public function doPDF()
    {
        $personnel = \App\Personnel::all();//->take(10);
        $pdf = \PDF::loadView('pim.reports.personnel', ['personnel' => $personnel], ['dpi' => 150, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
        // return $pdf->stream('dompdf.pdf');
        return $pdf->download(''.date('d-m-Y').'-personnel.pdf');
    }

    public function reportIndex()
    {
        $param['states'] = \App\State::all();
        $param['lgas'] = \App\Lga::all();
        $param['branches'] = \App\Branch::all();
        $param['depts'] = \App\Department::all();
        $param['units'] = \App\Unit::all();
        $param['statuses'] = \App\Status::all();

        return view('reports.pim.index', $param);
    }

    
}
