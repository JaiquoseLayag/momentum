<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            My Tasks
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold">
                        Task List
                    </h3>
                    <a href="{{ route('tasks.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        + Create Task
                    </a>
                </div>

                @forelse($tasks as $task)
                    <div class="border rounded-lg p-5 mb-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-bold">
                                    {{ $task->title }}
                                </h3>

                                <p class="text-gray-600 mt-1">
                                    {{ $task->description }}
                                </p>
                            </div>

                            <span class="px-3 py-1 rounded-full bg-gray-100 text-sm">
                                {{ $task->status }}
                            </span>
                        </div>

                        <div class="mt-4 space-y-1 text-sm">
                            <p>
                                <strong>Category:</strong>
                                {{ $task->category }}
                            </p>

                            <p>
                                <strong>Priority:</strong>
                                {{ ucfirst($task->priority) }}
                            </p>

                            <p>
                                <strong>Difficulty:</strong>
                                {{ ucfirst($task->difficulty) }}
                            </p>

                            @if($task->estimated_time)
                                <p>
                                    <strong>Estimated Time:</strong>
                                    {{ $task->estimated_time }} minutes
                                </p>
                            @endif

                            @if($task->deadline)
                                <p>
                                    <strong>Deadline:</strong>
                                    {{ $task->deadline }}
                                </p>
                            @endif

                            <div class="mt-4 flex gap-3">
                                <a href="{{ route('tasks.edit', $task) }}"
                                class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                                    Edit
                                </a>
                            </div>
                            
                        </div>
                    </div>


                @empty
                    <p>
                        No tasks yet.
                    </p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>