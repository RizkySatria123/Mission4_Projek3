@extends('layouts.app')
@include('layouts.navbar-student')

@section('content')
<h1 class="text-3xl font-bold mb-4">Student Dashboard</h1>
<h2 class="text-2xl font-semibold mb-6">Daftar Courses</h2>

<form method="GET" action="{{ route('student.courses.index') }}" class="mb-6 flex">
    <input type="text" name="search" value="{{ request('search') }}"
           placeholder="Cari course..."
           class="flex-1 px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
    <button type="submit"
           class="bg-blue-600 text-white px-4 py-2 rounded-r-md hover:bg-blue-700 transition">
        Cari
    </button>
</form>

@if($courses->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 w-full">
        @foreach($courses as $course)
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 p-4 aspect-square flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold mb-2">{{ $course->COURSE_NAME }}</h3>
                    <p class="text-gray-600 mb-1"><strong>Kode:</strong> {{ $course->COURSE_CODE }}</p>
                    <p class="text-gray-600 mb-3"><strong>Credits:</strong> {{ $course->CREDITS }}</p>
                </div>

                <div class="mt-auto space-y-2">
                    <form action="{{ route('student.courses.enroll', ['id' => $course->COURSE_ID]) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="{{ in_array($course->COURSE_ID, $userTakes) ? 'bg-red-600 cursor-not-allowed' : 'bg-blue-600 hover:bg-blue-700' }} text-white px-3 py-2 rounded-md w-full"
                            {{ in_array($course->COURSE_ID, $userTakes) ? 'disabled' : '' }}
                        >
                            {{ in_array($course->COURSE_ID, $userTakes) ? 'Enrolled' : 'Enroll' }}
                        </button>
                    </form>

                    <a href="{{ route('student.courses.show', ['id' => $course->COURSE_ID]) }}"
                       class="block text-center bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 py-2 rounded-md w-full">
                        Lihat Detail
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="text-gray-600">Belum ada course tersedia.</p>
@endif
@endsection
