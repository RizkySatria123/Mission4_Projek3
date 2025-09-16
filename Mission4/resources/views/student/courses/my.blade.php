@extends('layouts.app')
@include('layouts.navbar-student')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-semibold mb-6">Course Saya</h2>

    <form method="GET" action="{{ route('student.courses.my') }}" class="mb-6 flex">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Cari course..."
               class="flex-1 px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit"
               class="bg-blue-600 text-white px-4 py-2 rounded-r-md hover:bg-blue-700 transition">
            Cari
        </button>
    </form>

    <div class="w-full overflow-x-auto rounded-lg shadow-md border border-gray-200">
    <table class="w-full min-w-[600px] bg-white divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">No</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Kode</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Nama</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Credits</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Status</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Grade</th>
            </tr>
        </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($takes as $index => $take)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700">{{ $take->course->COURSE_CODE ?? '-' }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700">{{ $take->course->COURSE_NAME ?? '-' }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700">{{ $take->course->CREDITS ?? '-' }}</td>
                    <td class="py-2 px-4 text-sm">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold
                            {{ $take->STATUS === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($take->STATUS) }}
                        </span>
                    </td>
                    <td class="py-2 px-4 text-sm text-gray-700">{{ $take->GRADE }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>

        @if($takes->isEmpty())
            <p class="p-4 text-gray-500">Tidak ada course yang ditemukan.</p>
        @endif
    </div>

</div>
@endsection
