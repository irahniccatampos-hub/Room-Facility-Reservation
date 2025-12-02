<x-user-layout>

    <!-- Welcome -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Hello, {{ Auth::user()->name }}
        </h1>
        <p class="text-sm text-gray-500">
            Welcome to your reservation dashboard
        </p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        <div class="p-6 bg-white rounded-xl shadow">
            <p class="text-sm text-gray-500">My Reservations</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">5</h2>
        </div>

        <div class="p-6 bg-white rounded-xl shadow">
            <p class="text-sm text-gray-500">Pending</p>
            <h2 class="text-3xl font-bold text-yellow-500 mt-2">2</h2>
        </div>

        <div class="p-6 bg-white rounded-xl shadow">
            <p class="text-sm text-gray-500">Approved</p>
            <h2 class="text-3xl font-bold text-green-600 mt-2">3</h2>
        </div>

    </div>

    <!-- Action Area -->
    <div class="flex gap-4 mb-10">
        <a href=""
           class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Make a Reservation
        </a>

        <a href=""
           class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
            View My Requests
        </a>
    </div>

    <!-- Recent Reservations -->
    <div class="bg-white p-6 rounded-lg shadow">

        <h2 class="text-lg font-semibold mb-4">My Recent Reservations</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3">Facility</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Time</th>
                        <th class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="border-b">
                        <td class="px-6 py-4">Conference Room A</td>
                        <td class="px-6 py-4">May 20, 2025</td>
                        <td class="px-6 py-4">10:00 AM - 12:00 PM</td>
                        <td class="px-6 py-4">
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                                Pending
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-6 py-4">Gymnasium</td>
                        <td class="px-6 py-4">May 22, 2025</td>
                        <td class="px-6 py-4">1:00 PM - 3:00 PM</td>
                        <td class="px-6 py-4">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                Approved
                            </span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

</x-user-layout>
