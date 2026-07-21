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


            <div class="mt-8 bg-white rounded-xl shadow p-6">


                <div class="flex justify-between items-center mb-4">

                    <h3 class="text-lg font-bold">
                        Recent Tasks
                    </h3>


                    <a href="{{ route('tasks.index') }}"
                       class="text-blue-600 hover:underline">
                        View All
                    </a>

                </div>



                @forelse($recentTasks as $task)

                    <div class="border-b py-4 last:border-b-0">

                        <div class="flex justify-between items-start">


                            <div>

                                <h4 class="font-semibold">
                                    {{ $task->title }}
                                </h4>


                                <p class="text-sm text-gray-600">
                                    {{ $task->category }}
                                </p>

                            </div>



                            @if($task->status === 'completed')

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                    Completed
                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                                    Pending
                                </span>

                            @endif


                        </div>

                    </div>


                @empty

                    <p class="text-gray-500">
                        No tasks yet.
                    </p>

                @endforelse


            </div>


        </div>

    </div>

</x-app-layout>