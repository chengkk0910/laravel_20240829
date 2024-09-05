<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Phone;
// use Illuminate\Support\Facades\DB;




class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        // foreach (Flight::all() as $flight) {
        //     echo $flight->name;
        // }

        // $users = DB::table('users')
        //         ->where('votes', '=', 100)
        //         ->where('age', '>', 35)
        //         ->get();

        // $data = DB::table('students')
        //     ->get();

        $data = Student::with('phoneRelation')->get();
        // dd($data);
        // $data = Student::find(1)->phoneRelation->phone;
        // $data = Student::find(1)->phoneRelation->student_id;
        // dd($data);

        foreach ($data as $key => $value) {
            $rankText = 1;
            if ($value['id'] > 2) {
                $rankText = 2;
            }
            $data[$key]['rank'] = $rankText;
        }
        // dd($data);

        return view('student.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('create controller ok');
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('StudentController store ok');
        // $data = $request->all();
        $data = $request->except('_token');
        // dd($data);

        // Student
        $student = new Student();
        $student->name = $request->name;
        $student->mobile = $request->mobile;
        $student->save();
        // dd($student);


        // $student_id = Student::orderBy('id', 'desc')->fisrt();
        // dd($student_id);


        // Phone
        $phone = new Phone();
        $phone->student_id = $student->id;
        $phone->phone = $request->phone;
        $phone->save();

        // $obj['id']
        // $obj->id
        // $obj.id

        // $obj['id']()
        // $obj->id()
        // $obj.id()




        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd('hello StudentController edit');
        // dd($id);
        // $data = Student::find($id);
        $data = Student::where('id', $id)->first();
        // dd($data);
        return view('student.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd('hello StudentController update action');
        // $input = $request->all();
        $input = $request->except('_token', '_method');
        // dd($input);

        // 主表 student
        $data = Student::where('id', $id)->first();
        $data->name = $input['name'];
        $data->mobile = $input['mobile'];
        $data->save();

        // 子表 phone
        $data = Phone::where('student_id', $id)->delete();

        // Phone
        $phone = new Phone();
        $phone->student_id = $id;
        $phone->phone = $request->phone;
        $phone->save();

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::where('id', $id)->delete();
        Phone::where('student_id', $id)->delete();
        return redirect()->route('students.index');
    }
}
