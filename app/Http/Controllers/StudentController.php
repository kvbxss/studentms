<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all() ;
        
        return view('student',['students'=>$students,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $students = Student::all() ;
      return view('student',['students'=>$students,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'cne' => 'required|regex:/^[A-Za-z0-9_.,() ]+$/|min:1|max:6',
          'firstName' => 'required|regex:/^[A-Za-z_.,() ]+$/|min:1|max:20',
          'secondName' => 'required|regex:/^[A-Za-z_.,() ]+$/|min:1|max:40',
          'age' => 'required|regex:/^[0-9]+$/|min:1|max:2',
          'speciality' => 'required|regex:/^[A-Za-z_.,() ]+$/|min:1|max:20'
          
          
          
          ]);
        $student = new Student() ;
        $student->cne = $request->input('cne') ;
        $student->firstName = $request->input('firstName') ;
        $student->secondName = $request->input('secondName') ;
        $student->age = $request->input('age') ;
        $student->speciality = $request->input('speciality') ;
        $student->save() ;
        return redirect('/') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $students = Student::all() ;
        return view('student',['students'=>$students,'student'=>$student,'layout'=>'show']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $student = Student::find($id);
      $students = Student::all() ;
      return view('student',['students'=>$students,'student'=>$student,'layout'=>'edit']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $student = Student::find($id);
      $student->cne = $request->input('cne') ;
      $student->firstName = $request->input('firstName') ;
      $student->secondName = $request->input('secondName') ;
      $student->age = $request->input('age') ;
      $student->speciality = $request->input('speciality') ;
      $student->save() ;
      return redirect('/') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $student = Student::find($id);
      $student->delete() ;
      return redirect('/') ;
    }

    /**
     *  @param  \Illuminate\Http\Request  $request
    

    */

    

    public function search(Request $request)
        {
          $search = $request->get('search');
          $posts = DB::table('students')->where('firstName', 'like', '%' . $search . '%') -> paginate(5);
          return view('student', ['students' => $posts, 'layout'=>'index']);
        }
}
