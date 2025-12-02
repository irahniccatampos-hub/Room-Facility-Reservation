<x-layout>
    <div class="p-6">

    <!-- Page Title -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Dashboard</h1>

        <!-- Reserve Button -->
        <button
            data-modal-target="reserveModal"
            data-modal-toggle="reserveModal"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow">
            + Reserve Room
        </button>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-600 font-medium">Upcoming Reservations</h3>
            <p class="text-4xl font-bold text-blue-600 mt-2">4</p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-600 font-medium">Pending Approvals</h3>
            <p class="text-4xl font-bold text-yellow-600 mt-2">2</p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-600 font-medium">Total Reservations</h3>
            <p class="text-4xl font-bold text-green-600 mt-2">19</p>
        </div>

    </div>

    <!-- Calendar Section -->
    <div class="mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Calendar View</h2>

        <div class="h-96 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500">
            Calendar placeholder (FullCalendar or Flowbite Calendar)
        </div>
    </div>

    <!-- My Reservations Section -->
    <div class="mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">My Recent Reservations</h2>

        <table class="w-full text-left">
            <thead class="border-b bg-gray-50">
                <tr>
                    <th class="py-2 px-3">Room</th>
                    <th class="px-3">Date</th>
                    <th class="px-3">Time</th>
                    <th class="px-3">Status</th>
                    <th class="px-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-b">
                    <td class="py-3 px-3">Library</td>
                    <td class="px-3">2025-02-08</td>
                    <td class="px-3">10:00 AM – 12:00 PM</td>
                    <td class="px-3 font-semibold text-yellow-600">Pending</td>
                    <td class="px-3 text-right">
                        <button class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">
                            Cancel
                        </button>
                    </td>
                </tr>

                <tr class="border-b">
                    <td class="py-3 px-3">Gym</td>
                    <td class="px-3">2025-02-10</td>
                    <td class="px-3">3:00 PM – 5:00 PM</td>
                    <td class="px-3 font-semibold text-green-600">Approved</td>
                    <td class="px-3 text-right">
                        <button class="px-3 py-1 text-white bg-gray-600 rounded hover:bg-gray-700">
                            Details
                        </button>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>

</div>

<!-- Reserve Modal (Flowbite) -->
<div id="reserveModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center">

    <div class="relative p-4 w-full max-w-lg">
        <div class="bg-white rounded-lg shadow p-6">

            <h3 class="text-xl font-bold">Reserve a Room</h3>

            <form class="mt-4 space-y-4">
                <div>
                    <label class="block mb-1 font-medium">Select Room</label>
                    <select class="w-full p-2 border rounded-lg">
                        <option>Gym</option>
                        <option>Library</option>
                        <option>Laboratory</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-medium">Date</label>
                    <input type="date" class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="block mb-1 font-medium">Time</label>
                    <input type="time" class="w-full p-2 border rounded-lg">
                </div>

                <div class="flex justify-end gap-2">
                    <button data-modal-hide="reserveModal" type="button"
                        class="px-4 py-2 bg-gray-500 text-white rounded">
                        Cancel
                    </button>

                    <button class="px-4 py-2 bg-blue-600 text-white rounded">
                        Submit
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</x-layout>