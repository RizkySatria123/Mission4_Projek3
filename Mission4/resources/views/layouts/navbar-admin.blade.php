<header class="bg-gray-900 text-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Kiri -->
            <div>
                <h1 class="text-2xl font-bold">Admin Dashboard</h1>
                <p class="text-sm">
                    Halo, <span class="font-semibold">{{ session('user_name') }}</span> 
                    ({{ session('user_role') }})
                </p>
            </div>

            <!-- Kanan: Navigasi + Logout -->
            <div class="flex items-center space-x-4">
                <nav class="space-x-4">
                    <a href="{{ route('admin.courses.dashboard') }}" 
                       class="hover:text-gray-300 transition">Manage Courses</a>
                    <a href="{{ route('admin.users.index') }}" 
                       class="hover:text-gray-300 transition">Manage Users</a>
                </nav>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" 
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow-md transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>
