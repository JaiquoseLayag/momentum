<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Progress Analytics
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-6">

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

        </div>

    </div>

</x-app-layout>