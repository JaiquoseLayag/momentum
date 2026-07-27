<x-card>

    <div class="flex items-center justify-between mb-6">

        <div>

            <p class="text-sm text-gray-500">
                Daily Goal
            </p>

            <h2 class="text-3xl font-bold mt-1">
                {{ $todayMinutes }} / {{ $dailyGoal }} min
            </h2>

        </div>

        <x-heroicon-o-flag
            class="w-12 h-12 text-blue-600"
        />

    </div>

    <div class="w-full bg-gray-200 rounded-full h-3">

        <div
            class="{{ $color }} h-3 rounded-full transition-all duration-500"
            style="width: {{ $goalPercentage }}%;"
        ></div>

    </div>

    <div class="flex justify-between mt-3 text-sm text-gray-600">

        <span>
            {{ $goalPercentage }}%
        </span>

        <span>
            {{ $remainingMinutes }} min remaining
        </span>

    </div>

    <p class="mt-4 text-sm font-medium text-gray-700">

        {{ $message }}

    </p>

</x-card>