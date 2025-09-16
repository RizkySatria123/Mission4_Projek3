@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New User</h2>

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <!-- Username -->
        <div>
            <label for="USERNAME" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
            <input type="text" name="USERNAME" id="USERNAME" 
                   placeholder="Enter username"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('USERNAME') }}" required>
            @error('USERNAME') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Full Name -->
        <div>
            <label for="FULL_NAME" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input type="text" name="FULL_NAME" id="FULL_NAME"
                   placeholder="Enter full name"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('FULL_NAME') }}" required>
            @error('FULL_NAME') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Student Number -->
        <div>
            <label for="STUDENT_NUMBER" class="block text-sm font-medium text-gray-700 mb-1">Student Number</label>
            <input type="text" name="STUDENT_NUMBER" id="STUDENT_NUMBER"
                   placeholder="Enter student number (optional)"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('STUDENT_NUMBER') }}">
            @error('STUDENT_NUMBER') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Entry Year -->
        <div>
            <label for="ENTRY_YEAR" class="block text-sm font-medium text-gray-700 mb-1">Entry Year</label>
            <input type="number" name="ENTRY_YEAR" id="ENTRY_YEAR"
                   placeholder="Enter entry year (optional)"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('ENTRY_YEAR') }}">
            @error('ENTRY_YEAR') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Role -->
        <div>
            <label for="ROLE" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
            <select name="ROLE" id="ROLE" required
                    class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="student" {{ old('ROLE')=='student' ? 'selected' : '' }}>Student</option>
                <option value="admin" {{ old('ROLE')=='admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('ROLE') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="PASSWORD" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="PASSWORD" id="PASSWORD"
                   placeholder="Enter password"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   required>
            @error('PASSWORD') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="PASSWORD_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <input type="password" name="PASSWORD_confirmation" id="PASSWORD_confirmation"
                   placeholder="Confirm password"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   required>
        </div>

        <!-- Profile Image -->
        <div>
            <label for="PROFILE_IMAGE" class="block text-sm font-medium text-gray-700 mb-1">Profile Image</label>
            <input type="file" name="PROFILE_IMAGE" id="PROFILE_IMAGE" accept="image/*"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('PROFILE_IMAGE') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Buttons -->
        <div class="flex items-center space-x-4 mt-4">
            <button type="submit" 
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-md transition">
                Save
            </button>
            <a href="{{ route('admin.users.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow-md transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
