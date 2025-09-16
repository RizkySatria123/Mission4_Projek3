@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Course</h2>

    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Course Code -->
        <div>
            <label for="course_code" class="block text-sm font-medium text-gray-700 mb-1">Course Code</label>
            <input type="text" name="course_code" id="course_code" 
                   placeholder="Enter course code"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('course_code') }}" required>
            @error('course_code') 
                <small class="text-red-600">{{ $message }}</small> 
            @enderror
        </div>

        <!-- Course Name -->
        <div>
            <label for="course_name" class="block text-sm font-medium text-gray-700 mb-1">Course Name</label>
            <input type="text" name="course_name" id="course_name" 
                   placeholder="Enter course name"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('course_name') }}" required>
            @error('course_name') 
                <small class="text-red-600">{{ $message }}</small> 
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" id="description" rows="4"
                      placeholder="Write a brief description of the course"
                      class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
            @error('description') 
                <small class="text-red-600">{{ $message }}</small> 
            @enderror
        </div>

        <!-- Credits -->
        <div>
            <label for="credits" class="block text-sm font-medium text-gray-700 mb-1">Credits</label>
            <input type="number" step="0.01" name="credits" id="credits"
                   placeholder="e.g., 3.0"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('credits') }}" required>
            @error('credits') 
                <small class="text-red-600">{{ $message }}</small> 
            @enderror
        </div>

        <!-- Course Image -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Course Image</label>
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('image') 
                <small class="text-red-600">{{ $message }}</small> 
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex items-center space-x-4">
            <button type="submit" 
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-md transition">
                Save
            </button>
            <a href="{{ route('admin.courses.dashboard') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow-md transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
