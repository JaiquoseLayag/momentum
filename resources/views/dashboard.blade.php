<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Momentum Dashboard
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">
                        Total Tasks
                    </h3>

                    <p class="text-3xl font-bold mt-2">
                        {{ $totalTasks }}
                    </p>
                </div>



                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">
                        Completed
                    </h3>

                    <p class="text-3xl font-bold mt-2 text-green-600">
                        {{ $completedTasks }}
                    </p>
                </div>



                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">
                        Pending
                    </h3>

                    <p class="text-3xl font-bold mt-2 text-yellow-600">
                        {{ $pendingTasks }}
                    </p>
                </div>



                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-gray-500 text-sm">
                        High Priority
                    </h3>

                    <p class="text-3xl font-bold mt-2 text-red-600">
                        {{ $highPriorityTasks }}
                    </p>
                </div>


            </div>

        </div>

    </div>

</x-app-layout>