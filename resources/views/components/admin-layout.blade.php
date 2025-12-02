<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReservaSpace | Admin Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .sidebar {
            transition: all 0.3s ease;
        }
        
        .sidebar-collapsed {
            width: 5rem !important;
        }
        
        .sidebar-collapsed .sidebar-text {
            display: none;
        }
        
        .sidebar-collapsed .logo-text {
            display: none;
        }
        
        .main-content {
            transition: all 0.3s ease;
        }
        
        .stat-card {
            transition: transform 0.2s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
        }
        
        .active-sidebar-link {
            background-color: #3b82f6;
            color: white;
        }
        
        .active-sidebar-link:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- Top Navigation -->
    <nav class="fixed top-0 right-0 left-0 z-50 bg-white border-b border-gray-200 px-4 py-3">
        <div class="flex items-center justify-between">
            <!-- Left: Sidebar toggle and breadcrumb -->
            <div class="flex items-center space-x-4">
                <button id="sidebarToggle" class="p-2 rounded-lg text-gray-500 hover:bg-gray-100">
                    <i class="fas fa-bars text-lg"></i>
                </button>
                
                <div class="hidden md:flex items-center space-x-2 text-sm text-gray-600">
                    <a href="#" class="hover:text-blue-600">Dashboard</a>
                    <span class="text-gray-400">/</span>
                    <span class="text-gray-800">Overview</span>
                </div>
            </div>
            
            <!-- Center: Search -->
            <div class="flex-1 max-w-xl mx-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Search reservations, users, facilities...">
                </div>
            </div>
            
            <!-- Right: User menu and notifications -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <button type="button" class="relative p-2 rounded-lg text-gray-500 hover:bg-gray-100">
                    <i class="fas fa-bell text-lg"></i>
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">3</span>
                </button>
                
                <!-- Messages -->
                <button type="button" class="relative p-2 rounded-lg text-gray-500 hover:bg-gray-100">
                    <i class="fas fa-envelope text-lg"></i>
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-blue-500 rounded-full">5</span>
                </button>
                
                <!-- User dropdown -->
                <div class="flex items-center space-x-3">
                    <div class="hidden md:block text-right">
                        <p class="text-sm font-medium text-gray-900">Admin User</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                    
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" id="user-menu-button">
                        <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin+User&background=3b82f6&color=fff" alt="Admin User">
                    </button>
                    
                    <!-- Dropdown menu -->
                    <div class="hidden absolute top-14 right-4 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900">Admin User</span>
                            <span class="block text-sm text-gray-500 truncate">admin@reservaspace.com</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog mr-2"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-chart-bar mr-2"></i> Analytics
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
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-white border-r border-gray-200">
        <div class="h-full px-3 pb-4 overflow-y-auto">
            <!-- Logo -->
            <div class="flex items-center p-2 mb-8">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-white text-xl"></i>
                </div>
                <div class="ml-3 logo-text">
                    <span class="text-xl font-bold text-blue-600">Reserva<span class="text-green-500">Space</span></span>
                    <p class="text-xs text-gray-500">Admin Panel</p>
                </div>
            </div>
            
            <!-- Navigation -->
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 active-sidebar-link">
                        <i class="fas fa-tachometer-alt text-lg w-6"></i>
                        <span class="ml-3 sidebar-text">Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-gray-900 rounded-lg hover:bg-gray-100" data-collapse-toggle="reservations-collapse">
                        <i class="fas fa-calendar-check text-lg w-6"></i>
                        <span class="flex-1 ml-3 text-left sidebar-text">Reservations</span>
                        <i class="fas fa-chevron-down sidebar-text"></i>
                    </button>
                    <ul id="reservations-collapse" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#" class="flex items-center p-2 pl-11 text-gray-900 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-list w-4 mr-2"></i>
                                <span class="sidebar-text">All Reservations</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 pl-11 text-gray-900 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-clock w-4 mr-2"></i>
                                <span class="sidebar-text">Pending Approval</span>
                                <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-xs font-medium text-white bg-yellow-500 rounded-full">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 pl-11 text-gray-900 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-check-circle w-4 mr-2"></i>
                                <span class="sidebar-text">Confirmed</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 pl-11 text-gray-900 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-times-circle w-4 mr-2"></i>
                                <span class="sidebar-text">Cancelled</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-building text-lg w-6"></i>
                        <span class="ml-3 sidebar-text">Facilities</span>
                    </a>
                </li>
                
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-users text-lg w-6"></i>
                        <span class="ml-3 sidebar-text">Users</span>
                    </a>
                </li>
                
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-gray-900 rounded-lg hover:bg-gray-100" data-collapse-toggle="reports-collapse">
                        <i class="fas fa-chart-bar text-lg w-6"></i>
                        <span class="flex-1 ml-3 text-left sidebar-text">Reports</span>
                        <i class="fas fa-chevron-down sidebar-text"></i>
                    </button>
                    <ul id="reports-collapse" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#" class="flex items-center p-2 pl-11 text-gray-900 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-chart-line w-4 mr-2"></i>
                                <span class="sidebar-text">Usage Analytics</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 pl-11 text-gray-900 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-file-invoice-dollar w-4 mr-2"></i>
                                <span class="sidebar-text">Revenue Reports</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 pl-11 text-gray-900 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-calendar-alt w-4 mr-2"></i>
                                <span class="sidebar-text">Booking Trends</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-cog text-lg w-6"></i>
                        <span class="ml-3 sidebar-text">Settings</span>
                    </a>
                </li>
                
                <li class="pt-8 mt-8 border-t border-gray-200">
                    <div class="p-4 bg-blue-50 rounded-lg">
                        <h4 class="text-sm font-bold text-blue-900 sidebar-text">Quick Stats</h4>
                        <div class="mt-2 space-y-2">
                            <div class="flex justify-between">
                                <span class="text-xs text-gray-600 sidebar-text">Today's Bookings:</span>
                                <span class="text-xs font-bold sidebar-text">24</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-xs text-gray-600 sidebar-text">Pending Approvals:</span>
                                <span class="text-xs font-bold text-yellow-600 sidebar-text">12</span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <main id="mainContent" class="main-content pt-20 ml-64 p-6">
        <!-- This is where child content would be injected -->
        <div class="container">
            {{ $slot }}
        </div>
    </main>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    
    
    <!-- Custom JavaScript -->
    <script>
        // Sidebar toggle functionality
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-collapsed');
            mainContent.classList.toggle('ml-64');
            mainContent.classList.toggle('ml-20');
        });
        
        // User dropdown toggle
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');
        
        userMenuButton.addEventListener('click', () => {
            userDropdown.classList.toggle('hidden');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                userDropdown.classList.add('hidden');
            }
        });
        
        // Active sidebar link highlighting
        const sidebarLinks = document.querySelectorAll('aside a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Remove active class from all links
                sidebarLinks.forEach(l => l.classList.remove('active-sidebar-link'));
                
                // Add active class to clicked link
                this.classList.add('active-sidebar-link');
            });
        });
        
        // Initialize Flowbite collapse components
        document.addEventListener('DOMContentLoaded', function() {
            // This ensures Flowbite collapse components work properly
            const collapseButtons = document.querySelectorAll('[data-collapse-toggle]');
            collapseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-collapse-toggle');
                    const target = document.getElementById(targetId);
                    if (target) {
                        target.classList.toggle('hidden');
                    }
                });
            });
        });
    </script>
</body>
</html>