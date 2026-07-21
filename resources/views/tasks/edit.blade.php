<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Task
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-lg font-bold mb-6">
                Edit Task
            </h3>


            <form method="POST" action="{{ route('tasks.update', $task) }}">

                @csrf
                @method('PUT')


                <div class="mb-4">

                    <label class="block text-sm font-medium text-gray-700">
                        Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ $task->title }}"
                        class="mt-1 block w-full rounded-lg border-gray-300"
                    >

                </div>


                <div class="mb-4">

                    <label class="block text-sm font-medium text-gray-700">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="mt-1 block w-full rounded-lg border-gray-300"
                    >{{ $task->description }}</textarea>

                </div>


                <div class="mb-4">

                    <label class="block text-sm font-medium text-gray-700">
                        Category
                    </label>

                    <input
                        type="text"
                        name="category"
                        value="{{ $task->category }}"
                        class="mt-1 block w-full rounded-lg border-gray-300"
                    >

                </div>


                <button
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700"
                >
                    Save Changes
                </button>


            </form>

        </div>

    </div>

</x-app-layout>