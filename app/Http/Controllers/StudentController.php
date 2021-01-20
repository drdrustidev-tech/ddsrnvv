<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


use Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $data['students'] = Student::orderBy('id','desc')->paginate(5);   
        //return view('student.index',$data);        
		return view('student.index');
    }

    public function get_student_data(Request $request)
    {
        //
        $students = Student::latest()->paginate(5);

        // if($request->ajax()){
        //     return "AJAX";
        // }

        return $request->ajax() ? 
        response()->json($students) 
        : abort(404);

       // return response()->json($students);
                     

        
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 


        Student::updateOrCreate(
            [
              'id' => $request->student_id
            ],
            [
              'first_name' => $request->first_name,
              'last_name' => $request->last_name,
              'address' => $request->address
            ]
          );
      
          return response()->json(
            [
              'success' => true,
              'message' => 'Data inserted successfully'
            ]
          );




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }
    
    
    public function getstudentbyid($id)
    {
        //
        $where = array('id' => $id);
        $student  = Student::where($where)->first();
 
        return Response::json($student);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $where = array('id' => $id);
         $student  = Student::where($where)->first();
 
        return Response::json($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $student = Student::find($request->post('hdnStudentId'));
        $student->first_name = $request->post('txtFirstName');
        $student->last_name = $request->post('txtLastName');
        $student->address = $request->post('txtAddress');
        $student->update();
 return Response::json($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Student::where('id',$id)->delete();
        return Response::json($student);
    }
}
