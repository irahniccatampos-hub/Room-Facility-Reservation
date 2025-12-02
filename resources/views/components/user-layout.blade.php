<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Layout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">

<!-- Top Navbar -->
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <!-- Sidebar Toggle -->
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                    aria-controls="logo-sidebar" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100">
                    <span class="sr-only">Open sidebar</span>
                    ☰
                </button>

                <span class="ml-3 text-xl font-semibold text-gray-800">
                    Room & Facility Reservation
                </span>
            </div>

            <div class="flex items-center">
                <span class="text-sm text-gray-600 mr-4">Admin</span>
                <img class="w-8 h-8 rounded-full"
                     src="https://ui-avatars.com/api/?name=Admin"
                     alt="user photo">
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<aside id="logo-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
       aria-label="Sidebar">

    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">

            <li>
                <a href="#"
                   class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100">
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#"
                   class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100">
                    <span class="ml-3">Reservations</span>
                </a>
            </li>

            <li>
                <a href="#"
                   class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100">
                    <span class="ml-3">Rooms</span>
                </a>
            </li>

            <li>
                <a href="#"
                   class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-100">
                    <span class="ml-3">Users</span>
                </a>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST" class="flex items-center p-2 text-red-600 rounded-lg hover:bg-red-100">  
                   @csrf
                    <button type="submit" class="ml-3">Logout</button>
                </form>
            </li>

        </ul>
    </div>
</aside>

<!-- Main Content -->
<div class="p-4 sm:ml-64 mt-14">
    <div class="p-6 bg-white rounded-lg shadow-md min-h-screen">
        {{ $slot }}
    </div>
</div>

<!-- Flowbite JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
