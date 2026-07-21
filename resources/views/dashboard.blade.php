<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Momentum Dashboard
        </h2>

    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto px-6">

            <h1 class="text-3xl font-bold text-gray-800">
                Good morning, {{ Auth::user()->name }}.
            </h1>

            <p class="text-gray-600 mt-2">
                Here's what you should focus on next.
            </p>


            <div class="mt-8">

                <x-focus-card />

            </div>

        </div>

    </div>

</x-app-layout>