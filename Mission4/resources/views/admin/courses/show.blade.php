@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Course Detail</h2>

    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
        <div class="p-6 space-y-4">
            <p><span class="font-semibold text-gray-700">ID:</span> {{ $course->COURSE_ID }}</p>
            <p><span class="font-semibold text-gray-700">Code:</span> {{ $course->COURSE_CODE }}</p>
            <p><span class="font-semibold text-gray-700">Name:</span> {{ $course->COURSE_NAME }}</p>
            <p><span class="font-semibold text-gray-700">Description:</span> {{ $course->DESCRIPTION }}</p>
            <p><span class="font-semibold text-gray-700">Credits:</span> {{ $course->CREDITS }}</p>
            @if($course->IMAGE)
                <div>
                    <span class="font-semibold text-gray-700">Image:</span><br>
                    <img src="{{ asset('storage/'.$course->IMAGE) }}" alt="Course Image" class="mt-2 rounded-lg shadow-md w-52">
                </div>
            @endif
        </div>
    </div>

    <a href="{{ session('user_role') === 'admin' ? route('admin.courses.dashboard') : route('student.courses.dashboard') }}" 
       class="inline-block mt-6 px-5 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 transition">
        Back to List
    </a>
</div>
@endsection
