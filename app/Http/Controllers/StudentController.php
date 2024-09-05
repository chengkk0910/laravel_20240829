<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
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

        $data = Student::all();

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
        // $data = $request->except('_token');
        // dd($data);

        $student = new Student();

        $student->name = $request->name;
        $student->mobile = $request->mobile;


        // $obj['id']
        // $obj->id
        // $obj.id

        // $obj['id']()
        // $obj->id()
        // $obj.id()


        $student->save();

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

        $data = Student::where('id', $id)->first();
        $data->name = $input['name'];
        $data->mobile = $input['mobile'];
        $data->save();

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Student::where('id', $id)->first();
        $data->delete();
        return redirect()->route('students.index');
    }
}
