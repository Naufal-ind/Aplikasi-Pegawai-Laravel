<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Nisn;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $katakunci = request('search');
        if($katakunci){
            $student = Student::where('nama','LIKE', '%' . $katakunci . '%')->paginate(4);
        }else{
            $student = Student::latest()->paginate(4);
        }
        return view('dashboard.student', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.addstudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:1',
            'alamat' => 'required|min:1',
            'email' => 'required|min:1',
            'tempatlahir' => 'required|min:1',
            'tanggallahir' => 'required|min:1',
            'nisn' => 'required|min:1',
        ]);

        $student = Student::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
        ]);

        $nisn = new Nisn;
        $nisn->id_student = $student->id;
        $nisn->nisn = $request->nisn;
        $nisn->save();

        return redirect()->route('student.index')->with(['success' => 'Data berhasil DiSimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('dashboard.editstudent', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'nama' => 'required|min:1',
            'alamat' => 'required|min:1',
            'email' => 'required|min:1',
            'tempatlahir' => 'required|min:1',
            'tanggallahir' => 'required|min:1',
            'nisn' => 'required|min:1',
        ]);

        $student->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
        ]);

        $nisn = Nisn::where('id_student', $student->id)->update(['nisn' => $request->nisn, ]);
        return redirect()->route('student.index')->with(['success' => 'Data Berhasil DiUpdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with(['success' => 'Data berhasil Delete!']);
    }
}
