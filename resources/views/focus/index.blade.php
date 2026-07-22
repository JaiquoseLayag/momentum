<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Focus
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow p-8 text-center">

                <h3 class="text-lg font-bold mb-6">
                    Focus Timer
                </h3>

                <div 
                    id="timer"
                    class="text-6xl font-bold mb-8"
                >
                    25:00
                </div>

                <div class="flex justify-center gap-4">

                    <button
                        id="start"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        Start
                    </button>

                    <button
                        id="pause"
                        class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600">
                        Pause
                    </button>

                    <button
                        id="reset"
                        class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700">
                        Reset
                    </button>

                </div>

            </div>

            <div class="mt-8 bg-white rounded-xl shadow p-6">

                <h3 class="text-lg font-bold mb-4">
                    Select Task
                </h3>

                <select
                    id="task"
                    class="w-full rounded-lg border-gray-300">

                    @forelse($tasks as $task)

                        <option value="{{ $task->id }}">
                            {{ $task->title }}
                        </option>

                    @empty

                        <option>
                            No pending tasks
                        </option>

                    @endforelse

                </select>

            </div>

        </div>

    </div>

</x-app-layout>