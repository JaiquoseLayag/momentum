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

                           @if($task->status === 'completed')
                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                                    Completed
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">
                                    Pending
                                </span>
                            @endif
                        </div>

                        <div class="mt-4 space-y-1 text-sm">
                            <p>
                                <strong>Category:</strong>
                                {{ $task->category }}
                            </p>

                            <p>
                                <strong>Priority:</strong>

                                @if($task->priority === 'high')
                                    <span class="px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">
                                        🔴 High
                                    </span>

                                @elseif($task->priority === 'medium')
                                    <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">
                                        🟡 Medium
                                    </span>

                                @else
                                    <span class="px-2 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                        🟢 Low
                                    </span>

                                @endif

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

                                @if($task->status !== 'completed')

                                <form method="POST" action="{{ route('tasks.complete', $task) }}">
                                    
                                @endif

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                        ✓ Complete
                                    </button>

                                </form>

                                <form method="POST" action="{{ route('tasks.destroy', $task) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this task?');">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                                        Delete
                                    </button>

                                </form>

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