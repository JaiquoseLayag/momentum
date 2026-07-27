<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Progress Analytics
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-6 space-y-8">

            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

                <x-stat-card
                    title="Focus Sessions"
                    :value="$totalSessions"
                    valueColor="text-blue-600"
                >
                    <x-slot:icon>
                        <x-heroicon-o-clock class="w-5 h-5 text-blue-600" />
                    </x-slot:icon>
                </x-stat-card>

                <x-stat-card
                    title="Focus Minutes"
                    :value="$totalMinutes"
                    valueColor="text-green-600"
                >
                    <x-slot:icon>
                        <x-heroicon-o-fire class="w-5 h-5 text-green-600" />
                    </x-slot:icon>
                </x-stat-card>

                <x-stat-card
                    title="Completed Tasks"
                    :value="$completedTasks"
                    valueColor="text-purple-600"
                >
                    <x-slot:icon>
                        <x-heroicon-o-check-circle class="w-5 h-5 text-purple-600" />
                    </x-slot:icon>
                </x-stat-card>

                <x-stat-card
                    title="Productivity"
                    :value="$productivityRate . '%'"
                    valueColor="text-red-600"
                >
                    <x-slot:icon>
                        <x-heroicon-o-chart-bar class="w-5 h-5 text-red-600" />
                    </x-slot:icon>
                </x-stat-card>

            </div>

            {{-- Streak & Daily Goal --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <x-streak-card :streak="$streak" />

                <x-daily-goal-card
                    :daily-goal="$dailyGoal"
                    :today-minutes="$todayMinutes"
                    :goal-percentage="$goalPercentage"
                    :remaining-minutes="$remainingMinutes"
                />

            </div>

            {{-- Weekly Focus Chart --}}
            <x-card>

                <div class="flex items-center gap-2 mb-6">

                    <x-heroicon-o-chart-bar class="w-6 h-6 text-blue-600" />

                    <h3 class="text-lg font-bold">
                        Weekly Focus Activity
                    </h3>

                </div>

                <canvas
                    id="weeklyFocusChart"
                    data-week='@json($weekData)'
                    height="120"
                ></canvas>

            </x-card>

            {{-- Most Focused Tasks --}}
            <x-top-tasks-card
                :top-tasks="$topTasks"
            />

            {{-- Recent Focus Sessions --}}
            <x-card>

                <div class="flex items-center justify-between mb-6">

                    <div class="flex items-center gap-2">

                        <x-heroicon-o-clock class="w-6 h-6 text-blue-600" />

                        <h3 class="text-lg font-bold">
                            Recent Focus Sessions
                        </h3>

                    </div>

                </div>

                @forelse($recentSessions as $session)

                    <div class="flex items-center justify-between py-4 border-b last:border-b-0">

                        <div>

                            <h4 class="font-semibold">
                                {{ $session->task?->title ?? 'Deleted Task' }}
                            </h4>

                            <p class="text-sm text-gray-500">
                                {{ $session->completed_at->format('M d, Y • h:i A') }}
                            </p>

                        </div>

                        <span class="font-semibold text-blue-600">
                            {{ $session->duration }} min
                        </span>

                    </div>

                @empty

                    <div class="text-center py-10">

                        <x-heroicon-o-clock class="w-12 h-12 mx-auto text-gray-300 mb-3" />

                        <p class="text-gray-500">
                            No focus sessions yet.
                        </p>

                    </div>

                @endforelse

            </x-card>

        </div>

    </div>

</x-app-layout>