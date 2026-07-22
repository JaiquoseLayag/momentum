<div class="bg-white rounded-xl shadow p-6">

    <div class="flex items-center gap-2 mb-2">

        @isset($icon)
            {{ $icon }}
        @endisset

        <h3 class="text-gray-500 text-sm">
            {{ $title }}
        </h3>

    </div>


    <p class="text-3xl font-bold {{ $valueColor }}">
        {{ $value }}
    </p>

</div>