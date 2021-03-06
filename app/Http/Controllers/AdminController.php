<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use App\Level;
use App\Result;
use App\Student;
use App\Subject;
use App\Teacher;
use App\Classroom;
use App\ClassSubjectTeach;
use App\Exports\CsvExport;
use App\Imports\CsvImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
// ----------------------Student Controllers -----------------------
    public function getAdminStudents()
    {
        $students = cache()->remember('students', 60 , function () {
            $students=User::where('is_admin','3')->with(['student' => function($q) { $q->with(['classroom','level']);}])->get();
            return $students;
        });
        // $students=User::where('is_admin','3')->with(['student' => function($q) { $q->with(['classroom','level']);}])->get();
        // Cache::get('students');
        // Cache::forget('students'); die();
        return view('admin.student.view_students',compact('students'));
    }
    public function getAddStudent()
    {
        $classroom=Classroom::all();
        $level=Level::all();
        return view('admin.student.add_student',compact('classroom','level'));
    }
    public function addStudent(Request $request)
    {
        $this->validate($request,[
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6',
            'level_id'=>'required',
            'classroom_id'=>'required'
        ]);
        $data=$request->all();

        \DB::transaction(function()use($request){
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->password=bcrypt($request->password);
            // ------------ upload image--------------
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename=rand(111,99999).'.'.$extension;
                    $large_image_path='img/backend_img/students/large/'.$filename;
                    $medium_image_path='img/backend_img/students/medium/'.$filename;
                    $small_image_path='img/backend_img/students/small/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                // Store image name in studentss table
                $user->photo = $filename; 
                }
            }      
            $user->save();

            $student=new Student;
            $student->level_id=$request->level_id;
            $student->classroom_id=$request->classroom_id;
            $student->parent_phone=$request->parent_phone;
            $user->student()->save($student); 
        });
        
        return redirect()->route('get.AdminStudents')->with('flush_errors','student added successfully');
    }
    public function getEditStudent($id)
    {
        $classroom=Classroom::all();
        $level=Level::all();
        $student=User::where('id',$id)->first();
        return view('admin.student.edit_student',compact('student','classroom','level'));
    }
    public function updateStudent(Request $request,$id)
    {              
        $user=User::find($id);
        if($request->email !==$user->email ){
        $this->validate($request,[ 
            'email' => 'email|required|unique:users',
        ]);
        }
        $this->validate($request,[ 
            'password' => 'required|min:6',
            'level_id'=>'required',
            'classroom_id'=>'required'
        ]);
        $data=$request->all();
        \DB::transaction(function()use($request, $id){
            $user=User::find($id);
            $user->name=$request->name;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->password=bcrypt($request->password);
            // ------------ upload image--------------
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename=rand(111,99999).'.'.$extension;
                    $large_image_path='img/backend_img/students/large/'.$filename;
                    $medium_image_path='img/backend_img/students/medium/'.$filename;
                    $small_image_path='img/backend_img/students/small/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                // Store image name in studentss table
                $user->photo = $filename; 
                }
            }      
            $user->update();

            $student=Student::where('user_id',$id)->first();
            $student->level_id=$request->level_id;
            $student->classroom_id=$request->classroom_id;
            $student->parent_phone=$request->parent_phone;
            $student->update();
        });
        return redirect()->route('get.AdminStudents')->with('flush_errors','student updated successfully');
    }
    public function deleteAdminStudent($id)
    {
        \DB::transaction(function()use($id){
            $user=User::find($id);
            $user->student()->delete();
            $user->delete();  
        });
        return redirect()->route('get.AdminStudents')->with('flush_errors','student deleted successfully');
    }
    public function viewAdminStudent($id)
    {
        $student=User::find($id);
        return view('admin.student.view_student',compact('student'));
    }
    // ----------------------------Excel Import & Export ----------------
    public function studentsExport()
    {
        return Excel::download(new CsvExport,'sample.csv');
    }
    public function studentsImport()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }
