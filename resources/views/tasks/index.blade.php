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

                    <div class="border-b py-4">

                        <h3 class="text-lg font-bold">
                            {{ $task->title }}
                        </h3>

                        <p class="text-gray-600">
                            {{ $task->category }}
                        </p>

                        <p>
                            Priority:
                            {{ $task->priority }}
                        </p>

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