@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">

    <h2 class="text-2xl font-bold mb-6">User Detail</h2>

    <div class="bg-white rounded-xl shadow-md p-6 mb-6 space-y-2">
        <p><strong>ID:</strong> {{ $user->USER_ID }}</p>
        <p><strong>Username:</strong> {{ $user->USERNAME }}</p>
        <p><strong>Full Name:</strong> {{ $user->FULL_NAME }}</p>
        <p><strong>Student Number:</strong> {{ $user->student->STUDENT_NUMBER ?? '-' }}</p>
        <p><strong>Entry Year:</strong> {{ $user->student->ENTRY_YEAR ?? '-' }}</p>
        <p><strong>Role:</strong> {{ ucfirst($user->ROLE) }}</p>

        @if($user->PROFILE_IMAGE)
            <div>
                <strong>Profile Image:</strong><br>
                <img src="{{ asset('storage/'.$user->PROFILE_IMAGE) }}" 
                     alt="Profile Image" class="w-40 h-40 object-cover rounded-md mt-2">
            </div>
        @endif
    </div>

    @if($user->ROLE === 'student')
        <div class="bg-white rounded-xl shadow-md p-6 mb-6">
            <h3 class="text-xl font-semibold mb-4">Courses Taken</h3>
            @if($user->student && $user->student->takes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($user->student->takes as $take)
                        <div class="border rounded-lg p-4 hover:shadow-lg transition">
                            <h4 class="font-bold">{{ $take->course->COURSE_NAME }}</h4>
                            <p><strong>Code:</strong> {{ $take->course->COURSE_CODE }}</p>
                            <p><strong>Credits:</strong> {{ $take->course->CREDITS }}</p>
                            <p><strong>Status:</strong> {{ $take->STATUS }}</p>
                            @if($take->course->IMAGE)
                                <img src="{{ asset('storage/'.$take->course->IMAGE) }}" 
                                     class="w-full h-32 object-cover rounded-md mt-2">
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">User belum mengambil course apapun.</p>
            @endif
        </div>
    @endif

    <a href="{{ route('admin.users.index') }}" 
       class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition">
       Back to List
    </a>

</div>
@endsection
