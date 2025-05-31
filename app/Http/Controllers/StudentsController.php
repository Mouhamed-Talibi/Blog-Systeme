<?php

    namespace App\Http\Controllers;

    use App\Models\Student;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class StudentsController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            // get all students 
            $students = DB::table('students')->orderBy('firstName', 'DESC')->get(); // query Builder
            $students = Student::orderBy('firstName', 'DESC')->get();
            return view('students.index', compact('students'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('students.create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            // validate fields 
            $validated = $request->validate(
                [
                    'firstName' => 'required|string|max:50',
                    'lastName' => 'required|string|max:50',
                    'email' => 'required|email|unique:students,email',
                    'password' => 'required|string',
                ]
            );

            // insert data 
            $isInserted = DB::table('students')->insert(
                [
                    'firstName' => $validated['firstName'],
                    'lastName' => $validated['lastName'],
                    'email' => $validated['email'],
                    'password' => $validated['password'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            // redirect after inserting 
            if($isInserted) {
                return to_route('students.students')->with('success', 'Student has been added successfully');
            } else {
                return back()->with('error', 'Students Has been Not Created !');
            }
        }

        /**
         * Display the specified resource.
         */
        public function show(Student $student)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Student $student)
        {
            return view('students.edit', compact('student'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Student $student)
        {
            $validated = $request->validate(
                [
                    'firstName' => 'required|string|max:50',
                    'lastName' => 'required|string|max:50',
                    'email' => 'required|email|unique:students,email,'.$student->id,
                ]
            );

            // update data 
            $isUpdated = DB::table('students')->where('id', $student->id)->update(
                [
                    'firstName' => $validated['firstName'],
                    'lastName' => $validated['lastName'],
                    'email' => $validated['email'],
                    'updated_at' => now(),
                ]
            );

            if($isUpdated) {
                return to_route('students.students')->with('success', 'Student has been updated successfully');
            } else {
                return back()->with('error', 'Student Has been Not Updated !');
            }
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Student $student)
        {
            $isDeleted = Student::destroy($student->id);
            if($isDeleted) {
                return to_route('students.students')->with('success', 'Student has been deleted successfully');
            } else {
                return back()->with('error', 'Student Has been Not Deleted !');
            }
        }
    }
