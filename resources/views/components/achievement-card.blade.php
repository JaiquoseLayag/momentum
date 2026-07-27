@php

$badgeColors = [

    'blue' => 'bg-blue-100 text-blue-700',
    'green' => 'bg-green-100 text-green-700',
    'orange' => 'bg-orange-100 text-orange-700',
    'purple' => 'bg-purple-100 text-purple-700',
    'red' => 'bg-red-100 text-red-700',
    'yellow' => 'bg-yellow-100 text-yellow-700',
    'indigo' => 'bg-indigo-100 text-indigo-700',
    'emerald' => 'bg-emerald-100 text-emerald-700',

];

$progressColors = [

    'blue' => 'bg-blue-600',
    'green' => 'bg-green-600',
    'orange' => 'bg-orange-500',
    'purple' => 'bg-purple-600',
    'red' => 'bg-red-600',
    'yellow' => 'bg-yellow-500',
    'indigo' => 'bg-indigo-600',
    'emerald' => 'bg-emerald-600',

];

$cardClasses = $achievement['unlocked']
    ? 'border border-gray-200 shadow-md'
    : 'border border-gray-200 opacity-80';

@endphp

<x-card :class="$cardClasses">

    <div class="flex justify-between items-start">

        <div class="flex gap-4 items-start">

            @switch($achievement['icon'])

                @case('bolt')
                    <x-heroicon-o-bolt class="w-8 h-8 text-blue-600 flex-shrink-0 mt-1" />
                    @break

                @case('check-circle')
                    <x-heroicon-o-check-circle class="w-8 h-8 text-green-600 flex-shrink-0 mt-1" />
                    @break

                @case('fire')
                    <x-heroicon-o-fire class="w-8 h-8 text-orange-500 flex-shrink-0 mt-1" />
                    @break

                @case('clock')
                    <x-heroicon-o-clock class="w-8 h-8 text-indigo-600 flex-shrink-0 mt-1" />
                    @break

                @case('calendar')
                    <x-heroicon-o-calendar-days class="w-8 h-8 text-purple-600 flex-shrink-0 mt-1" />
                    @break

                @case('chart-bar')
                    <x-heroicon-o-chart-bar class="w-8 h-8 text-violet-600 flex-shrink-0 mt-1" />
                    @break

                @case('flag')
                    <x-heroicon-o-flag class="w-8 h-8 text-blue-600 flex-shrink-0 mt-1" />
                    @break

                @case('sparkles')
                    <x-heroicon-o-sparkles class="w-8 h-8 text-yellow-500 flex-shrink-0 mt-1" />
                    @break

                @case('clipboard-document-check')
                    <x-heroicon-o-clipboard-document-check class="w-8 h-8 text-emerald-600 flex-shrink-0 mt-1" />
                    @break

                @case('trophy')
                    <x-heroicon-o-trophy class="w-8 h-8 text-yellow-500 flex-shrink-0 mt-1" />
                    @break

                @default
                    <x-heroicon-o-star class="w-8 h-8 text-gray-500 flex-shrink-0 mt-1" />

            @endswitch

            <div>

                <h3 class="font-bold text-lg">
                    {{ $achievement['title'] }}
                </h3>

                <span class="inline-block mt-1 mb-2 px-2 py-1 rounded-full text-xs font-medium {{ $badgeColors[$achievement['color']] }}">
                    {{ $achievement['category'] }}
                </span>

                <p class="text-gray-500 text-sm">
                    {{ $achievement['description'] }}
                </p>

            </div>

        </div>

        @if($achievement['unlocked'])

            <span class="flex items-center gap-1 px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                <x-heroicon-o-check-badge class="w-4 h-4" />
                Unlocked
            </span>

        @else

            <span class="flex items-center gap-1 px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-sm">
                <x-heroicon-o-lock-closed class="w-4 h-4" />
                Locked
            </span>

        @endif

    </div>

    <div class="mt-6">

        <div class="flex justify-between text-sm mb-2">

            <span>Progress</span>

            <span>
                {{ min($achievement['current'], $achievement['target']) }}
                /
                {{ $achievement['target'] }}
            </span>

        </div>

        <div class="w-full h-3 bg-gray-200 rounded-full">

            <div
                class="{{ $progressColors[$achievement['color']] }} h-3 rounded-full transition-all duration-500"
                style="width: {{ min(($achievement['current'] / $achievement['target']) * 100, 100) }}%"
            ></div>

        </div>

    </div>

</x-card>