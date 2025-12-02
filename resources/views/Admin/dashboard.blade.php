<x-admin-layout>
    <div class="p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard Analytics</h1>
            <p class="text-gray-600 mt-2">Monitor your reservation system performance and metrics</p>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-gray-500">Total Reservations</p>
                        <p class="text-3xl font-bold mt-2">1,847</p>
                        <p class="text-sm text-green-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i> 18% from last month
                        </p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <i class="fas fa-calendar-check text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-gray-500">Active Users</p>
                        <p class="text-3xl font-bold mt-2">324</p>
                        <p class="text-sm text-green-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                        </p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-lg">
                        <i class="fas fa-users text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-gray-500">Revenue</p>
                        <p class="text-3xl font-bold mt-2">$12,480</p>
                        <p class="text-sm text-green-600 mt-1">
                            <i class="fas fa-arrow-up mr-1"></i> 24% from last month
                        </p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <i class="fas fa-dollar-sign text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-gray-500">Facility Usage</p>
                        <p class="text-3xl font-bold mt-2">78%</p>
                        <p class="text-sm text-yellow-600 mt-1">
                            <i class="fas fa-minus mr-1"></i> 2% from last month
                        </p>
                    </div>
                    <div class="p-3 bg-yellow-100 rounded-lg">
                        <i class="fas fa-chart-pie text-yellow-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Monthly Reservations Chart -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Monthly Reservations</h2>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2">
                        <option selected>Last 6 Months</option>
                        <option>Last 12 Months</option>
                        <option>This Year</option>
                    </select>
                </div>
                <div class="h-80">
                    <canvas id="monthlyReservationsChart"></canvas>
                </div>
            </div>

            <!-- Facility Usage Chart -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Facility Usage Distribution</h2>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2">
                        <option selected>This Month</option>
                        <option>Last Month</option>
                        <option>This Quarter</option>
                    </select>
                </div>
                <div class="h-80">
                    <canvas id="facilityUsageChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Additional Analytics -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Peak Hours Chart -->
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold mb-6">Peak Booking Hours</h2>
                <div class="h-64">
                    <canvas id="peakHoursChart"></canvas>
                </div>
                <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="text-center p-3 bg-blue-50 rounded-lg">
                        <p class="text-sm text-gray-600">Most Active</p>
                        <p class="font-bold text-lg">2:00 PM</p>
                    </div>
                    <div class="text-center p-3 bg-green-50 rounded-lg">
                        <p class="text-sm text-gray-600">Least Active</p>
                        <p class="font-bold text-lg">8:00 AM</p>
                    </div>
                    <div class="text-center p-3 bg-yellow-50 rounded-lg">
                        <p class="text-sm text-gray-600">Avg. Duration</p>
                        <p class="font-bold text-lg">2.5 hrs</p>
                    </div>
                    <div class="text-center p-3 bg-purple-50 rounded-lg">
                        <p class="text-sm text-gray-600">Busiest Day</p>
                        <p class="font-bold text-lg">Wednesday</p>
                    </div>
                </div>
            </div>

            <!-- User Activity -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold mb-6">User Activity</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-medium">Active Today</p>
                                <p class="text-sm text-gray-600">Users logged in</p>
                            </div>
                        </div>
                        <span class="text-xl font-bold">42</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-calendar-plus text-green-600"></i>
                            </div>
                            <div>
                                <p class="font-medium">New Bookings</p>
                                <p class="text-sm text-gray-600">Today's reservations</p>
                            </div>
                        </div>
                        <span class="text-xl font-bold">18</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-clock text-yellow-600"></i>
                            </div>
                            <div>
                                <p class="font-medium">Pending Approvals</p>
                                <p class="text-sm text-gray-600">Requires attention</p>
                            </div>
                        </div>
                        <span class="text-xl font-bold text-yellow-600">7</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-times-circle text-red-600"></i>
                            </div>
                            <div>
                                <p class="font-medium">Cancellations</p>
                                <p class="text-sm text-gray-600">This week</p>
                            </div>
                        </div>
                        <span class="text-xl font-bold">3</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue Analytics -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">Revenue Overview</h2>
                <div class="flex space-x-2">
                    <button class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">
                        Export Report
                    </button>
                    <button class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50">
                        View Details
                    </button>
                </div>
            </div>
            <div class="h-80">
                <canvas id="revenueChart"></canvas>
            </div>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-4 bg-blue-50 rounded-lg">
                    <p class="text-sm text-gray-600">Total Revenue</p>
                    <p class="text-2xl font-bold">$48,920</p>
                    <p class="text-sm text-green-600 mt-1">
                        <i class="fas fa-arrow-up mr-1"></i> 22% from last quarter
                    </p>
                </div>
                <div class="p-4 bg-green-50 rounded-lg">
                    <p class="text-sm text-gray-600">Avg. Booking Value</p>
                    <p class="text-2xl font-bold">$85.50</p>
                    <p class="text-sm text-green-600 mt-1">
                        <i class="fas fa-arrow-up mr-1"></i> 8% from last quarter
                    </p>
                </div>
                <div class="p-4 bg-purple-50 rounded-lg">
                    <p class="text-sm text-gray-600">Top Facility</p>
                    <p class="text-2xl font-bold">Conference A</p>
                    <p class="text-sm text-gray-600 mt-1">$12,450 revenue</p>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Bookings -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Recent Bookings</h2>
                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div>
                            <p class="font-medium">Conference Room B</p>
                            <p class="text-sm text-gray-600">John Smith • Today, 2:00 PM</p>
                        </div>
                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Confirmed</span>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div>
                            <p class="font-medium">Laboratory 3</p>
                            <p class="text-sm text-gray-600">Sarah Johnson • Tomorrow, 10:00 AM</p>
                        </div>
                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div>
                            <p class="font-medium">Gymnasium</p>
                            <p class="text-sm text-gray-600">Mike Wilson • Dec 15, 6:00 PM</p>
                        </div>
                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Confirmed</span>
                    </div>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div>
                            <p class="font-medium">Auditorium</p>
                            <p class="text-sm text-gray-600">University Events • Dec 20, 9:00 AM</p>
                        </div>
                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                    </div>
                </div>
            </div>

            <!-- System Status -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h2 class="text-xl font-bold mb-6">System Status</h2>
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium">Server Uptime</span>
                            <span class="text-sm font-bold text-green-600">99.8%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 99.8%"></div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium">Database Performance</span>
                            <span class="text-sm font-bold text-green-600">Excellent</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 95%"></div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium">API Response Time</span>
                            <span class="text-sm font-bold text-yellow-600">Medium</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-600 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium">Storage Usage</span>
                            <span class="text-sm font-bold text-blue-600">65%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 65%"></div>
                        </div>
                    </div>
                    
                    <div class="pt-4 border-t border-gray-200">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-3 bg-blue-50 rounded-lg">
                                <p class="text-2xl font-bold">24/7</p>
                                <p class="text-sm text-gray-600">Support Available</p>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <p class="text-2xl font-bold">0</p>
                                <p class="text-sm text-gray-600">System Alerts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Monthly Reservations Chart (Line Chart)
            const monthlyReservationsCtx = document.getElementById('monthlyReservationsChart').getContext('2d');
            const monthlyReservationsChart = new Chart(monthlyReservationsCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Reservations',
                        data: [120, 150, 180, 210, 240, 280, 310, 290, 260, 230, 200, 180],
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                drawBorder: false
                            },
                            ticks: {
                                callback: function(value) {
                                    return value;
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Facility Usage Chart (Doughnut Chart)
            const facilityUsageCtx = document.getElementById('facilityUsageChart').getContext('2d');
            const facilityUsageChart = new Chart(facilityUsageCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Conference Rooms', 'Laboratories', 'Gym/Fitness', 'Study Rooms', 'Auditoriums', 'Classrooms'],
                    datasets: [{
                        data: [35, 20, 15, 12, 10, 8],
                        backgroundColor: [
                            '#3b82f6', // Blue
                            '#10b981', // Green
                            '#f59e0b', // Yellow
                            '#8b5cf6', // Purple
                            '#ef4444', // Red
                            '#06b6d4'  // Cyan
                        ],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                padding: 15
                            }
                        }
                    },
                    cutout: '65%'
                }
            });

            // Peak Hours Chart (Bar Chart)
            const peakHoursCtx = document.getElementById('peakHoursChart').getContext('2d');
            const peakHoursChart = new Chart(peakHoursCtx, {
                type: 'bar',
                data: {
                    labels: ['8 AM', '10 AM', '12 PM', '2 PM', '4 PM', '6 PM', '8 PM'],
                    datasets: [{
                        label: 'Number of Bookings',
                        data: [12, 28, 45, 68, 52, 34, 18],
                        backgroundColor: '#3b82f6',
                        borderColor: '#2563eb',
                        borderWidth: 1,
                        borderRadius: 6,
                        barPercentage: 0.6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Revenue Chart (Line Chart with Area)
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                    datasets: [
                        {
                            label: '2023 Revenue',
                            data: [8500, 10200, 12400, 14800],
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4
                        },
                        {
                            label: '2024 Revenue',
                            data: [9200, 11200, 13500, 15800],
                            borderColor: '#3b82f6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                drawBorder: false
                            },
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-admin-layout>