// ------------------------------------------------------------------
// ----------------------Teacher Controllers -----------------------
    public function getAdminTeachers()
    {
        $teachers=User::where('is_admin','2')->with('teacher')->get();
        return view('admin.teacher.view_teachers',compact('teachers'));
    }
    public function getAddTeacher()
    {
        return view('admin.teacher.add_teacher');
    }
    public function addTeacher(Request $request)
    {
        $this->validate($request,[
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6',
            'phone_number'=>'required'
        ]);
        $data=$request->all();

        \DB::transaction(function()use($request){
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->password=bcrypt($request->password);
            $user->is_admin='2';
            // ------------ upload image--------------
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename=rand(111,99999).'.'.$extension;
                    $large_image_path='img/backend_img/teachers/large/'.$filename;
                    $medium_image_path='img/backend_img/teachers/medium/'.$filename;
                    $small_image_path='img/backend_img/teachers/small/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                // Store image name in studentss table
                $user->photo = $filename; 
                }
            }      
            $user->save();

            $teacher=new Teacher;
            $teacher->phone_number=$request->phone_number;
            $user->teacher()->save($teacher); 
        });
        
        return redirect()->route('get.AdminTeachers')->with('flush_errors','teacher added successfully');
    }
    public function getEditTeacher($id)
    {
        $teacher=User::where('id',$id)->first();
        return view('admin.teacher.edit_teacher',compact('teacher'));
    }
    public function updateTeacher(Request $request,$id)
    {              
        $user=User::find($id);
        if($request->email !==$user->email ){
        $this->validate($request,[ 
            'email' => 'email|required|unique:users',
        ]);
        }
        $this->validate($request,[ 
            'password' => 'required|min:6',
        ]);
        $data=$request->all();
        \DB::transaction(function()use($request, $id){
            $user=User::find($id);
            $user->name=$request->name;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->password=bcrypt($request->password);
            // ------------ upload image--------------
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename=rand(111,99999).'.'.$extension;
                    $large_image_path='img/backend_img/teachers/large/'.$filename;
                    $medium_image_path='img/backend_img/teachers/medium/'.$filename;
                    $small_image_path='img/backend_img/teachers/small/'.$filename;
                    // Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                // Store image name in studentss table
                $user->photo = $filename; 
                }
            }      
            $user->update();

            $teacher=Teacher::where('user_id',$id)->first();
            $teacher->phone_number=$request->phone_number;
            $teacher->update();
        });
        return redirect()->route('get.AdminTeachers')->with('flush_errors','teacher updated successfully');
    }
    public function deleteAdminTeacher($id)
    {
        \DB::transaction(function()use($id){
            $user=User::find($id);
            $user->teacher()->delete();
            $user->delete();  
        });
        return redirect()->route('get.AdminTeachers')->with('flush_errors','teacher deleted successfully');
    }
    public function viewAdminTeacher($id)
    {
        $teacher=Teacher::with(['user','subjects'=>function($q){$q->with('level');},'classrooms'])->where('user_id',$id)->first();
        // return response()->json($teacher);

        return view('admin.teacher.view_teacher',compact('teacher'));
    }
// ------------------------------------------------------------------
// ----------------------Subject Controllers -----------------------
    public function getAdminSubjects()
    {
        
        $subjects=Subject::with(['teachers' => function($q) { $q->distinct('id')->with('user', 'classrooms'); },'level'])->get();
        
        // return response()->json($subjects);die;

        return view('admin.subject.view_subjects',compact('subjects'));
    }
    public function getAddSubject()
    {
        $teachers=Teacher::with('user')->get();
        $level=Level::all();
        $classrooms=Classroom::all();
        return view('admin.subject.add_subject',compact('level','teachers','classrooms'));
    }
    public function addSubject(Request $request)
    {
        $this->validate($request,[
            'level_id'=>'required',
            'subject_code'=>'required|unique:subjects',
        ]);
        \DB::transaction(function()use($request){
        $data=$request->all();
        // return response()->json($data);die;
        $subject=new Subject;
        $subject->subject_code=$request->subject_code;
        $subject->level_id=$request->level_id;
        $subject->save();
        $teacher = DB::table('teach_class_subject')->insertGetId([
            'teacher_id' => $request->teacher,
            'classroom_id' => $request->classroom,
            'subject_id'=>$subject->id
            ]);
        });
        return redirect()->route('get.AdminSubjects')->with('flush_errors','subject added successfully');
    }
    public function getAddSubjectTeacher($id)
    {
        $teachers=Teacher::with('user')->get();
        $level=Level::all();
        $classrooms=Classroom::all();
        $subject=Subject::where('id',$id)->first();
        
        return view('admin.subject.add_subject_teacher',compact('subject','level','classrooms','teachers'));
    }
    public function updateSubjectTeacher(Request $request,$id)
    {              
        $teacher = DB::table('teach_class_subject')->insertGetId([
            'teacher_id' => $request->teacher,
            'classroom_id' => $request->classroom,
            'subject_id'=>$id
            ]);
        return redirect()->route('get.AdminSubjects')->with('flush_errors','teacher added successfully');
    }
    public function getEditSubjectCode(Request $request,$id)
    {
        $subject=Subject::where('id',$id)->first();
        $subject->subject_code=$request->subject_code;
        $subject->update();
        return redirect()->route('get.AdminSubjects')->with('flush_errors','Subject code updated successfully');
    }
    public function deleteSubjectTeacher($teacher,$subject)
    {
        DB::table('teach_class_subject')->where(['teacher_id'=>$teacher,'subject_id'=>$subject])->delete();
        return redirect()->route('get.AdminSubjects')->with('flush_errors','teacher deleted successfully');
    }
    public function deleteAdminSubject($id)
    {
        \DB::transaction(function()use($id){

        DB::table('teach_class_subject')->where('subject_id',$id)->delete();
        $subject=Subject::find($id);
        $subject->delete();  
        });
        return redirect()->route('get.AdminSubjects')->with('flush_errors','subject deleted successfully');
    }
// ------------------------------------------------------------------
// ----------------------Results Controllers -----------------------
    public function getAdminResults()
    {
        $result=Result::with(['student'=>function($q){$q->with('user');},'teacher'=>function($q){$q->with('user');},'level','classroom','subject'])->get();
        // return response()->json($result);
        return view('admin.results.view_all',compact('result'));
    }
    public function getAdminResultsLevels()
    {
        return view('admin.results.view_levels');
    }
    public function getAdminResultsClassrooms()
    {
        return view('admin.results.view_classrooms');
    }
    public function getAdminResultsSubjects()
    {
        return view('admin.results.view_subjects');
    }
// ------------------------------------------------------------------
}
