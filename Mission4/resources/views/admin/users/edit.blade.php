@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit User</h2>

    <form action="{{ route('admin.users.update', $user->USER_ID) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Username -->
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
            <input type="text" name="USERNAME" id="username" 
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('USERNAME', $user->USERNAME) }}" required>
            @error('USERNAME') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Full Name -->
        <div>
            <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input type="text" name="FULL_NAME" id="full_name" 
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('FULL_NAME', $user->FULL_NAME) }}" required>
            @error('FULL_NAME') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Role -->
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
            <select name="ROLE" id="role" required
                    class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="admin" {{ old('ROLE', $user->ROLE) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="student" {{ old('ROLE', $user->ROLE) == 'student' ? 'selected' : '' }}>Student</option>
            </select>
            @error('ROLE') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                Password <span class="text-gray-500 text-sm">(Kosongkan jika tidak ingin diubah)</span>
            </label>
            <input type="password" name="PASSWORD" id="password"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('PASSWORD') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Profile Image -->
        <div>
            <label for="profile_image" class="block text-sm font-medium text-gray-700 mb-1">Profile Image</label>
            @if($user->PROFILE_IMAGE)
                <div class="mb-3">
                    <img src="{{ asset('storage/'.$user->PROFILE_IMAGE) }}" alt="Profile Image" class="w-32 h-32 object-cover rounded-md shadow">
                </div>
            @endif
            <input type="file" name="PROFILE_IMAGE" id="profile_image" accept="image/*"
                   class="w-full border border-gray-300 rounded-lg shadow-sm mt-1 px-3 py-2 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('PROFILE_IMAGE') <small class="text-red-600">{{ $message }}</small> @enderror
        </div>

        <!-- Buttons -->
        <div class="flex items-center space-x-4 mt-4">
            <button type="submit" 
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow-md transition">
                Update
            </button>
            <a href="{{ route('admin.users.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow-md transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
