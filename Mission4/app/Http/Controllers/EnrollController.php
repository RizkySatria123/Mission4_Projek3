<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Take;
use App\Models\User;

class EnrollController extends Controller
{
    // Ambil id student
    private function getStudentId()
    {
        $userId = session('user_id');
        if (!$userId) {
            abort(403, 'Sesi login habis, silakan login lagi.');
        }

        $user = User::find($userId);
        if (!$user || !$user->student) {
            abort(403, 'Data mahasiswa untuk akun ini belum tersedia.');
        }

        return $user->student->STUDENT_ID;
    }

    // READ
    public function index(Request $request)
    {
        $studentId = $this->getStudentId();

        $query = Course::query();
        // Ambil semua courses
        $courses = Course::all();
        
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('COURSE_NAME', 'like', "%{$search}%")
                 ->orWhere('COURSE_CODE', 'like', "%{$search}%");
        }

        $courses = $query->get();

        // Ambil semua course yang sudah diambil student ini
        $userTakes = Take::where('STUDENT_ID', $studentId)
                         ->pluck('COURSE_ID')
                         ->toArray();

        return view('student.courses.index', compact('courses', 'userTakes'));
    }

    // Enroll
    public function enroll($id)
    {
        $studentId = $this->getStudentId();

        $course = Course::find($id);
        if (!$course) {
            return redirect()->back()->with('error', 'Course tidak ditemukan.');
        }

        // Cek apakah sudah pernah ambil course
        $sudahAmbil = Take::where('STUDENT_ID', $studentId)
                          ->where('COURSE_ID', $id)
                          ->exists();

        if ($sudahAmbil) {
            return redirect()->back()->with('error', 'Kamu sudah terdaftar di course ini.');
        }

        // Simpan ke tabel TAKES
        try {
            Take::create([
                'STUDENT_ID' => $studentId,
                'COURSE_ID'  => $id,
                'ENROLL_DATE'=> now(),
                'GRADE'      => 0.00,
                'STATUS'     => 'active',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat enroll.');
        }

        return redirect()->back()->with('success', 'Berhasil enroll ke course.');
    }

    // Enrolled Course
    public function myCourses(Request $request)
    {
        $studentId = $this->getStudentId();

        $query = Take::with('course')
                    ->where('STUDENT_ID', $studentId)
                    ->orderBy('ENROLL_DATE', 'desc');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('course', function($q) use ($search) {
                $q->where('COURSE_NAME', 'like', "%{$search}%")
                ->orWhere('COURSE_CODE', 'like', "%{$search}%");
            });
        }

        // Ambil hasil query
        $takes = $query->get();

        return view('student.courses.my', compact('takes'));
    }


    public function show($id)
    {
        $course = Course::findOrFail($id);
        $studentId = $this->getStudentId();

        // Ambil daftar course yang sudah diambil student (optional)
        $userTakes = Take::where('STUDENT_ID', $studentId)
                         ->pluck('COURSE_ID')
                         ->toArray();

        return view('student.courses.show', compact('course', 'userTakes'));
    }
}
