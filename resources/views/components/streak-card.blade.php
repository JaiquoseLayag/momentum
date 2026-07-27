<x-card>

    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm text-gray-500">
                Current Streak
            </p>

            <h2 class="mt-2 text-3xl font-bold {{ $color }}">
                {{ $title }}
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                {{ $message }}
            </p>

        </div>

        <div>

            @switch($icon)

                @case('sparkles')
                    <x-heroicon-o-sparkles class="w-12 h-12 {{ $color }}" />
                    @break

                @case('fire')
                    <x-heroicon-o-fire class="w-12 h-12 {{ $color }}" />
                    @break

                @case('rocket-launch')
                    <x-heroicon-o-rocket-launch class="w-12 h-12 {{ $color }}" />
                    @break

                @case('trophy')
                    <x-heroicon-o-trophy class="w-12 h-12 {{ $color }}" />
                    @break

                @case('star')
                    <x-heroicon-o-star class="w-12 h-12 {{ $color }}" />
                    @break

            @endswitch

        </div>

    </div>

</x-card>