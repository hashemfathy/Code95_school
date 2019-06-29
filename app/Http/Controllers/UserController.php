<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;
use Hash;


class UserController extends Controller
{
    public function adminLogin(){
        return view('login_admin');
    }
    public function postAdminLogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password'],'is_admin'=>'1'])){
            return redirect()->route('get.AdminDashboard');
        }else{
           return redirect()->back()->with('flush_errors','Email or password is incorrect !');
        }
    }
    public function getAdminDashboard(){
        $students=User::where('is_admin','3');
        $teachers=User::where('is_admin','2');
        return view('admin.dashboard',compact('students','teachers'));
    }
     public function getAdminlogout(){
        Session::flush();
        return redirect('/login/admin')->with('flush_errors','logged out successfully');
    }
    public function adminSettings(){
        return view('admin.settings');
    }
    public function checkAdminPassword(Request $request){
        $currentpassword = $request['current_pwd'];
        $checkpassword = User::where(['is_admin'=>1])->first();
        if(Hash::check($currentpassword,$checkpassword->password)){
            echo 'true';die;
        }else{
            echo 'false';die;
        }
    }
    public function updateAdminPassword(Request $request){
        $admin= User::where(['email'=>Auth::user()->email])->first();
        $currentpassword = $request['current_pwd'];
        if(Hash::check($currentpassword,$admin->password)){
            $admin->password=bcrypt($request->new_pwd);
            $admin->update();
            return redirect()->back()->with('flush_errors','updated successfully');
        }else{
            return redirect()->back()->with('flush_errors','unmatched passwords');
        }
    }
    // ------------------------------------------------------
    public function studentLogin(){
        return view('login_student');
    }
    public function studentRegister(Request $request){
        $request->validate([
            'name' => 'required|max:40',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation'=>'required'
        ]);
        $student=new User;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->password=bcrypt($request->password);
        $student->save();
        return view('student.index');
        ;
    }
    public function postStudentLogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password'],'is_admin'=>3])){
            return redirect()->route('get.Index');
        }else{
            return redirect()->back()->with('flush_errors','Email or password is incorrect !');
        }
    }
    public function getIndex(){
        return view('student.index');
    }
    public function getStudentlogout(){
        Session::flush();
        return redirect('/login/student')->with('flush_errors','logged out successfully');
    }
    public function studentSettings(){
        return view('student.settings');
    }
    public function checkStudentPassword(Request $request){
        $currentpassword = $request['current_Stpwd'];
        $checkpassword = User::where(['is_admin'=>3])->first();
        if(Hash::check($currentpassword,$checkpassword->password)){
            echo 'true';die;
        }else{
            echo 'false';die;
        }
    }
    public function updateStudentPassword(Request $request){
        $student= User::where(['email'=>Auth::user()->email])->first();
        $currentpassword = $request['current_Stpwd'];
        if(Hash::check($currentpassword,$student->password)){
            $student->password=bcrypt($request->new_Stpwd);
            $student->update();
            return redirect()->back()->with('flush_errors','updated successfully');
        }else{
            return redirect()->back()->with('flush_errors','unmatched passwords');
        }
    }
    // --------------------------------------------------------
    public function teacherLogin(){
        return view('login_teacher');
    }
    public function postTeacherLogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password'],'is_admin'=>2])){
            return redirect()->route('get.TeacherDashboard');
        }else{
           return redirect()->back()->with('flush_errors','Email or password is incorrect !');
        }
    }
    public function getTeacherDashboard(){
        return view('teacher.dashboard');
    }
    public function getTeacherlogout(){
        Session::flush();
        return redirect('/login/teacher')->with('flush_errors','logged out successfully');
    }
    public function teacherSettings(){
        return view('teacher.settings');
    }
    public function checkTeacherPassword(Request $request){
        $currentpassword = $request['current_Tepwd'];
        $checkpassword = Auth::user();
        if(Hash::check($currentpassword,$checkpassword->password)){
            echo 'true';die;
        }else{
            echo 'false';die;
        }
    }
    public function updateTeacherPassword(Request $request){
        $teacher= User::where(['email'=>Auth::user()->email])->first();
        $currentpassword = $request['current_Tepwd'];
        if(Hash::check($currentpassword,$teacher->password)){
            $teacher->password=bcrypt($request->new_Tepwd);
            $teacher->update();
            return redirect()->back()->with('flush_errors','updated successfully');
        }else{
            return redirect()->back()->with('flush_errors','unmatched passwords');
        }
    }
    
}
