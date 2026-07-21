<div class="bg-white rounded-xl shadow p-6">

    <h3 class="text-lg font-bold mb-6">
        Create New Task
    </h3>


    <form method="POST" action="{{ route('tasks.store') }}">

        @csrf


        <div class="mb-4">

            <label class="block text-sm font-medium text-gray-700">
                Title
            </label>

            <input
                type="text"
                name="title"
                class="mt-1 block w-full rounded-lg border-gray-300"
                placeholder="Task title"
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
                placeholder="Task description"
            ></textarea>

        </div>


        <div class="mb-4">

            <label class="block text-sm font-medium text-gray-700">
                Category
            </label>

            <input
                type="text"
                name="category"
                class="mt-1 block w-full rounded-lg border-gray-300"
                placeholder="School, Work, Personal..."
            >

        </div>


        <button
            type="submit"
            class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700"
        >
            Save Task
        </button>


    </form>

</div>