<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.data')->with([

            'students' => Students::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|string',
            'fullname' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|in:1,2',
            'emailaddress' => 'required|email',
            'phone' => 'required|string',
        ]);

        // Buat instance model Student
        $student = new Students();
        $student->nim = $request->nim;
        $student->fullname = $request->fullname;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->emailaddress = $request->emailaddress;
        $student->phone = $request->phone;

        // Simpan data siswa
        $student->save();

        // Redirect dengan pesan sukses
        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nim)
    {
        $students = Students::where('nim', $nim)->first();
        return view('students.edit', compact('students'));
    }






    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Students $students)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'nim' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:1,2',
            'emailaddress' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Update data siswa berdasarkan data yang dikirim dari formulir
        $students->where('nim', $request->nim)->update([
            'nim' => $request->nim,
            'fullname' => $request->fullname,
            'address' => $request->address,
            'gender' => $request->gender,
            'emailaddress' => $request->emailaddress,
            'phone' => $request->phone,
            // Tambahkan atribut lain yang perlu diupdate
        ]);

        // Redirect kembali ke halaman index atau halaman detail siswa
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students, string $nim)
    {
        $students = Students::where('nim', $nim)->first();
        $students->delete();
        return redirect('/students')->with('danger', 'Gaji has been delete');
    }
}
