<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use DB;
use Redirect;
class DashboardController extends Controller
{
    public function index(){
          $admin_id=Session::get('id');
        if($admin_id !=NULL){
              return redirect::to('/dashboard')->send(); 
        }
        return view('Admin.Login.admin_login');
    }
    public function createLogin(Request $request){
//        $this->validate($request, ['admin_email' => 'required',
//            'password' => 'required'
//                ]
//        );
        $admin_email=$request->admin_email;
        $admin_password=$request->admin_password;
   $login=DB::table('admin_users')
           ->where('admin_email',$admin_email)
           ->where('admin_password',md5($admin_password))
           ->first();
  if($login){
      Session::put('id',$login->id);
      Session::put('admin_name',$login->admin_name);
      Session::put('access_label',$login->access_label);
     return redirect::to('dashboard');
  }else{
      Session::put('exception','Your email or password invalid!!');
     return redirect::to('Admin'); 
  }
        
        
    }
    public function createSignup(){
       return view('Admin.Login.signup'); 
    }
    public function signupAdd(){
        
    }
    public function dashboarPanel(){
        $this->admin_auth();
       
        return view('Admin.dashboard');
        
    }
    public function admin_auth(){
        $admin_id=Session::get('id');
        if($admin_id==NULL){
              return redirect::to('Admin')->send(); 
        }
        
    }

    public function dashboarLogout(){
        Session::put('id','');
        Session::put('admin_name','');
        Session::put('message','Successfully Logout!!');
         return redirect::to('Admin'); 
    }
}
