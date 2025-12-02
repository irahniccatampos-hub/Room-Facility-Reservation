<x-layout>
    <!-- RESERVATION ANALYTICS -->
<div class="mt-10 bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Reservation Analytics</h2>

    <!-- Analytics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Most Reserved Room -->
        <div class="p-5 bg-blue-50 border border-blue-200 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold text-blue-700">Most Reserved Room</h3>
            <p class="mt-2 text-4xl font-bold text-blue-900">Library</p>
            <p class="text-sm text-blue-600 mt-1">42 reservations this month</p>
        </div>

        <!-- Peak Reservation Time -->
        <div class="p-5 bg-green-50 border border-green-200 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold text-green-700">Peak Reservation Time</h3>
            <p class="mt-2 text-4xl font-bold text-green-900">1 PM - 3 PM</p>
            <p class="text-sm text-green-600 mt-1">Most active hours</p>
        </div>

        <!-- Most Active Day -->
        <div class="p-5 bg-yellow-50 border border-yellow-200 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold text-yellow-700">Most Active Day</h3>
            <p class="mt-2 text-4xl font-bold text-yellow-900">Wednesday</p>
            <p class="text-sm text-yellow-600 mt-1">Highest number of bookings</p>
        </div>

    </div>

    <!-- Chart Placeholder -->
    <div class="mt-10">
        <h3 class="text-lg font-semibold mb-3">Weekly Reservation Chart</h3>

        <div class="h-72 bg-gray-100 border border-gray-300 rounded-lg flex items-center justify-center text-gray-500">
            Chart Placeholder (Flowbite Charts or ApexCharts)
        </div>
    </div>

</div>

</x-layout>