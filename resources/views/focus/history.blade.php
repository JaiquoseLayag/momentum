<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Focus History
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-6">

            <div class="bg-white rounded-xl shadow p-6">

                <h3 class="text-lg font-bold mb-6">
                    Completed Focus Sessions
                </h3>

                @forelse($sessions as $session)

                    <div class="border-b py-4 last:border-b-0">

                        <div class="flex justify-between">

                            <div>

                                <h4 class="font-semibold">
                                    {{ $session->task->title }}
                                </h4>

                                <p class="text-sm text-gray-600">
                                    {{ $session->duration }} minutes
                                </p>

                            </div>

                            <div class="text-right text-sm text-gray-500">

                                <p>
                                    Started:
                                    {{ $session->started_at }}
                                </p>

                                <p>
                                    Completed:
                                    {{ $session->completed_at }}
                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <p class="text-gray-500">
                        No focus sessions yet.
                    </p>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>