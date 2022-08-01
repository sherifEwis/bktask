<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	return Student::all();
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

	$request->validate([
            'name'=>'required',
            'school_id'=>'integer|required'
        ]);
       return Student::create($request->all());

    }

   public function update(Request $request, $id)
    {

	    $student=Student::find($id);
            $student->update($request->all());
	    return $student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    return Student::destroy($id);

    }
}
