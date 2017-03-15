<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SystemController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function preference()
    {
    	# code...
    }

    public function settings()
    {
        # code...
    }

    public function editSetting()
    {
        # code...
    }

    public function users()
    {
        $param['users'] = \App\User::all(); // select * from users
    	$param['user'] = \App\User::where('status', '!=', 1)->get(); // select * from users
        $param['branches'] = \App\Branch::all();
        $param['depts'] = \App\Department::all();
        $param['units'] = \App\Unit::all();
        $param['roles'] = \App\Role::all();
        $param['permissions'] = \App\Permission::all();
        $param['pageName'] = "System Users";


        return view('system.users.index', $param);
    }

    public function viewOne($id)
    {
        $id = \Crypt::decrypt($id);
        $param['user'] = \App\User::find($id);
        $param['branches'] = \App\Branch::all();
        $param['depts'] = \App\Department::all();
        $param['units'] = \App\Unit::all();
        $param['roles'] = \App\Role::all();
        $param['rolex'] = \App\Role::all();
        $param['permissions'] = \App\Permission::all();
        $param['pageName'] = $param['user']->surname. "'s Profile";
        return view('system.users.oneUser', $param);
    }

    public function newUser()
    {
        $data = Input::all();
        $nU = new \App\User;

        $nU->surname = $data['sname'];
        $nU->middle_name = $data['mname'];
        $nU->first_name = $data['fname'];
        $nU->email = $data['email'];
        $nU->phone = $data['phone'];
        $nU->branch_id = $data['branch_id'];
        $nU->dept_id = $data['dept_id'];
        $nU->unit_id = $data['unit_id'];
        //Generatinga random password for the user
            $alphabet = "1234567890abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789@!"; //
            $pass = array(); // $pass as an array
            $alphaLength = strlen($alphabet) - 1; //the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
            }
        $nU->password = bcrypt(implode($pass));
        $nU->optCode  = mt_rand(6, 654321);

        $nU->status = 2;
        $nU->save();
        $nU->syncRoles($data['role_id']);

        $sender = "NOUN HR-Plus"; 
        $sendto = $data['phone'];
        $username = "GESUMAYOR";
        $pass = "Godfreyneedle85";
        $msg = "You have been enrolled on the HR Plus platform of NOUN. Your one time Opt Code is " .$nU->password ." It is valid for 30 minutes. Make sure you login and update your account details. Thank you";

               fopen("http://api.smartsmssolutions.com/smsapi.php?username=$username&password=$pass&sender=$sender&recipient=$sendto&message=$msg", "r");

        // fopen("http://api.smartsmssolutions.com/smsapi.php?username=GESUMAYOR&password=Godfreyneedle85&sender=NOUNHRPLUS&recipient=234809xxxxxxx,2348030000000&message=YourMessage", "r");
        return redirect()->back()->with('message', $nU->surname.' '.$nU->middle_name.' '.$nU->first_name.' to the users');
    }

    public function resendCode()
    {
        $r = mt_rand(4, 9049);
        $code = mt_rand(6, 654321);
        $sendto = \Auth::user()->phone; //Getting authenticated user
        $user = \App\User::find(\Auth::user()->id);
        $user->optcode = $code;
        $user->update();
        $sender = "NOUN HR-Plus"; 
        $username = "GESUMAYOR";
        $pass = "Godfreyneedle85";
        $msg = "You have been enrolled on the HR Plus platform of NOUN. Your one time Opt Code is " . $code ." It is valid for 30 minutes. Make sure you login and update your account details. Thank you";

       fopen("https://websmsproviders.com/components/com_spc/smsapi.php?username=$username&password=$pass&sender=$sender&recipient=$sendto&message=$msg", "r");

       // fopen("https://websmsproviders.com/components/com_spc/smsapi.php?username=$username&password=$pass&sender=$sender&recipient=$sendto&message=$msg", "r");
        ActivityLog('auth', 'Code resent',  'resent authentication code ' .$code, $_SERVER['REMOTE_ADDR']);
       
               return redirect('/system/user/verify');
    }

  public function verify()
    {

        $param['pageName'] = "User Verification";
        $param['msg'] = "R";
        return view('auth.verify', $param);
    }

    public function verifyUser()
    {
        $data = Input::all();
        $user = \App\User::find(\Auth::user()->id); //check the user in question
        if($data['code'] !== '')  { //check if code input is not empty
            // return redirect()->back()->with('alert', 'No data provided');
                if ($user->optCode == $data['code']) { //if code is not empty and it matches the users optCode
                    $user->status = 1; //Set user Verify status to true
                    $user->isVerified = 1; //Verify the user
                    $user->update(); //Update the verification status
                 return redirect('/home');   //send him/her to the desired page
                }
        elseif($user->optCode !== $data['code']){ //check if his code entered is correct
            return redirect()->back()->with('error', $data['code']); // if not correct code inform the user with the wrong code entered.
            }
             //End check
        return redirect('/user/verify');  
        }
    }



    public function editUser($id)
    {
    	# code...
    }

    public function disableUser($id)
    {
    	# code...
    }

    public function changePassword()
    {
    	# code...
    }

    public function addUserRole($id)
    {
        # code...
    }

    public function removeUserRole($id)
    {
        # code...
    }



    public function roles()
    {
    	$param['roles'] = \App\Role::all();
        $param['permissions'] = \App\Permission::all();
        $param['pageName'] = "System Roles";


        return view('system.acl.roles.index', $param);
    }

    public function viewOneR($id)
    {
        $id = \Crypt::decrypt($id);
        $param['role'] = \App\Role::find($id);
        $param['pageName'] = $param['role']->name ."'s Profile" ;
        $param['permissions'] = \App\Permission::all();
        return view('system.acl.roles.profile', $param);
    }

    public function newRole()
    {
        $data = Input::all();
        $rl = new \App\Role;

        $rl->name = $data['name'];
        $rl->slug = $data['slug'];
        $rl->description = $data['description'];
        $rl->save();
        return redirect('/system/rbac/roles');
    }

    public function editRole($id)
    {
        # code...
    }

    public function disableRole($id)
    {
        # code...
    }

    public function salaryScales()
    {
        $param['salCats'] = \App\SalaryScaleCategory::all();
        $param['salScales'] = \App\SalaryScale::all();
        $param['pageName'] = "Salary Scale Categories" ;
        $param['permissions'] = \App\Permission::all();
        return view('system.salary-scales.scaleIndex', $param);
    }

    public function salaryCats()
    {
        $param['salCats'] = \App\SalaryScaleCategory::all();
        $param['salScales'] = \App\SalaryScale::all();
        $param['pageName'] = "Salary Scale Categories" ;
        $param['permissions'] = \App\Permission::all();
        return view('system.salary-scales.categoryIndex', $param);
    }

    public function oneSalaryCat($id)
    {
        $id = \Crypt::decrypt($id);
        $param['salCat'] = \App\SalaryScaleCategory::find($id);
        $param['pageName'] = $param['salCat']->category_name ."'s Profile" ;
        return view('system.salary-scales.profile', $param);
    }

    public function oneSalaryScale($id)
    {
        $id = \Crypt::decrypt($id);
        $param['sScale'] = \App\SalaryScale::find($id);
        $param['pageName'] = $param['sScale']->scale ."'s Profile" ;
        return view('system.salary-scales.scaleProfile', $param);
    }

    public function newSalaryCategory()
    {
        $data = Input::all();

        $sCat = new \App\SalaryScaleCategory;

        $sCat->code = $data['code'];
        $sCat->category_name = $data['catName'];
        $sCat->type = $data['type'];
        $sCat->description = $data['description'];
        $sCat->status = 1;
        $sCat->save();
        return redirect()->back();
    }

    public function newScale()
    {
        $data = Input::all();

        $sScale = new \App\SalaryScale;

        $sScale->salary_scale_category_id = $data['category'];
        $sScale->scale = $data['scaleName'];
        $sScale->grouping = $data['grouping'];
        $sScale->min_sal_range = $data['min_salary_range'];
        $sScale->max_sal_range = $data['max_salary_range'];
        $sScale->description = $data['description'];
        $sScale->status = 1;
        $sScale->save();
        return redirect()->back();
    }

    public function tickets()
    {

        $param['tickets'] = \App\Ticket::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $param['pageName'] = "System Tickets";
        return view('system.tickets.index', $param);

    }
   
    public function newticket()
    {
        $param['nCats'] = \App\TicketCategory::all();
        return view('system.tickets.new', $param);
    }

    public function oneTicket($id)
    {
        $id = \Crypt::decrypt($id);
        $param['ticket'] = \App\Ticket::find($id);
        $param['status'] = \App\TicketStatus::where('id', '>=', '1')->where('id', '<=', '5')->get();
        $param['user'] = \App\User::where('type', 2)->get();
        $param['stakeholders'] = \App\Stakeholder::all();
        $param['pageName'] = $param['ticket']->title. "'s Profile";
        return view('system.tickets.oneTicket', $param);
    }
    public function createticket()
    {
        //Create New Ticket     
        $td = Input::all();
        $nT = new \App\Ticket;
        $nT->serial = mt_rand(1234987, 987745124);
        $nT->title = $td['title'];
        $nT->category_id = $td['category'];
        $nT->priority = $td['priority'];
        $nT->user_id = \Auth::user()->id;
        $nT->dated = \Carbon\Carbon::parse($td['doi']);
        $nT->description = $td['description'];
        $nT->status = 1;
        $nT->save();

        $tckPrss = new \App\TicketProcessed;
        $tckPrss->ticket_id = $nT->id;
        $tckPrss->user_id = \Auth::user()->id;
        $tckPrss->action = "Opened Ticket";
        $tckPrss->ticket_status_id = 1;
        $tckPrss->process_note = "New ticket generated";
        $tckPrss->save();

        ActivityLog('Ticket', 'New Ticket', \Auth::user()->surname. ' created ticket title '.$td['title'].' from '.\Auth::user()->getBranch->branch_name.' on the system' ,$_SERVER['REMOTE_ADDR']);
        return redirect('/home');
    }

    public function assignTicket()
    {
        $tk = Input::all();
        $tck = \App\Ticket::find($tk['ticketID']);
        $tck->status = 2;
        $tck->assigned_to = $tk['user'];
        $tck->assigned_by = \Auth::user()->id;
        $tck->expected_delivery = $tk['days'];
        $tck->assignment_note = $tk['assignement_note'];
        $tck->date_assigned = \Carbon\Carbon::now();
        $tck->update();

        $tckPrss = new \App\TicketProcessed;
        $tckPrss->ticket_id = $tk['ticketID'];
        $tckPrss->user_id = \Auth::user()->id;
        $tckPrss->action = "Assigned Ticket";
        $tckPrss->ticket_status_id = 2;
        $tckPrss->process_note = $tk['process_note'];
        $tckPrss->save();

        return redirect('/system/tickets/view/' .$tk['ticketID']);
    }

    public function processTicket()
    {
        $tk = Input::all();
        $tckPrss = new \App\TicketProcessed;
        $tckPrss->ticket_id = $tk['ticketID'];
        $tckPrss->user_id = \Auth::user()->id;
        $tckPrss->action = "Assigned Ticket";
        $tckPrss->ticket_status_id = $tk['status'];
        $tckPrss->process_note = $tk['process_note'];
        $tckPrss->save();

        $tck = \App\Ticket::find($tk['ticketID']);
        $tck->status = $tk['status'];
        $tck->update();
        
     return redirect()->back();
    }

    public function closeTicket()
    {
        $tk = Input::all();

        $tck  = \App\Ticket::find($tk['ticketID']);
        $tck->status = 4;
        $tck->update();

        $tckPrss = new \App\TicketProcessed;
        $tckPrss->ticket_id = $tk['ticketID'];
        $tckPrss->user_id = \Auth::user()->id;
        $tckPrss->action = "Closed Ticket";
        $tckPrss->ticket_status_id = $tk['status'];
        $tckPrss->process_note = $tk['process_note'];
        $tckPrss->save();

        return redirect()->back();


    }

    public function cancelticket()
    {

    }

    public function editTicket()
    {
        $post = Input::all();
        // dd($post);
        $tck = \App\Ticket::find($post['ticket_id']);
        $tck->description = $post['description'];
        $tck->save();
        return redirect('/tickets/view/' .$post['ticketID']);
        
    }

    public function newTicketStakeholder()
    {
        $tskh = Input::all();

        // dd($tskh);
        $tkSthD = new \App\TicketStakeHolder;
        $tkSthD->ticket_id = $tskh['ticketID'];
        $tkSthD->stake_holder_id = $tskh['stakeholder'];
        $tkSthD->save();
        return redirect()->back()->with('message', 'Stakeholder successfully added to this ticket');

    }

    public function addStakeHolder()
    {

        $tkD = Input::all();
        $tkSk = new \App\TicketStakeHolder;
        $tkSk->surname = $tkD['surname'];
        $tkSk->other_names = $tkD['other_name'];
        $tkSk->email = $tkD['email'];
        $tkSk->phone_no = $tkD['phone'];
        $tkSk->reason_for_addition = $tkD['reason_for_addition'];
        $tkSk->save();
        return redirect()->back();
    }


    // System Preferences
    public function systemPreference()
    {
        $param['license'] = \App\License::all();
        $param['tickets'] = \App\Ticket::all();
        $param['stakeholders'] = \App\StakeHolder::all();
        $param['preference'] = \App\SystemPreference::all();
        $param['pageName'] = "System Preference" ;
        return view('system.index', $param);

    }

    





}
