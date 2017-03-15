<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class BranchController extends Controller
{
    

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function branches()
    {
    	$param['units'] = \App\Unit::all();
    	// $param['branches'] = \App\Branch::all();
        $param['branches'] = \App\Branch::where('status', '1')->orderBy('branch_name', 'ASC')->get();
    	$param['depts'] = \App\Department::all();
    	$param['states'] = \App\State::all();
    	$param['lgas'] = \App\Lga::all();
    	$param['cords'] = \App\Personnel::where('status', '1')->get();
        ActivityLog('Study Center Data', 'Viewed list', \Auth::user()->surname.' viewed Study Center data' ,$_SERVER['REMOTE_ADDR']);
    	return view('branch.index', $param);
    }

    public function newBranch()
    {
        $bd = Input::all();
        $branch = new \App\Branch;
        $branch->branch_name = $bd['name'];
        $branch->email = $bd['email'];
        $branch->phone_no = $bd['phone'];
        $branch->state_id = $bd['state_id'];
        $branch->lga_id = 15;//$bd['lga'];
        $branch->cord_id = $bd['cord_id'];
        $branch->address = $bd['address'];
        $branch->status = 1;
        $branch->save();
        ActivityLog('Study Center Data', 'Added Data', \Auth::user()->surname. ' added '.$bd['name'].' to the Study Center list' ,$_SERVER['REMOTE_ADDR']);

        return redirect('/branches');
    }

    public function oneBranch($id)
    {

        $param['branch'] = \App\Branch::find($id);
        $param['units'] = \App\Unit::all();
        $param['branches'] = \App\Branch::all();
        $param['depts'] = \App\Department::all();
        $param['states'] = \App\State::all();
        $param['lgas'] = \App\Lga::all();
        $param['cords'] = \App\Personnel::where('status', '1')->get();
        $param['pageName'] = "Branches | ". $param['branch']->branch_name;
        ActivityLog('Study Center Data', 'Viewed Data', \Auth::user()->surname. ' viewed '.$param['branch']->branch_name.'\'s data' ,$_SERVER['REMOTE_ADDR']);

        return view('branch.viewOne', $param);
    }

    public function editBranch($id)
    {
        $bd = Input::all();
        $branch = \App\Branch::find($id);
        $branch->branch_name = $bd['name'];
        $branch->email = $bd['email'];
        $branch->phone_no = $bd['phone'];
        $branch->state_id = $bd['state_id'];
        $branch->lga_id = 15;//$bd['lga'];
        $branch->cord_id = $bd['cord_id'];
        $branch->address = $bd['address'];
        $branch->status = 1;
        $branch->save();
        ActivityLog('Study Center Data', 'Edit Data', \Auth::user()->surname. ' edited '.$branch->branch_name.'\'s data and changed its name to '.$bd['name'] ,$_SERVER['REMOTE_ADDR']);
        return redirect('/branches/data/'.$branch->id);
    }

    public function deactivate($id)
    {
        $data = Input::all();
        $branch = \App\Branch::find($data['branchId']);
        $branch->status = 2;
        $branch->update();

        $IB = new \App\InactiveBranch;
        $IB->branch_id = $branch->id;
        $IB->user_id = \Auth::user()->id;
        $IB->reason_for_deactivation = $data['reason'];
        $IB->status = 1;
        $IB->save();  

        ActivityLog('Study Center Data', 'Deativate Study Center', \Auth::user()->surname. ' Deactivated '.$branch->branch_name.'\'s data hence making its data as floating records' ,$_SERVER['REMOTE_ADDR']);
        return redirect('/branches');
    }

    public function departments()
    {
    	$param['depts'] = \App\Department::all();
    	$param['branches'] = \App\Branch::all();
    	return view('branch.depts.index', $param);
    }

    public function newDepartment()
    {
        $dd = Input::all();
        $dept = new \App\Department;
        $dept->dept_name = $dd['name'];
        $dept->email = $dd['email'];
        $dept->branch_id = $dd['branch_id'];
        $dept->description = $dd['description'];
        $dept->status = 1;
        $dept->save();
        return redirect('/branches/departments');
    }

    public function units()
    {
    	$param['units'] = \App\Unit::all();
    	$param['branches'] = \App\Branch::all();
    	$param['depts'] = \App\Department::all();
    	return view('branch.units.index', $param);
    }

    public function newUnit()
    {
        $ud = Input::all();
        $unit = new \App\Unit;
        $unit->unit_name = $ud['name'];
        $unit->department_id = $ud['dept_id'];
        $unit->unit_tree = $ud['unit_tree'];
        $unit->description = $ud['description'];
        $unit->status = 1;
        $unit->save();
        return redirect('/branches/departments/units');

    }

    public function oneUnit($id)
    {
        $param['unit'] = \App\Unit::find($id);
        $param['branches'] = \App\Branch::all();
        $param['depts'] = \App\Department::all();
        $param['states'] = \App\State::all();
        $param['lgas'] = \App\Lga::all();
        $param['cords'] = \App\Personnel::where('status', '1')->get();
        $param['pageName'] = "Unit | ". $param['unit']->unit_name;
        return view('branch.units.oneUnit', $param);
    }

    public function doReportPDF()
    {
        $branches = \App\Branch::where('status', 1)->get();
        $pdf = \PDF::loadView('reports.studycenters.branchesReport', ['branches' => $branches], ['dpi' => 150, 'defaultFont' => 'Arial'])->setPaper('a4', 'landscape');
        return $pdf->stream('Study_Centers.pdf');
        // return $pdf->download('Study_Centers.pdf');
    }

}
