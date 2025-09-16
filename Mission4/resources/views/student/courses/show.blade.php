@extends('layouts.app')
@include('layouts.navbar-student')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-6">
    <h1 class="text-3xl font-bold mb-4">{{ $course->COURSE_NAME }}</h1>

    <p class="text-gray-700 mb-2"><strong>Kode:</strong> {{ $course->COURSE_CODE }}</p>
    <p class="text-gray-700 mb-2"><strong>Credits:</strong> {{ $course->CREDITS }}</p>
    <p class="text-gray-700 mb-2"><strong>Deskripsi:</strong> {{ $course->DESCRIPTION ?? 'Belum ada deskripsi.' }}</p>

    <div class="mt-4 flex space-x-4">
        <form action="{{ route('student.courses.enroll', ['id' => $course->COURSE_ID]) }}" method="POST">
            @csrf
            <button type="submit"
                class="{{ in_array($course->COURSE_ID, $userTakes) ? 'bg-red-600 cursor-not-allowed' : 'bg-blue-600 hover:bg-blue-700' }} text-white px-4 py-2 rounded-md"
                {{ in_array($course->COURSE_ID, $userTakes) ? 'disabled' : '' }}
            >
                {{ in_array($course->COURSE_ID, $userTakes) ? 'Enrolled' : 'Enroll' }}
            </button>
        </form>

        <a href="{{ route('student.dashboard') }}"
           class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md">
            Kembali
        </a>
    </div>
</div>
@endsection
