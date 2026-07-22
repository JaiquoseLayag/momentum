<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Momentum Dashboard
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-6">

            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

                <x-stat-card
                    title="Total Tasks"
                    :value="$totalTasks"
                    valueColor="text-blue-600"
                >
                    <x-slot:icon>
                        <x-heroicon-o-clipboard-document-list class="w-5 h-5 text-blue-600" />
                    </x-slot:icon>
                </x-stat-card>

                <x-stat-card
                    title="Completed"
                    :value="$completedTasks"
                    valueColor="text-green-600"
                >
                    <x-slot:icon>
                        <x-heroicon-o-check-circle class="w-5 h-5 text-green-600" />
                    </x-slot:icon>
                </x-stat-card>

                <x-stat-card
                    title="Pending"
                    :value="$pendingTasks"
                    valueColor="text-yellow-600"
                >
                    <x-slot:icon>
                        <x-heroicon-o-clock class="w-5 h-5 text-yellow-600" />
                    </x-slot:icon>
                </x-stat-card>

                <x-stat-card
                    title="High Priority"
                    :value="$highPriorityTasks"
                    valueColor="text-red-600"
                >
                    <x-slot:icon>
                        <x-heroicon-o-exclamation-triangle class="w-5 h-5 text-red-600" />
                    </x-slot:icon>
                </x-stat-card>

            </div>

            {{-- Recent Tasks --}}
            <div class="mt-8">

                <x-card>

                    <div class="flex justify-between items-center mb-4">

                        <h3 class="text-lg font-bold">
                            Recent Tasks
                        </h3>

                        <a
                            href="{{ route('tasks.index') }}"
                            class="text-blue-600 hover:underline"
                        >
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

                                <x-status-badge :status="$task->status" />

                            </div>

                        </div>

                    @empty

                        <p class="text-gray-500">
                            No tasks yet.
                        </p>

                    @endforelse

                </x-card>

            </div>

        </div>

    </div>

</x-app-layout>