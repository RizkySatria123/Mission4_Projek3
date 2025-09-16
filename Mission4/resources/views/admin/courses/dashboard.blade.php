@extends('layouts.app')
@include('layouts.navbar-admin')

@section('content')
<div class="container mx-auto px-6 py-8">


    <h2 class="text-2xl font-bold mb-6">Manage Courses</h2>

    <!-- Tombol tambah course -->
    <a href="{{ route('admin.courses.create') }}" 
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition mb-4">
        + Tambah Course
    </a>

    <!-- Flash message -->
    @if(session('success'))
        <div class="mb-4 p-3 rounded-lg bg-green-100 border border-green-300 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Form -->
    <form method="GET" action="{{ route('admin.courses.dashboard') }}" class="mb-4 flex">
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari course..."
            class="flex-1 px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded-r-md hover:bg-blue-700 transition">
            Cari
        </button>
    </form>

    <!-- Tabel Courses -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-md">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Kode</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Credits</th>
                    <!-- <th class="px-4 py-2">Image</th> -->
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($courses as $course)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $course->COURSE_CODE }}</td>
                        <td class="px-4 py-2">{{ $course->COURSE_NAME }}</td>
                        <td class="px-4 py-2">{{ $course->CREDITS }}</td>
                        <!-- <td class="px-4 py-2">
                            @if($course->IMAGE)
                                <img src="{{ asset('storage/'.$course->IMAGE) }}" 
                                     class="w-16 h-16 object-cover rounded-md">
                            @endif
                        </td> -->
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.courses.show', $course->COURSE_ID) }}" 
                               class="text-blue-600 hover:underline">Detail</a>
                            <a href="{{ route('admin.courses.edit', $course->COURSE_ID) }}" 
                               class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.courses.destroy', $course->COURSE_ID) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Yakin hapus?')" 
                                        class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
