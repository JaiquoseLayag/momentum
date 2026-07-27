<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Achievements
        </h2>
    </x-slot>

    @php

        $totalAchievements = count($achievements);

        $unlockedAchievements = collect($achievements)
            ->where('unlocked', true)
            ->count();

        $completion = round(
            ($unlockedAchievements / max($totalAchievements, 1)) * 100
        );

    @endphp

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-6">

            {{-- Achievement Summary --}}
            <x-card>

                <div class="flex items-center justify-between">

                    <div>

                        <h3 class="text-xl font-bold">
                            Achievement Progress
                        </h3>

                        <p class="text-gray-500 mt-1">
                            You've unlocked
                            <span class="font-semibold text-blue-600">
                                {{ $unlockedAchievements }}
                            </span>
                            of
                            <span class="font-semibold">
                                {{ $totalAchievements }}
                            </span>
                            achievements.
                        </p>

                    </div>

                    <div class="text-right">

                        <div class="text-4xl font-bold text-blue-600">
                            {{ $completion }}%
                        </div>

                        <p class="text-sm text-gray-500">
                            Complete
                        </p>

                    </div>

                </div>

                <div class="mt-6">

                    <div class="w-full bg-gray-200 rounded-full h-3">

                        <div
                            class="bg-blue-600 h-3 rounded-full transition-all duration-500"
                            style="width: {{ $completion }}%"
                        ></div>

                    </div>

                </div>

            </x-card>

            {{-- Achievement Cards --}}
            <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">

                @foreach($achievements as $achievement)

                    <x-achievement-card
                        :achievement="$achievement"
                    />

                @endforeach

            </div>

        </div>

    </div>

</x-app-layout>