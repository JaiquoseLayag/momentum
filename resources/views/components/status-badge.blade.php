@if($status === 'completed')

    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
        Completed
    </span>

@else

    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
        Pending
    </span>

@endif