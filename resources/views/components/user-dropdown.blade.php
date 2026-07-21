<div x-data="{ open: false }" class="relative">

    <button
        @click="open = !open"
        class="flex items-center gap-2 text-gray-700 hover:text-blue-600"
    >
        {{ Auth::user()->name }}

        <svg class="w-4 h-4"
             fill="currentColor"
             viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"/>
        </svg>

    </button>


    <div
        x-show="open"
        @click.outside="open = false"
        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border"
    >

        <a href="{{ route('profile.edit') }}"
           class="block px-4 py-2 hover:bg-gray-100">
            Profile
        </a>


        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="w-full text-left px-4 py-2 hover:bg-gray-100"
            >
                Logout
            </button>

        </form>

    </div>

</div>