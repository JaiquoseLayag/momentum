<x-card class="mt-8">

    <div class="flex items-center gap-2 mb-6">

        <x-heroicon-o-trophy class="w-6 h-6 text-yellow-500" />

        <h3 class="text-lg font-bold">
            Most Focused Tasks
        </h3>

    </div>

    @forelse($topTasks as $index => $focus)

        <div class="flex justify-between items-center py-3 border-b last:border-b-0">

            <div class="flex items-center gap-3">

                @if($index === 0)

                    <span class="text-2xl">🥇</span>

                @elseif($index === 1)

                    <span class="text-2xl">🥈</span>

                @elseif($index === 2)

                    <span class="text-2xl">🥉</span>

                @else

                    <span class="w-8 text-center font-semibold text-gray-500">
                        {{ $index + 1 }}
                    </span>

                @endif

                <div>

                    <p class="font-semibold">
                        {{ $focus->task?->title ?? 'Deleted Task' }}
                    </p>

                </div>

            </div>

            <span class="font-semibold text-blue-600">

                {{ $focus->total_minutes }} min

            </span>

        </div>

    @empty

        <div class="text-center py-8 text-gray-500">

            <x-heroicon-o-clipboard-document-list
                class="w-10 h-10 mx-auto mb-3 text-gray-300"
            />

            <p>
                No focus sessions yet.
            </p>

        </div>

    @endforelse

</x-card>