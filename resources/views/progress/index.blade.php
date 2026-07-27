<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Progress Analytics
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-6">

            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

                {{-- Stat Cards --}}

            </div>

            {{-- Streak --}}
            <div class="mt-8">
                <x-streak-card :streak="$streak" />
            </div>

            {{-- Daily Goal --}}
            <div class="mt-8">
                <x-daily-goal-card
                    :daily-goal="$dailyGoal"
                    :today-minutes="$todayMinutes"
                    :goal-percentage="$goalPercentage"
                    :remaining-minutes="$remainingMinutes"
                />
            </div>

            {{-- Weekly Chart --}}
            <div class="mt-8">

                {{-- Your chart card here --}}

            </div>

            {{-- Top Focused Tasks --}}
            <div class="mt-8">

                <x-top-tasks-card :top-tasks="$topTasks" />

            </div>

            {{-- Recent Focus Sessions --}}
            <div class="mt-8">

                {{-- Your recent sessions card here --}}

            </div>

        </div>

    </div>

</x-app-layout>